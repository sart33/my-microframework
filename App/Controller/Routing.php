<?php

namespace App\Controller;

use App\Config\Routes;

class Routing

{




    public function routing()
    {
        $url = $_SERVER['REQUEST_URI'];
        $result = $this->parse($url);

        if (is_array($result)) {
            if (isset($result['className']) && isset($result['action'])) {
                if (!empty($result['param'])) {
                    if (!empty($result['getParam'])) {
                        if (!empty($result['title'])) {
                            return $this->createRoute($result['className'], $result['action'], $result['param'], $result['getParam'], $result['title']);
                        } else {
                            return $this->createRoute($result['className'], $result['action'], $result['param'], $result['getParam']);
                        }
                    } else {
                        if (!empty($result['title'])) {
                            return $this->createRoute($result['className'], $result['action'], $result['param'], $result['title']);
                        } else {
                            return $this->createRoute($result['className'], $result['action'], $result['param']);
                        }
                    }
                } else {
                    if (!empty($result['getParam'])) {
                        if (!empty($result['title'])) {
                            return $this->createRoute($result['className'], $result['action'], $result['getParam'], $result['title']);
                        } else {
                            return $this->createRoute($result['className'], $result['action'], $result['getParam']);
                        }
                    } else {
                        if (!empty($result['title'])) {
                            return $this->createRoute($result['className'], $result['action'], $result['title']);
                        } else {
                            return $this->createRoute($result['className'], $result['action']);
                        }
                    }
                }
            }
        } else {
            if ($result === false) {
                return $this->errorMessage();
            }
        }
    }




    public function createRoute($className, $action, $param = null, $getParam = null, $title = null) {
        if(is_string($param) && !is_numeric($param)) {
            $title = $param;
            $param = null;
        }
        if(is_string($getParam) && !is_numeric($getParam)) {
            $title = $getParam;
            $getParam = null;
        }
        if(is_string($getParam) && is_numeric($getParam)) {
            $tempVariable = (int)$getParam;
            if (is_array($param)) {
                $getParams = $param;
                $param = $tempVariable;
            }
        }

        $classNameArr = explode('\\', $className);
        $nameClass = end($classNameArr);
        preg_match('#^(.+)Controller$#', $nameClass, $matches);

        if(isset($matches[1])) {
            $modelName = '\\' . $classNameArr[0] . '\\Model\\' . $matches[1];
            $modelUser = '\\' . $classNameArr[0] . '\\Model\User';
            $model = (new $modelName());
            $user = (new $modelUser());
            if($modelName === $modelUser) {
                return (new $className($model))->$action($param, $getParam, $title);
            }
            return (new $className($model, $user))->$action($param, $getParam, $title);

        } else {
            return (new $className())->$action($param, $getParam, $title);

        }
    }

    public function parse($url) {
        $param = '';
        $getParam = [];
        $urlPath = false;
        $admin = false;
        $url = rtrim($url, '/');

        if(strpos($url, 'admin') === 1) {
            $admin = true;
            $url = preg_replace('#^/admin#', '', $url);
            $url = rtrim($url, '/');
        }

        if(!empty($url)) {

            if (strpos($url, '?') !== false) {

                $urlGetArr = explode('?', $url);
                $url = $urlGetArr[0];
                if(isset($urlGetArr[1])) {
                    $getParams = $urlGetArr[1];
                    $getParamArr = explode('&', $getParams);
                    if(!empty($getParamArr[0]) && strpos($getParamArr[0], '=') !== false) {
                        $getParamNameValueArr = explode('=', $getParamArr[0]);
                        if(!empty($getParamNameValueArr[0] && !empty($getParamNameValueArr[1]))) {
                            $getParam[$getParamNameValueArr[0]] = $getParamNameValueArr[1];
                        }
                    }
                    if(!empty($getParamArr[1]) && strpos($getParamArr[1], '=') !== false) {
                        $getParamNameValueArrTwo = explode('=', $getParamArr[1]);
                        if(!empty($getParamNameValueArrTwo[0] && !empty($getParamNameValueArrTwo[1]))) {
                            $getParam[$getParamNameValueArrTwo[0]] = $getParamNameValueArrTwo[1];
                        }
                    }
                }
            }
            if (strpos($url, '/') !== false) {
                $urlArr = explode('/', $url);
                array_shift($urlArr);
                if($admin === true) {
                    $urlPath = 'admin/' . $urlArr[0];
                } else {
                    $urlPath = $urlArr[0];
                }
                array_shift($urlArr);
                foreach ($urlArr as $urlFrag) {
                    if(is_numeric($urlFrag)) {
                        $param = $urlFrag;
                    } else {
                        $urlPath .= '/' . $urlFrag;
                        $urlPath = rtrim($urlPath, '/');
                    }
                }
            }
        } else {
            if($admin === true) {
                $urlPath = 'admin';
            } else {
                $urlPath = '';
            }
        }
           if (isset(Routes::routingTable()[$urlPath])) {
               $path = Routes::routingTable()[$urlPath];
               $infoArr = explode('@', $path[0]);
               $class = ucfirst($infoArr[0]) . 'Controller';
               if($admin) {
                   $className = __NAMESPACE__ . '\\Admin\\' . $class;
               } else {
               $className = __NAMESPACE__ . '\\' . $class;
               }
               $action = $infoArr[1] . 'Action';

               if(!empty($param)) {
                   if(!empty($path[1]) && ($path[1] === 'param')) {
                       if(!empty($path[2]) && ($path[2] === '?')) {
                           if(!empty($path[3]) && is_string($path[3])) {
                               $title = $path[3];
                           return compact('className', 'action', 'getParam', 'param', 'title');
                           } else {
                               return compact('className', 'action', 'getParam', 'param');
                           }
                       } else {
                           if (!empty($path[3]) && is_string($path[3])) {
                               $title = $path[3];
                               return compact('className', 'action', 'param', 'title');
                           } else {
                               return compact('className', 'action', 'param');
                           }
                       }
                   } else {
                       return false;
                   }
               } else {
                   if (!empty($path[1]) && ($path[1] === 'param')) {
                       return false;
                   } else {
                       if (!empty($path[2]) && ($path[2] === '?')) {
                           if (!empty($path[3]) && is_string($path[3])) {
                               $title = $path[3];
                               return compact('className', 'action', 'getParam', 'title');
                           } else {
                               return compact('className', 'action', 'getParam');
                           }
                       } else {
                           if (!empty($path[3]) && is_string($path[3])) {
                               $title = $path[3];
                               return compact('className', 'action', 'title');
                           } else {
                               return compact('className', 'action');
                           }
                       }
                   }
               }
            } else {
               return false;
           }

    }

    public function errorMessage() {
        header('HTTP/1.1 404 Not Found');
        $this->createRoute('App\Controller\AquariumController', 'notFound', null, null, '404');

    }

}