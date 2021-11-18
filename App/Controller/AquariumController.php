<?php


namespace App\Controller;


use App\Controller\AbstractController;
use App\Db\DbConnection;
use App\Model\Aquarium;
use App\Model\Task;
use App\Model\User;

class AquariumController extends AbstractController
{

    private $aquarium;
    private $user;


    public function __construct(Aquarium $aquarium, User $user)
    {
         $this->aquarium = $aquarium;
         $this->user = $user;

    }

    public function indexAction($getParams, $id = null, $title = null) {

        if($this->user->authTry() === true) {

        if(isset($getParams)) {
            if(!is_array($getParams)) {
                $tempVariable = (int)$getParams;
                if(is_array($id)) {
                    $getParams = $id;
                    $id = $tempVariable;
                }  else {
                    $id = $tempVariable;
                    $getParams = null;
                    $params = $this->aquarium->findAll($id);
                    if (isset($title)) {
                        $params['title'] = $title;
                    }
                    return Parent::render('index', compact('params'));
                }
            }
            if(isset($getParams['sort'])) {
                $field = $getParams['sort'];
                if(isset($getParams['order'])) {
                    $asc = $getParams['order'];
                    $params = $this->aquarium->findAllWithGetParam($field, $asc, $id);
                    $params = array_merge($params, $getParams);
                    if(isset($title)) {
                        $params['title'] = $title;
                    }
                } else {
                    $params = $this->aquarium->findAllWithGetParam($field, 'desc', $id);
                    $params = array_merge($params, $getParams);
                    if(isset($title)) {
                        $params['title'] = $title;
                    }

                }
            }
        } else {
            $params = $this->aquarium->findAll($id);
            if(isset($title)) {
                $params['title'] = $title;
            }
        }
        return Parent::render('index', compact('params'));

    } else {
            header("HTTP/1.1 403 Forbidden");
            return Parent::render('403');

//            echo 'Авторизируйтесть для доступа к даной странице';
        }
    }





    public function createAction() {

        if($this->user->authTry() === true) {

        $form = 'aquarium-daily-form';

        return Parent::render('create', compact('form'));

        } else {
        header("HTTP/1.1 403 Forbidden");
        echo 'Авторизируйтесть для доступа к даной странице';
        }
    }




    public function storeAction() {

        if($this->user->authTry() === true) {
        $param = $_POST;
        $img = $_FILES['images'] ?? null;
        $video = $_FILES['videos'] ?? null;
        $result = $this->aquarium->create($param, $img, $video);
        if ($result === true) {

            header("Location: /");
            echo 'Информация успешно добавлена';
            return true;
        } else {
            header("Location: /create");
            echo 'Информация не добавлена';
            return false;
        }

//        return Parent::render('store', compact('params'));

    } else {
            header("HTTP/1.1 403 Forbidden");
            echo 'Авторизируйтесть для доступа к даной странице';
        }
    }




    public function viewAction($id) {

        if($this->user->authTry() === true) {

        $params = $this->aquarium->findOne($id);

        return Parent::render('view', compact('params'));

        } else {
        header("HTTP/1.1 403 Forbidden");
        echo 'Авторизируйтесть для доступа к даной странице';
        }
    }




    public function chartsAction() {

        if($this->user->authTry() === true) {

//            $params = (new Aquarium())->findOne($id);
            $params = $this->aquarium->charts();
//            $params = '';
            return Parent::render('charts', compact('params'));

        } else {
            header("HTTP/1.1 403 Forbidden");
            echo 'Авторизируйтесть для доступа к даной странице';
        }
    }




    public function diaryAction() {

        if($this->user->authTry() === true) {

//            $params = (new Aquarium())->findOne($id);

//            $params = (new Aquarium())->charts();
            return Parent::render('diary', compact('params'));

        } else {
            header("HTTP/1.1 403 Forbidden");
            echo 'Авторизируйтесть для доступа к даной странице';
        }
    }




    public function editAction($id) {
        if($this->user->authTry() === true) {
        $form = 'aquarium-daily-form';

        $params = $this->aquarium->findOne($id);
            $params['form'] = $form;
        return Parent::render('edit', compact('params'));

    } else {
        header("HTTP/1.1 403 Forbidden");
        echo 'Авторизируйтесть для доступа к даной странице';
        }
    }




    public function updateAction($id) {
        if($this->user->authTry() === true) {
            $param = $_POST;
            $img = $_FILES['images'] ?? null;
            $video = $_FILES['videos'] ?? null;

            $res = $this->aquarium->update($param, $img, $video);

            if ($res === true)
            {
                header("Location: /view/" . $id);

            } else {
                throw new \LogicException('Update of material - failed!');

            }


        } else {
            header("HTTP/1.1 403 Forbidden");
            echo 'Авторизируйтесть для доступа к даной странице';
        }
    }




    public function deleteAction($id) {

        if($this->user->authTry() === true) {
            $res = $this->aquarium->delete($id);
            if ($res === true)
            {
                header("Location: /aquarium/index");

            } else {
                throw new \LogicException('Delete of material - failed!');
            }

        } else {
            header("HTTP/1.1 403 Forbidden");
            echo 'Авторизируйтесть для доступа к даной странице';
        }
    }




//    public function taskAction()
//    {
//        $params = (new Task())->allTasks();
//        return Parent::render('task', compact('params'));
//
//    }

    public function notFound() {


        return Parent::render('404');

    }
}