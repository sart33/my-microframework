<?php


namespace App\Model;


interface ViewMethods
{
    public function paginate($tableName, $id, $field = 'created_at', $asc = true);
}