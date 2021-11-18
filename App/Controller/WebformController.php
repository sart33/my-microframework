<?php


namespace App\Controller;


class WebformController extends AbstractController
{
    public function formAction()
    {
//        $params['layout'] = 'none';
        $form = 'webform';

        return Parent::render('form', compact('form'));
    }


    public function storeAction() {

        $params = $_POST;

        return Parent::render('store', compact('params'));

    }
}