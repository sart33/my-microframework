<?php


namespace App\Controller;


class View
{
    function renderView($layoutFile, $viewFile, $params, $title)
    {

        if (file_exists($viewFile) && is_readable($viewFile)) {

            ob_start();
            if (!empty($params) && is_array($params)) {
                extract($params);
            }


            if (file_exists($layoutFile) && is_readable($layoutFile)) {

                ob_start();
                include $layoutFile;
                $layoutContent = ob_get_clean();

                include $viewFile;
                $content = ob_get_clean();

                if(isset($params) && is_array($params)) {

                    if (isset($params['form']) && file_exists($params['formPath']) || isset($form))  {
                        ob_start();
                        include $params['formPath'];
                        $form = ob_get_clean();
                        $content = str_replace('%' . $params['form'] . '%', $form, $content);


                    } elseif (isset($params['layout']) && $params['layout'] === 'none') {
                        $layoutContent = '%content%';
                    }
                }
                $page = str_replace('%content%', $content, $layoutContent);

            } else {
                throw new \Exception('В настройках отсутствует layout файл');

            }

        } else {
            throw new \Exception('В настройках отсутствует view файл');

        }
//        catch(\Exception $e) {
//                exit($e->getMessage());
//            }
        return $page;
    }

}