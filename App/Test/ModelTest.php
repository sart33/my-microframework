<?php
namespace App\Test;

use App\Model\Ads;
use App\Model\Aquarium;
use App\Model\Model;
use PHPUnit\Framework\TestCase;

final class ModelTest extends TestCase
{

        private $model;
        private $aquarium;

        protected function setUp():void {
            $this->model = new Model();
            $this->aquarium = new Aquarium();

        }

        protected function tearDown():void {
            $this->model = NULL;
            $this->aquarium = NULL;
        }

    public function getValidClassNameToTableName(): array {
        return [
            ['App\Model\Aquarium'],
//            ['App\Model\User'],
//            ['App\Model\UserFromRussia']
//            ['2'],
//            [10],
//            [20]
        ];
    }

    /**
     * @test
     * @dataProvider getValidClassNameToTableName
     */
    public function detect_an_valid_classNameToTableName_method($className) {
        $mock = $this->getMockBuilder(Model::class)
            ->setMethods(['classNameToTableName'])
            ->getMock();
        $mock->expects($this->once())->method('classNameToTableName')->will($this->returnValue($className));
        $result = $mock->classNameToTableName($className);

        $this->assertEquals('aquarium', $result);
//        $this->assertArrayHasKey('added_no3', $result);
//        $this->assertArrayHasKey('added_po4', $result);
//        $this->assertArrayHasKey('added_k', $result);
//        $this->assertArrayHasKey('added_micro', $result);
//        $this->assertArrayHasKey('added_con_k', $result);
//        $this->assertArrayHasKey('added_con_no3', $result);
//        $this->assertArrayHasKey('added_con_po4', $result);
//        $this->assertArrayHasKey('added_con_fe', $result);
//        $this->assertArrayHasKey('added_con_mg', $result);
//        $this->assertArrayHasKey('added_con_mn', $result);
//        $this->assertArrayHasKey('added_con_cu', $result);
//        $this->assertArrayHasKey('added_con_mo', $result);
//        $this->assertArrayHasKey('added_con_b', $result);
//        $this->assertArrayHasKey('added_con_zn', $result);
//        $this->assertArrayHasKey('added_fe', $result);
//        $this->assertArrayHasKey('added_co2', $result);
//        $this->assertArrayHasKey('water_change', $result);
//        $this->assertArrayHasKey('added_cidex', $result);
//        $this->assertArrayHasKey('test_no3', $result);
//        $this->assertArrayHasKey('test_po4', $result);
//        $this->assertArrayHasKey('description', $result);
//        $this->assertArrayHasKey('img_one', $result);
//        $this->assertArrayHasKey('img_two', $result);
//        $this->assertArrayHasKey('img_three', $result);
//        $this->assertArrayHasKey('img_four', $result);
//        $this->assertArrayHasKey('img_five', $result);
//        $this->assertArrayHasKey('test_ph', $result);
//        $this->assertArrayHasKey('test_kh', $result);
//        $this->assertArrayHasKey('test_gh', $result);
//        $this->assertArrayHasKey('test_k', $result);
//        $this->assertArrayHasKey('daylight_hours', $result);
//        $this->assertArrayHasKey('feed', $result);
//        $this->assertArrayHasKey('feed_quantity', $result);
//        $this->assertArrayHasKey('created_at', $result);
//        $this->assertArrayHasKey('user_id', $result);
    }

    public function getValidFindOne(): array {
        return [
            [1],
            [0],
            [null],
            [4],


        ];
    }

    /**
     * @test
     * @dataProvider getInvalidFindOne
     */
    public function detect_an_valid_findOne_method($id) {
        $mock = $this->getMockBuilder(Model::class)
            ->setMethods(['classNameToTableName'])
            ->getMock();
        $mock->expects($this->once())->method('classNameToTableName')->will($this->returnValue('aquarium'));
        $result = $mock->classNameToTableName('App\Model\Aquarium');
        $resultTwo = $this->aquarium->findOne($id);
//        $this->assertEquals('aquarium', $result);
        $this->assertArrayHasKey('added_po4', $resultTwo);


    }

    public function getInvalidFindOne(): array {
        return [
            [-1],
            ['0'],
            [1000],
            [''],
            ['a'],
            ['Я'],
            ['#'],

        ];
    }

    /**
     * @test
     * @dataProvider getInvalidFindOne
     */
    public function detect_an_invalid_findOne_method($id) {
        $this->expectException(\LogicException::class);
        $result = $this->aquarium->findOne($id);

    }



    public function getValidFindAll(): array {
        return [
            [null],
            [4],
            [1],
            [2]

        ];
    }

