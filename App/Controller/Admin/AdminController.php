<?php
namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Model\User;

class AdminController extends AbstractController {

    public function indexAction($id = null) {

        $params = 'indexAction';

        return Parent::render('index', compact('params'));

    }

    public function loginAction($login = null, $password = null) {



            if (!empty($_POST['LoginForm']['login']) && !empty($_POST['LoginForm']['password'])) {
                $param = $_POST;
                $result = (new User())->login($param);



            } else {
//        } else {
//            echo 'Error! - Invalid token.';
//            return false;
//        }
                $form = 'login-form';
                return Parent::render('login', compact('form'));
            }
    }

}