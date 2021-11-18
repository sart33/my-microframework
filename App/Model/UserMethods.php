<?php


namespace App\Model;


interface UserMethods

{
    public function login($param);

    public function logout();

    public function register($param);

    public function verification($param);

    public function rememberMe($id, $login);

    public function remove($id);

    public function account($id);

    public function authTry():bool;

}