    /**
     * @test
     * @dataProvider getValidFindAll
     */
    public function detect_an_valid_findAll_method($id) {
        $result = $this->aquarium->findAll($id);
        $this->assertIsArray($result['result']);
        $this->assertArrayHasKey('totalPages', $result);
        $this->assertArrayHasKey('paginate', $result);
        $this->assertArrayHasKey('id', $result['result'][0]);
        $this->assertArrayHasKey('added_no3', $result['result'][0]);
        $this->assertArrayHasKey('added_po4', $result['result'][0]);
        $this->assertArrayHasKey('added_k', $result['result'][0]);
        $this->assertArrayHasKey('added_micro', $result['result'][0]);
        $this->assertArrayHasKey('added_con_k', $result['result'][0]);
        $this->assertArrayHasKey('added_con_no3', $result['result'][0]);
        $this->assertArrayHasKey('added_con_po4', $result['result'][0]);
        $this->assertArrayHasKey('added_con_fe', $result['result'][0]);
        $this->assertArrayHasKey('added_con_mg', $result['result'][0]);
        $this->assertArrayHasKey('added_con_mn', $result['result'][0]);
        $this->assertArrayHasKey('added_con_cu', $result['result'][0]);
        $this->assertArrayHasKey('added_con_mo', $result['result'][0]);
        $this->assertArrayHasKey('added_con_b', $result['result'][1]);
        $this->assertArrayHasKey('added_con_zn', $result['result'][1]);
        $this->assertArrayHasKey('added_fe', $result['result'][1]);
        $this->assertArrayHasKey('added_co2', $result['result'][1]);
        $this->assertArrayHasKey('water_change', $result['result'][1]);
        $this->assertArrayHasKey('added_cidex', $result['result'][1]);
        $this->assertArrayHasKey('test_no3', $result['result'][1]);
        $this->assertArrayHasKey('test_po4', $result['result'][1]);
        $this->assertArrayHasKey('description', $result['result'][1]);
        $this->assertArrayHasKey('img_one', $result['result'][1]);
        $this->assertArrayHasKey('img_two', $result['result'][1]);
        $this->assertArrayHasKey('img_three', $result['result'][1]);
        $this->assertArrayHasKey('img_four', $result['result'][1]);
        $this->assertArrayHasKey('img_five', $result['result'][1]);
        $this->assertArrayHasKey('test_ph', $result['result'][1]);
        $this->assertArrayHasKey('test_kh', $result['result'][1]);
        $this->assertArrayHasKey('test_gh', $result['result'][1]);
        $this->assertArrayHasKey('test_k', $result['result'][1]);
        $this->assertArrayHasKey('daylight_hours', $result['result'][1]);
        $this->assertArrayHasKey('feed', $result['result'][1]);
        $this->assertArrayHasKey('feed_quantity', $result['result'][1]);
        $this->assertArrayHasKey('created_at', $result['result'][1]);
        $this->assertArrayHasKey('user_id', $result['result'][1]);
    }

    public function getInvalidFindAll(): array {
        return [
            [-1],
            [0],
            ['1'],
            [''],
            ['a'],
            ['Я'],
            ['#'],


        ];
    }

    /**
     * @test
     * @dataProvider getInvalidFindAll
     */
    public function detect_an_invalid_findAll_method($id) {
        $this->expectException(\UnexpectedValueException::class);
        $result = $this->aquarium->findAll($id);

    }


    public function getValidPaginate(): array {
        return [
            ['aquarium', '1'],
            ['aquarium', '1'],
            ['aquarium', '2'],
            ['aquarium', '4'],
            ['aquarium','1'],




        ];

    }
    /**
     * @test
     * @dataProvider getValidPaginate
     */
    public function detect_an_valid_paginate_method($tableName, $id) {
        $result = $this->model->paginate($tableName,  $id);
        $this->assertArrayHasKey(0, $result['result']);
        $this->assertIsNumeric(0, $result['totalPages']);
        $this->assertIsNumeric(0, $result['paginate']);


    }



    public function getInvalidPaginate(): array {
        return [
            ['aquarium', '0'],
            ['aquarium', '-1'],
//            ['aquarium', '10'],
            ['aquarium', '-10'],







        ];

    }
    /**
     * @test
     * @dataProvider getInvalidPaginate
     */
    public function detect_an_invalid_paginate_method($tableName, $id) {
        $result = $this->model->paginate($tableName, $id);
         $this->assertFalse($result['result']);



    }

