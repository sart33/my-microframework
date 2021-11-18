<?php


namespace App\Model;


use App\Model\UserMethods;
use App\Db\DbConnection;

class User extends Model implements UserMethods
{
    private $tableName;


    public function __construct()
    {
        $this->tableName = 'user';
    }




    public function getValidate()
    {
        return [
            'id' => [1, 6, '##^[0-9]{1,6}$#ui'],
            'login' => [3, 16, '#^[A-Za-zА-Яа-я0-9]{3,16}$#ui'],
            'email' => [6, 66, '#^\b(\w+?\b[\.|-]?\b\w*?\b@\w+?\.\b[a-z]{2,32}\b\.?[a-z]{0,32})$#ui'],
            'password' => [6, 32, '#^[^\s]{6,32}$#ui'],
            'verif-token' => [100, 100, '#^[[:xdigit:]]{100}$#ui'],
            'password-confirm' => [6, 32, '#^[^\s]{6,32}$#ui'],
            'remember' => [1, 1],
            'agree' => [1, 1],

        ];
    }




    public function login($param) {


            $validData = $this->validate($param, null, null);

            $login = $validData['login'];
            $pass = $validData['password'];
            $sqlLogin = "SELECT password_hash FROM public.user WHERE login='$login' AND active ='1'";
            $passHash = DbConnection::inquireIntoDb($sqlLogin);

        if(empty($passHash)) {
            throw new \LogicException('This user doesn\'t exist');

        } else {

            if(password_verify($pass, $passHash['0']['password_hash']) === true) {

                $id = $this->userId($login);
                if(session_id() === '') {
                    session_start();
                }
                //Пишем в сессию информацию о том, что мы авторизовались:
                $_SESSION['auth'] = true;
                //Пишем в сессию логин и id пользователя (их мы берем из переменной $login!):
                $_SESSION['id'] = $id;
                $_SESSION['login'] = $login;

                if(!empty($validData['remember']) && $validData['remember'] == '1') {
                    $this->rememberMe($id, $login);
                }
                return true;

        } else {
                throw new \LogicException('Password entry - not valid');
            }
        }
    }



    public function logout() {

            $_SESSION['auth'] = null;
            setcookie('login', "", time() - 3600, '/');
            setcookie('key', "", time() - 3600, '/');

            header("location: /user/login");

    }

    public function authTry(): bool
    {
        if(!empty($_SESSION['auth'])) {

            return true;

        } elseif (empty($_SESSION['auth']) || $_SESSION['auth'] === false) {

            if(!empty($_COOKIE['login']) && !empty($_COOKIE['key'])) {
                $login = $_COOKIE['login'];
                $key = $_COOKIE['key'];

                $sqlAuth = "SELECT id, login, cookie FROM public.user WHERE cookie='$key' AND login='$login'";

               $auth = DbConnection::inquireIntoDb($sqlAuth);
               if($auth !== false) {
                   if(session_id() === '') {
                       session_start();
                   }
                   //Пишем в сессию информацию о том, что мы авторизовались:
                   $_SESSION['auth'] = true;
                   //Пишем в сессию логин и id пользователя (их мы берем из переменной $login!):
                   $_SESSION['id'] = $id = $auth['id'];
                   $_SESSION['login'] = $auth['login'];

                   $key = bin2hex(random_bytes(16));
                   $sqlUpCookie = "UPDATE public.user SET cookie='$key' WHERE id='$id'";
                   $cookieUp = DbConnection::inquireIntoDb($sqlUpCookie);

                   if($cookieUp !== false) {

                       return true;
                   } else {
                       throw new \LogicException('Cookie update in db is failed!');
                   }

               } else {
                   throw new \LogicException('Authentication failed!');
               }
            } else {
//                throw new \LogicException('There is no cookie for Auth');
                return false;

            }
        }
    }

    public function register($param)
    {

        $message = [];
        $data = new \DateTime();
        $updatedDate = $data->format('Y-m-d H:i:s');

        $validData = $this->validate($param, null, null);

        $login = $validData['login'];
        $email = $validData['email'];
        $pass = $validData['password'];

        if(empty(DbConnection::inquireIntoDb("SELECT id FROM public.user WHERE email ='$email'"))) {

        } else {
            throw new \LogicException('User with this email already exist');
        }


        if(defined(PASSWORD_ARGON2ID)) {
        $passHash = password_hash($pass, PASSWORD_ARGON2ID);
        } else {
        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        }

        $verifToken = bin2hex(random_bytes(50));

        $sqlSignUp = "INSERT INTO public.user (login, password_hash, email, role, active, updated_at, verification_token) VALUES ('$login', '$passHash', '$email', 1, false, '$updatedDate', '$verifToken')";
        $regResult = DbConnection::inquireIntoDb($sqlSignUp);

        if($regResult !== false) {
            $key = SITE_URL . '/verification?verif-token=' . $verifToken . '&email=' . $email;
            file_put_contents(dirname(__DIR__) . '/Log/verification.txt', $key);

            $message['registration'] = true;
            $message['yes'] = '<p style="color: #27ae60;">Регистрацйия прошла успешно. Чтобы завершить ее перейдите по ссылке отправленой Вам не электронную почту</p>';
            return $message;
        } else {
//            $message['no'] = '<p style="color: #27ae60;">Регистрацйия прошла успешно. Чтобы завершить ее перейдите по ссылке отправленой Вам не электронную почту</p>';
            throw new \LogicException('Registration failed!');

        }
    }

    public function verification($getParam) {

        if(isset($getParam['verif-token']) && isset($getParam['email'])) {
            $className = get_called_class();
            $valid = $this->validateParam($getParam, $className);
            if($valid === true) {
                $verifToken = $getParam['verif-token'];
                $email = $getParam['email'];

                $sqlVerification = "SELECT id FROM public.user WHERE email ='$email' AND verification_token ='$verifToken'";

                $id = DbConnection::inquireIntoDb($sqlVerification)[0]['id'];

                if(!empty($id) && is_int($id)) {
                    $sqlVerifStatus = "UPDATE public.user SET active =true WHERE id =$id";

                    return DbConnection::inquireIntoDb($sqlVerifStatus);
                } else {
                    return false;
                }
            }

        }
    }

    public function rememberMe($id, $login) {
        if(isset($id) && is_int($id) && isset($login) && is_string($login)) {
            $key = bin2hex(random_bytes(16));
            $sqlCookieKey = "UPDATE public.user SET cookie='$key' WHERE id=$id";
            DbConnection::inquireIntoDb($sqlCookieKey);
            setcookie('login', $login, time()+60*60*24*30, '/');
            setcookie('key', $key, time()+60*60*24*30, '/');

        } else {
            throw new \LogicException();
        }

        return true;

    }

    public function remove($id) {

    }

    public function userId($name) {
        if(isset($name) && is_string($name)) {
            $sqlSearchId = "SELECT id FROM public.user WHERE login ='$name'";
            $id = DbConnection::inquireIntoDb($sqlSearchId)[0]['id'];
            return $id;
        }
    }

    public function account($id) {
        if(isset($id) && is_int($id)) {
            $sqlUserData = "SELECT login, email, role, created_at FROM public.user WHERE id='$id'";
            $userData = DbConnection::inquireIntoDb($sqlUserData)[0];
            return $userData;
        }
        else {
            throw new \LogicException("'id' - is not valid!");
        }


    }
}