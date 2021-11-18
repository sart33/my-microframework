<?php


namespace App\Model;


interface ValidateMethods
{
    public function getValidate();

    public function validate($param, $img, $video);


}