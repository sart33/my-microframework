<?php


namespace App\Controller\Admin;


use App\Controller\AbstractController;
use App\Model\Category;

class CategoryController extends AbstractController
{

    public function indexAction($getParams, $id = null)
    {
        if (isset($getParams)) {
            if(!is_array($getParams)) {
                $bufferVar = (int)$getParams;
                if(is_array($id)) {
                    $getParams = $id;
                    $id = $bufferVar;

                } else {
                    $getParams = null;
                    $params = (new Category())->findAll($id);
                    return Parent::render('index', compact('params'));
                }
            }
            if(isset($getParams['sort'])) {
                $field = $getParams['sort'];
                if (isset($getParams['order'])) {
                    $asc = $getParams['order'];
                    $params = (new Category())->findAllWithGetParam($field, $asc, $id);
                    $params = array_merge($params, $getParams);
                } else {
                    $params = (new Category())->findAllWithGetParam($field, 'desc', $id);
                    $params = array_merge($params, $getParams);

                }
            }

        }
        else {
            $params = (new Category())->findAll($id);
        }

        return Parent::render('index', compact('params'));
    }

    public function viewAction($id)
    {
        $params = Category::find($id);

        return Parent::render('view', compact('params'));
    }

}