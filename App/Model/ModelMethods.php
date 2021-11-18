<?php


namespace App\Model;


use App\Db\DbConnection;

trait ModelMethods
{
    protected function uploadImg($img)
    {
        $filename = 'default.jpg';
        if (!empty($img)) {
            if ($img['error'] == 0) {
                $file = $img['name'];
                $file = str_replace('jpeg', 'jpg', $file);
                $fileArr = explode('.', $file);
                $fileHash = md5(uniqid());
                $ext = $fileArr[1];
                $fileName = $fileHash . '.' . $fileArr[1];
                move_uploaded_file($img['tmp_name'], dirname(__DIR__, 2) . '/public/image/' . $fileName);
            }
        }
    }

    protected function multiUploadImg($img, $limit = null)
    {

        $filename = 'default.jpg';
        if (!empty($img)) {
            $imgName = [];
            if ($limit[1] !== null && is_numeric($limit[1])) {
                $count = $limit[1];
            } else {
                $count = count($img['name']);
            }
            for ($i = 0; $i < $count; $i++) {

                if (isset($img['error'][$i])) {
                    if ($img['error'][$i] === 0) {
                        $file = $img['name'][$i];
                        $file = str_replace('jpeg', 'jpg', $file);
                        $fileArr = explode('.', $file);
                        $fileHash = md5(uniqid());
                        $ext = $fileArr[1];
                        $fileName = $fileHash . '.' . $fileArr[1];
                        if ($i === 0) $nameInArr = 'img_one';
                        elseif ($i === 1) $nameInArr = 'img_two';
                        elseif ($i === 2) $nameInArr = 'img_three';
                        elseif ($i === 3) $nameInArr = 'img_four';
                        elseif ($i === 4) $nameInArr = 'img_five';
                        $imgName[$nameInArr] = $fileName;


                        $image = imagecreatefromjpeg($img['tmp_name'][$i]);
                        $fullImage = imagescale($image, 1068, -1, IMG_BILINEAR_FIXED);
                        $teaser = imagescale($image, 500, -1, IMG_BILINEAR_FIXED);
                        imagejpeg($teaser, dirname(__DIR__, 2) . '/public/image/teaser/' . 'teaser-' . $fileName);
                        imagejpeg($fullImage, dirname(__DIR__, 2) . '/public/image/' . $fileName);
                    }
                } else {
//                    $imgName[] = null;
                }
            }
            return $imgName;
        }
    }

    protected function multiUploadVideo($video, $limit = null)
    {

        $filename = '';
        if (!empty($video)) {
            $videoName = [];
            if ($limit[1] !== null && is_numeric($limit[1])) {
                $count = $limit[1];
            } else {
                $count = count($video['name']);
            }
            for ($i = 0; $i < $count; $i++) {

                if (isset($video['error'][$i])) {
                    if ($video['error'][$i] === 0) {
                        $file = $video['name'][$i];
//                        $file = str_replace('jpeg', 'jpg', $file);
                        $fileArr = explode('.', $file);
                        $fileHash = md5(uniqid());
                        $ext = $fileArr[1];
                        $fileName = $fileHash . '.' . $fileArr[1];
                        if ($i === 0) $nameInArr = 'video_one';
                        elseif ($i === 1) $nameInArr = 'video_two';
                        elseif ($i === 2) $nameInArr = 'video_three';
                        elseif ($i === 3) $nameInArr = 'video_four';
                        elseif ($i === 4) $nameInArr = 'video_five';
                        $videoName[$nameInArr] = $fileName;

                        move_uploaded_file($video['tmp_name'][$i], dirname(__DIR__, 2) . '/public/video/' . $fileName);
                    }
                } else {
//                    $videoName = null;
                }
            }
            return $videoName;
        }
    }


