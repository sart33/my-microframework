<?php


namespace App\Model;


class Category extends Model
{

    protected $tableName;



    public function __construct() {
        $this->tableName = 'category';
    }

    public function getValidate() {
        return [

            'title' => [3, 200],
            'body' => [5, 1000],
            'keyword' => [5, 255],
            'description' => [5, 255],
            'img' => [1, 3]

        ];
    }
}