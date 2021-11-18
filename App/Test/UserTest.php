<?php


namespace App\Test;

use App\Model\User;
use App\Model\ValidateMethods;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private $user;

    protected function setUp():void {
        $this->user = new User();
    }

    protected function tearDown():void {
        $this->user = NULL;
    }

    public function getValidRegister(): array {
        return [
            ['token' => '2158475b877446df7ef5ae6278ec0e357a2cd26ad0cda30b72a7cd4b231240ef',
                'SignupForm' => [
                'login' => 'Gleb99',
                'password' => 'KRqx54JmPRZAidc',
                'password-confirm' => 'KRqx54JmPRZAidc',
                'email' => 'test2@gmail.com',
                'agree' => '1'
                ]

            ]
        ];

    }
    /**
     * @test
     * @dataProvider getValidRegister
     */
    public function detect_an_valid_register_method($param) {
        $result = $this->user->register($param);
        $this->isTrue($result['registration']);
//        $this->assertIsNumeric(0, $result['totalPages']);
//        $this->assertIsNumeric(0, $result['paginate']);


    }

    public function getInvalidPaginate(): array {
        return [
            ['aquarium', '10', '-1'],
            ['aquarium', '-10', '2'],
            ['aquarium', '10', '0'],
            ['aquarium', '1', '0'],
            ['aquarium', '10', '100000'],
            ['aquarium', '0', '0'],
            ['aquarium', '-1', '-10000'],
            ['aquarium', '-10000', '-1'],




        ];

    }
    /**
     * @test
     * @dataProvider getInvalidPaginate
     */
    public function detect_an_invalid_paginate_method($tableName, $count, $id) {
        $result = $this->model->paginate($tableName, $count, $id);
        $this->assertFalse($result['result']);



    }
}