    public function validateParam($formData, $className)
    {
        $limitArr = (new $className())->getValidate();

        foreach ($formData as $key => $item) {
            $range = $limitArr[$key];

            if (isset($range[1]) && is_numeric($range[0]) && $range[0] >= 0 && is_numeric($range[1]) && $range[1] > 0) {
                if (strlen($item) <= $range[1] && strlen($item) >= $range[0]) {
                    if (is_numeric($item)) {
                        if ($item >= 0) {
                        } else {
                            throw new \OutOfRangeException('Validate ' . $key . ' - out of range exception: ' . $key . ' is ' . "'" . $item . "'.");
                        }
                    } else {
                        if (isset($range[2])) {
                            if (preg_match($range[2], $item) === 1) {

                                if ($key === 'password-confirm') {
                                    if ($formData['password'] === $item) {
                                        unset($formData['password-confirm']);
                                    } else {
                                        throw new \LogicException('Validate ' . $key . ' - logic exception: ' . $key . 'not equal password');
                                    }
                                }
                            } else {
                                throw new \DomainException('Validate ' . $key . ' - domain exception: ' . $key . ' is ' . "'" . $item . "'.");
                            }
                        }
                    }
                } else {
                    throw new \LengthException('Validate ' . $key . ' - length exception: ' . $key . ' is ' . "'" . $item . "'.");
                }
            } else {
                throw new \LogicException('Validate ' . $key . ' - logic exception: ' . $key . ' is ' . "'" . $item . "'.");
            }
        }
        if (!file_exists(dirname(__DIR__, 2) . '/' . str_replace('\\', '/', $className) . '.php')) {
            throw new \ParseError('Validate Namespace - parse error: Namespace is ' . "'" . $className . "'.");
        }
        return true;

    }

    protected function updateData($fromFormValid, $tableName) {
        $sqlCycle = '';
        $primaryValue = 0;
        $tableKeys = self::showColumnsKey($tableName);
        $primaryKey = array_search('PRI', $tableKeys);
        foreach ($fromFormValid as $key => $item) {
            if($key === $primaryKey) {
                $primaryValue = $item;
            } elseif ($item === 'null') {
                $sqlCycle .= $key . '=' .  $item  . ',';

            } else {
                $sqlCycle .= $key . '=' . "'" . $item . "'" . ',';

            }
        }

        $sqlCycle = rtrim($sqlCycle, ',');

        $sqlUpdate = "UPDATE $tableName SET $sqlCycle WHERE $primaryKey='$primaryValue'";

        return DbConnection::inquireIntoDb($sqlUpdate);

    }

    protected function insertData($fromFormValid, $tableName)
    {
        $rowInfo = self::showColumnsKey($tableName);
        $resultArr = [];

        foreach ($fromFormValid as $key => $item) {
            if (!isset($fromFormValid[$key])) {
                throw new \LogicException('Validate ' . $key . ' - logic exception: ' . $key . 'There are no such fields in the database');

            }
        }
            foreach ($rowInfo as $key => $item) {
                if (isset($fromFormValid[$key])) {
                    $resultArr[$key] = $fromFormValid[$key];
                }
            }

            $fields = '(';
            $values = '(';
            foreach ($resultArr as $key => $value) {

                $fields .= $key . ', ';
                if($value === 'null') {
                    $values .= $value . ', ';
                } else {
                    $values .= "'$value'" . ', ';
                }
            }
            $fields = rtrim(rtrim($fields), ',') . ')';
            $values = rtrim(rtrim($values), ',') . ')';
            $sqlInsert = "INSERT INTO $tableName $fields VALUES $values";
            return DbConnection::inquireIntoDb($sqlInsert);
        }

    protected function deleteData($fromFormValid, $tableName)
    {
        $rowInfo = self::showColumnsKey($tableName);
        $resultArr = [];

        foreach ($fromFormValid as $key => $item) {
            if (!isset($fromFormValid[$key])) {
                throw new \LogicException('Validate ' . $key . ' - logic exception: ' . $key . 'There are no such fields in the database');

            }
        }
            foreach ($rowInfo as $key => $item) {
                if (isset($fromFormValid[$key])) {
                    $resultArr[$key] = $fromFormValid[$key];
                }
            }

            $field = '';
            $value = '';
            foreach ($resultArr as $key => $item) {
                $field = $key;
                $value = $item;
            }

            $sqlDelete = "DELETE FROM $tableName WHERE $field=$value";
            return DbConnection::inquireIntoDb($sqlDelete);

    }

