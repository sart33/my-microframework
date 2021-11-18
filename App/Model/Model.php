<?php


namespace App\Model;


use App\Db\DbConnection;

class Model implements ValidateMethods, SqlMethods, ViewMethods
{
    use ModelMethods;

    public function getValidate()
    {
        return [];
    }

    public function findAll($id)
    {
        $className = get_called_class();
        $tableName = $this->classNameToTableName($className);

        if ($tableName !== false) {
            if ($id !== null) {
                if (is_int($id) && $id > 0) {
                    return $this->paginate($tableName, $id, 'created_at', 'desc');
                } else {
                    throw new \UnexpectedValueException('Not numeric $id argument or $id <= 0');
               }
            } else {
                return $this->paginate($tableName, $id, 'created_at', 'desc');
            }
        } else {
            throw new \TypeError('$tableName value is empty!');


        }
    }

    public function findAllWithGetParam($field, $asc, $id)
    {
        $className = get_called_class();
        $tableName = $this->classNameToTableName($className);

        if ($tableName !== false) {
            if ($id !== null) {
                if (is_int($id) && $id > 0) {
                    return $this->paginate($tableName, $id, $field, $asc);
                } else {
                    return false;
                }
            } else {
                return $this->paginate($tableName, $id, $field, $asc);
            }
        } else {
            return false;
        }
    }


//    protected function classNameToTableName($className) {
//
//        if(!empty($className)) {
//
//            $classArr = explode('\\', $className);
//            $class = end($classArr);
//
//            if (preg_match('#^(\w+?)([A-Z])([a-z]+)([A-Z])*([a-z]*?)$#', $class, $matches) === 1) {
//                if (empty($matches[4]) && empty($matches[5])) {
//                    $tableName = $matches[1] . '_' . strtolower($matches[2]) . $matches[3] . $matches[4] . $matches[5];
//                } else {
//                    $tableName = $matches[1] . '_' . strtolower($matches[2]) . $matches[3] . '_' . strtolower($matches[4]) . $matches[5];
//                }
//
//            } else {
//                $tableName = strtolower($class);
//            }
//
//            return $tableName;
//
//        } else {
//            throw new \LogicException('ClassName is empty!');
//
//        }
//    }

    public function findOne($id)
    {

        $className = get_called_class();
        $tableName = $this->classNameToTableName($className);

        if ($tableName !== false) {
            $sql = "SELECT * FROM $tableName WHERE id =$id";

            if (isset(DbConnection::inquireIntoDb($sql)[0])) {
                return DbConnection::inquireIntoDb($sql)[0];
            } else {
                throw new \LogicException('SQL query error!');

            }

        } else {
            throw new \LogicException('get called ClassName error!');
        }
    }

    public function paginate($tableName, $id, $field = 'created_at', $asc = true)
    {
        if (isset($id)) {
            $paginate = $id;
        } else {
            $paginate = 1;
        }

        $sizePage = PAGINATION_COUNT;
        // Вычисляем с какого объекта начать выводить
        $offset = ($paginate - 1) * $sizePage;
        $sql = "SELECT COUNT(*) FROM $tableName";
        $quantity = (DbConnection::inquireIntoDb($sql))[0]['count'];
        $totalPages = ceil($quantity / $sizePage);

        if ($asc === 'asc') {
            $sqlTwo = "SELECT * FROM $tableName ORDER BY $field ASC LIMIT $sizePage OFFSET $offset";
        } elseif ($asc === 'desc') {
            $sqlTwo = "SELECT * FROM $tableName ORDER BY $field DESC LIMIT $sizePage OFFSET $offset";
        } else {
            $sqlTwo = "SELECT * FROM $tableName ORDER BY $field DESC LIMIT $sizePage OFFSET $offset";
        }
        $params['result'] = DbConnection::inquireIntoDb($sqlTwo);
        $params['totalPages'] = $totalPages;
        $params['paginate'] = $paginate;

        return $params;

    }