    public function getValidValidateParam(): array {
        return [


            [['title' => 'Some', 'body' => 'somewhere', 'price' => '0'], 'App\Model\Ads'],
            [['title' => 'Some Title', 'body' => 'Some where', 'price' => '100'], 'App\Model\Ads'],
            [['title' => '123', 'body' => 'Some where', 'price' => '100'], 'App\Model\Ads'],
            [['title' => '123', 'body' => '12345', 'price' => '100'], 'App\Model\Ads'],
            [['title' => 'Some Title', 'body' => 'Somewhere with something', 'price' => '100.20'], 'App\Model\Ads'],
            [['title' => 'Some Title', 'body' => 'Some where', 'price' => '0.20'], 'App\Model\Ads'],
            [['title' => 'Some Title Some Title Some Title Some Title Some Title Some Title Some Title Some Title Some 
            Title Some Title Some Title Some Title Some Title Some Title Some Title Some Title ',
                'body' => 'Some where', 'price' => '100.20'], 'App\Model\Ads'],



        ];

    }
    /**
     * @test
     * @dataProvider getValidValidateParam
     */
    public function detect_an_valid_validateParam_method($param, $className) {
        $result = $this->model->validateParam($param, $className);
        $this->assertTrue($result);





    }

    public function getLengthExceptionValidateParam(): array {
        return [
            [['title' => '', 'body' => 'somewhere', 'price' => '0'], 'App\Model\Ads'],
            [['title' => 'S', 'body' => 'somewhere', 'price' => '0'], 'App\Model\Ads'],
            [['title' => 'SS', 'body' => 'somewhere', 'price' => '0'], 'App\Model\Ads'],
//            [['title' => 'Some Title Some Title Some Title Some Title Some Title Some Title Some Title Some Title Some
//            Title Some Title Some Title Some Title Some Title Some Title Some Title Some Title Title Some Title Some Title Some Title Some Title Some Title Some Title Some Title',
//                'body' => 'Some where', 'price' => '100.20'], 'Ads'],
//
            [['title' => 'Some Title', 'body' => '', 'price' => '100'], 'App\Model\Ads'],
            [['title' => 'Some Title', 'body' => 'a', 'price' => '100'], 'App\Model\Ads'],
            [['title' => 'Some Title', 'body' => 'ab', 'price' => '100'], 'App\Model\Ads'],
            [['title' => 'Some Title', 'body' => 'abc', 'price' => '100'], 'App\Model\Ads'],
            [['title' => 'Some Title', 'body' => '1234', 'price' => '100'], 'App\Model\Ads'],
//
//            [['title' => 'Some Title', 'body' => 'Some where', 'price' => ''], 'App\Model\Ads'],
//            [['title' => 'Some Title', 'body' => 'Some where', 'price' => '-1'], 'App\Model\Ads'],
//
//            [['title' => 'Some Title', 'body' => 'Some where', 'price' => '100'], ''],
//            [['title' => 'Some Title', 'body' => 'Some where', 'price' => '100'], 'Ads'],
//            [['title' => 'Some Title', 'body' => 'Some where', 'price' => '100'], 'App\Model\Ads\\'],
//            [['title' => 'Some Title', 'body' => 'Some where', 'price' => '100'], 'App\Model\Ads.php'],




        ];

    }
    /**
     * @test
     * @dataProvider getLengthExceptionValidateParam
     */
    public function detect_an_LengthException_validateParam_method($param, $className) {
        $this->expectException(\LengthException::class);
//        $this->expectExceptionCode('the_expected_code');
//        $this->expectExceptionMessage("Validate  - error:  is ''");
//
//        // Here the method that throws the exception
//        throw new \Exception('Wrong exception');
        $this->model->validateParam($param, $className);






    }

    public function getOutOfRangeExceptionValidateParam(): array {
        return [

            [['title' => 'Some Title', 'body' => 'Some where', 'price' => '-10'], 'App\Model\Ads'],
            [['title' => 'Some Title', 'body' => 'Some where', 'price' => '-1'], 'App\Model\Ads'],
            [['title' => 'Some Title', 'body' => 'Some where', 'price' => '-0.1'], 'App\Model\Ads'],


        ];

    }
    /**
     * @test
     * @dataProvider getOutOfRangeExceptionValidateParam
     */
    public function detect_an_OutOfRangeException_validateParam_method($param, $className) {
        $this->expectException(\OutOfRangeException::class);
//        $this->expectExceptionCode('the_expected_code');
//        $this->expectExceptionMessage("Validate  - error:  is ''");
//
//        // Here the method that throws the exception
//        throw new \Exception('Wrong exception');
        $this->model->validateParam($param, $className);




    }



}