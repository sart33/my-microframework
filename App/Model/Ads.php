<?php

namespace App\Model;

use App\Db\DbConnection;

class Ads extends Model
{
    private $tableName;



    public function __construct() {
        $this->tableName = 'ads';
    }

    public function getValidate() {
        return [
            'title' => [3, 200],
            'body' => [5, 1000],
            'price' => [1, 8],
            'img' => [1, 3]
            ];
    }

    public function getAdsList($properties)
    {

    }

}