    protected function deleteImg($fromFormValid, $tableName)
    {
        $rowInfo = self::showColumnsKey($tableName);
        $resultArr = [];

        foreach ($fromFormValid as $key => $item) {
            if (!isset($fromFormValid[$key])) {
                throw new \LogicException('Validate ' . $key . ' - logic exception: ' . $key . 'There are no such fields in the database');

            }
        }
            foreach ($rowInfo as $key => $item) {
                if (isset($fromFormValid[$key])) {
                    $resultArr[$key] = $fromFormValid[$key];
                }
                if (preg_match('#^(img_)(.+)$#ui', $key, $matches) === 1) {
                    $resultArr[] = $key;
                }
            }
            $fields = '';
            $sqlKey = '';
            $sqlValue = '';

            foreach ($resultArr as $key => $item) {
                if (!is_numeric($key)) {
                    $sqlKey = $key;
                    $sqlValue = $item;
                } else {
                    $fields .= $item . ',';
                }
            }
            $fields = rtrim($fields, ',');

            $sqlDelete = "SELECT $fields FROM $tableName WHERE $sqlKey=$sqlValue";
            $res = DbConnection::inquireIntoDb($sqlDelete)[0];
            if($res === false) {
                throw new \LogicException('sql syntax error');

            } else {
                foreach ($res as $key => $item) {
                    if($item === null) {
                        unset($res[$key]);
                    } else {
                        if(file_exists(dirname(__DIR__, 2) . '/public/image/' . $item)) {
                          $imgFileDelete =  unlink(dirname(__DIR__, 2) . '/public/image/' . $item);
                            if(file_exists(dirname(__DIR__, 2) . '/public/image/teaser/teaser-' . $item)) {
                                $teaserImgFileDelete =  unlink(dirname(__DIR__, 2) . '/public/image/teaser/teaser-' . $item);

                        } else {
//                                throw new \LogicException('Teaser image file is not existed');
                            }
                    } else {
//                            throw new \LogicException('Image file is not existed');
                        }
                    }
//                        if(($imgFileDelete !== true || $teaserImgFileDelete  !== true)) {
//                           throw new \LogicException('File deletion error');
//                        }

                }
                return true;
            }

    }

    protected function deleteVideo($fromFormValid, $tableName)
    {
        $rowInfo = self::showColumnsKey($tableName);
        $resultArr = [];

        foreach ($fromFormValid as $key => $item) {
            if (!isset($fromFormValid[$key])) {
                throw new \LogicException('Validate ' . $key . ' - logic exception: ' . $key . 'There are no such fields in the database');

            }
        }
        foreach ($rowInfo as $key => $item) {
            if (isset($fromFormValid[$key])) {
                $resultArr[$key] = $fromFormValid[$key];
            }
            if (preg_match('#^(video_)(.+)$#ui', $key, $matches) === 1) {
                $resultArr[] = $key;
            }
        }
        $fields = '';
        $sqlKey = '';
        $sqlValue = '';

        foreach ($resultArr as $key => $item) {
            if (!is_numeric($key)) {
                $sqlKey = $key;
                $sqlValue = $item;
            } else {
                $fields .= $item . ',';
            }
        }
        $fields = rtrim($fields, ',');

        $sqlDelete = "SELECT $fields FROM $tableName WHERE $sqlKey=$sqlValue";
        $res = DbConnection::inquireIntoDb($sqlDelete)[0];
        if($res === false) {
            throw new \LogicException('sql syntax error');

        } else {
            foreach ($res as $key => $item) {
                if($item === null) {
                    unset($res[$key]);
                } else {
                    if(file_exists(dirname(__DIR__, 2) . '/public/video/' . $item)) {
                        $imgFileDelete =  unlink(dirname(__DIR__, 2) . '/public/video/' . $item);
                    } else {
//                            throw new \LogicException('Image file is not existed');
                    }
                }
//                        if(($imgFileDelete !== true || $teaserImgFileDelete  !== true)) {
//                           throw new \LogicException('File deletion error');
//                        }

            }
            return true;
        }

    }

    protected function classNameToTableName($className) {

        if(!empty($className)) {

            $classArr = explode('\\', $className);
            $class = end($classArr);

            if (preg_match('#^(\w+?)([A-Z])([a-z]+)([A-Z])*([a-z]*?)$#', $class, $matches) === 1) {
                if (empty($matches[4]) && empty($matches[5])) {
                    $tableName = $matches[1] . '_' . strtolower($matches[2]) . $matches[3] . $matches[4] . $matches[5];
                } else {
                    $tableName = $matches[1] . '_' . strtolower($matches[2]) . $matches[3] . '_' . strtolower($matches[4]) . $matches[5];
                }

            } else {
                $tableName = strtolower($class);
            }

            return $tableName;

        } else {
            throw new \LogicException('ClassName is empty!');

        }
    }

    protected function getUserId() {
            $userId = 0;
        if ($_SESSION['id'] !== null) {
            $userId = $_SESSION['id'];
            $userId = (int)$userId;
            return $userId;
        } elseif ($_COOKIE['login'] !== null) {
            $login = $_COOKIE['login'];
            $sqlUserId = "SELECT id FROM public.user WHERE login='$login'";
            $userId = DbConnection::inquireIntoDb($sqlUserId)[0]['id'];
            if(is_int($userId)) {

                return $userId;
            } else {
                throw new \LogicException('Undefined user');
            }


        } else {
            throw new \LogicException('Authentication Error');

        }
    }

    protected function getDbObject() {

    }
}