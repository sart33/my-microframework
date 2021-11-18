<?php

namespace App\Controller;

use App\Model\Ads;
use App\Model\User;

class AdsController extends AbstractController
{

    private $ads;


    public function __construct(Ads $ads, User $user)
    {
        $this->ads = $ads;
        $this->user = $user;


    }

    public function indexAction($getParams, $id = null,  $title = null) {


if(isset($getParams)) {
    if(!is_array($getParams)) {
        $tempVariable = (int)$getParams;
        if(is_array($id)) {
            $getParams = $id;
            $id = $tempVariable;
        } else {
        $getParams = null;
        $params = $this->ads->findAll($id);
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
            $params = $this->ads->findAllWithGetParam($field, $asc, $id);
            $params = array_merge($params, $getParams);
        } else {
            $params = $this->ads->findAllWithGetParam($field, 'desc', $id);
            $params = array_merge($params, $getParams);

        }
    }
} else {
    $params = $this->ads->findAll($id);
}
        if (isset($title)) {
            $params['title'] = $title;
        }
        return Parent::render('index', compact('params'));

    }







    public function viewAction($id) {

        $params = $this->ads->findOne($id);

        return Parent::render('view', compact('params'));

    }








    public function createAction() {
        if($this->user->authTry() === true) {
        $form = 'create-form';
        return Parent::render('create', compact('form'));

        } else {
            header("HTTP/1.1 403 Forbidden");
            echo 'Авторизируйтесть для доступа к даной странице';
        }

    }








    public function storeAction() {
        if($this->user->authTry() === true) {
        $img = null;
        $param = $_POST;
        if(isset($_FILES['images'])) {
        $img = $_FILES['images'];
        }
        $params = $this->ads->create($param, $img);

        return Parent::render('store', compact('params'));

        } else {
            header("HTTP/1.1 403 Forbidden");
            echo 'Авторизируйтесть для доступа к даной странице';
        }
    }









    public function notFound() {


        return Parent::render('404');

    }

}