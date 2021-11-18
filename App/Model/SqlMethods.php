<?php


namespace App\Model;


interface SqlMethods
{
    public function findAll(int $id);

    public function findOne(int $id);

    public function findAllWithGetParam($field, $asc, $id);

    public function create($param, $img = null, $video = null);

    public function update($param, $img = null, $video = null);

    public function delete(int $id);
}