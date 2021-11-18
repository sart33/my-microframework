<?php


namespace App\Controller;


abstract class AbstractController
{

    protected function render($path, $params = '') {
    $classPath = explode('\\Controller\\', get_called_class());
    if(isset($classPath[1])) {
        $tempPath = str_replace('\\', '/', $classPath[1]);
        $tempPath = preg_replace('#Controller#ui', '', $tempPath);
        $tempPath = strtolower($tempPath);
        $layoutPathArr = explode('/', $tempPath);
        $layoutPath = dirname(__DIR__) . '/View/layout/' . $layoutPathArr[0] . '.tpl.php';
        $viewPath = dirname(__DIR__) . '/View/' . $tempPath . '/' . $path . '.tpl.php';
        if(isset($params['form'])) {
            $params['formPath'] = dirname(__DIR__) . '/View/' . $layoutPathArr[0] . '/parts/' . $params['form'] . '.tpl.php';
        }
        if(isset($params['params']['form'])) {
            $params['params']['formPath'] = dirname(__DIR__) . '/View/' . $layoutPathArr[0] . '/parts/' . $params['params']['form'] . '.tpl.php';
        }
        if(isset($params['params']['title'])) {
            $title = $params['params']['title'];
        }


    } else {
        throw new \Exception('Отсутствуют маршруты в базовых настройках');

    }
    if (file_exists($viewPath) && (file_exists($layoutPath))) {
        if(isset($params['params']['title'])) {
            $title = $params['params']['title'];

            echo (new View())->renderView($layoutPath, $viewPath, $params, $title);
        } else {
            echo (new View())->renderView($layoutPath, $viewPath, $params, null);
        }

        } else {

    }
    }
}