    public function validate($param, $img, $video)
    {
            if (!empty($param['token'])) {
                if (hash_equals($_SESSION['token'], $param['token'])) {
                    unset($param['token']);
                    $className = get_called_class();
                    $firstKey = array_key_first($param);
                    $formDataTrue = preg_match('#^\w+?Form$#', $firstKey);
                    if ($formDataTrue === 1) {
                        $formData = $param[$firstKey];
                        try {
                            $validValue = $this->validateParam($formData, $className);

                            if (!empty($img['name'][0]) && empty($video['name'][0]))
                            {
                                    $formData['img_one'] = 'null';

                                if (!empty($img['name'][1])) {
                                    $formData['img_two'] = 'null';
                                }
                                if (!empty($img['name'][2])) {
                                    $formData['img_three'] = 'null';
                                }
                                if (!empty($img['name'][3])) {
                                    $formData['img_four'] = 'null';
                                }
                                if (!empty($img['name'][4])) {
                                    $formData['img_five'] = 'null';
                                }
                                $limit = (new $className())->getValidate()['img'];
                                $validateImgFile = $this->multiUploadImg($img, $limit);
                                $fromForm = array_merge($formData, $validateImgFile);
                            } elseif (empty($img['name'][0]) && !empty($video['name'][0]))
                            {

                                $formData['video_one'] = 'null';

                                if (!empty($video['name'][1])) {
                                    $formData['video_two'] = 'null';
                                }
                                if (!empty($video['name'][2])) {
                                    $formData['video_three'] = 'null';
                                }
                                if (!empty($video['name'][3])) {
                                    $formData['video_four'] = 'null';
                                }
                                if (!empty($video['name'][4])) {
                                    $formData['video_five'] = 'null';
                                }
                                $limitVideo = (new $className())->getValidate()['video'];
                                $validateVideoFile = $this->multiUploadVideo($video, $limitVideo);
                                $fromForm = array_merge($formData, $validateVideoFile);
                            } elseif (!empty($img['name'][0]) && !empty($video['name'][0])) {

                                    $formData['img_one'] = 'null';

                                if (!empty($img['name'][1])) {
                                    $formData['img_two'] = 'null';
                                }
                                if (!empty($img['name'][2])) {
                                    $formData['img_three'] = 'null';
                                }
                                if (!empty($img['name'][3])) {
                                    $formData['img_four'] = 'null';
                                }
                                if (!empty($img['name'][4])) {
                                    $formData['img_five'] = 'null';
                                }
                                    $formData['video_one'] = 'null';

                                if (!empty($video['name'][1])) {
                                    $formData['video_two'] = 'null';
                                }
                                if (!empty($video['name'][2])) {
                                    $formData['video_three'] = 'null';
                                }
                                if (!empty($video['name'][3])) {
                                    $formData['video_four'] = 'null';
                                }
                                if (!empty($video['name'][4])) {
                                    $formData['video_five'] = 'null';
                                }
                                $limit = (new $className())->getValidate()['img'];
                                $validateImgFile = $this->multiUploadImg($img, $limit);
                                $limitVideo = (new $className())->getValidate()['video'];
                                $validateVideoFile = $this->multiUploadVideo($video, $limitVideo);
                                $fromForm = array_merge($formData, $validateImgFile, $validateVideoFile);
                            }
                            else {
                                $fromForm = $formData;
                            }
                            return $fromForm;
                        } catch (\Exception $e) {
                            $messageException = "[" . date('Y-m-d H:i:s', time()) . "] Exception message: " . $e->getMessage() . " in file: " . $e->getFile() . " line number: " . $e->getLine() . PHP_EOL;
                            file_put_contents(dirname(__DIR__) . '/Log/exception.txt', $messageException, FILE_APPEND | LOCK_EX);

                        } catch (\ParseError $e) {
                            $messageError = "[" . date('Y-m-d H:i:s', time()) . "] Error message: " . $e->getMessage() . " in file: " . $e->getFile() . " line number: " . $e->getLine() . PHP_EOL;

                            file_put_contents(dirname(__DIR__) . '/Log/error.txt', $messageError, FILE_APPEND | LOCK_EX);
                        }
                    } else {
                        throw new \LogicException('Validation Logic Exception!!! - it\'s not a data from form');

                    }
                } else {

                    throw new \LogicException('Safe Error!!! - invalid Token');
                }

            }
            throw new \LogicException('Safe Error!!! - Token is empty!');

    }

    public function create($param, $img = null, $video = null) {
        $className = get_called_class();
        $tableName = $this->classNameToTableName($className);
        $fromFormValid = $this->validate($param, $img, $video);
        $res = $this->insertData($fromFormValid, $tableName);
        if($res!== null) return true;
    }

    public function update($param, $img = null, $video = null) {
        $sqlCycle = '';
        $id = 0;
        $className = get_called_class();
        $tableName = $this->classNameToTableName($className);
        $fromFormValid = $this->validate($param, $img, $video);
        $res = $this->updateData($fromFormValid, $tableName);
        if($res!== null) {
            return true;
        } else {
            throw new \LogicException('Update data into db - Error!');
        }

    }

    public function delete($id) {
        $params = $_POST;
        $className = get_called_class();
        $tableName = $this->classNameToTableName($className);
        $fromFormValid = $this->validate($params, null, null);
        $imgDelete = $this->deleteImg($fromFormValid, $tableName);
        $videoDelete = $this->deleteVideo($fromFormValid, $tableName);
        if($imgDelete === true && $videoDelete === true) {
          $dataDelete = $this->deleteData($fromFormValid, $tableName);
            if($dataDelete !== false ) {
                return true;
            } else {

            }
        }


    }


    static protected function showColumnsKey($table)
    {
        $tableColumns = [];
        $table_catalog = DB_NAME;
        $query = "select column_name, ordinal_position, column_default from information_schema.columns 
                where 
                table_catalog = '$table_catalog' and 
                table_schema = 'public' and
                table_name = '$table'";
        if (!empty(DbConnection::inquireIntoDb($query))) {
            $res = DbConnection::inquireIntoDb($query);
            foreach ($res as $item) {
                if (preg_match('#^(nextval).+$#u', $item['column_default']) === 1) {
                    $tableColumns[$item['column_name']] = 'PRI';
                } else {
                    $tableColumns[$item['column_name']] = 'field.' . $item['ordinal_position'];
                }
            }
            return $tableColumns;
        } else {
            return false;
        }
    }
}