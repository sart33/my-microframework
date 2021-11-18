<?php
namespace App\Test;

use App\Model\ModelMethods;
use PHPUnit\Framework\TestCase;

class ModelMethodTest extends TestCase
{

    use \App\Model\ModelMethods;

    private $model;

    protected function setUp(): void
    {
        $this->model = ModelMethods::class;
    }

    protected function tearDown(): void
    {
        $this->model = NULL;
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
        $mock = $this->getMockBuilder(ModelMethods::class)
            ->setMethods(['classNameToTableName'])
            ->getMock();
        $mock->expects($this->once())->method('classNameToTableName')->will($this->returnValue($className));
        $result = $mock->classNameToTableName($className);

//        $this->assertEquals('aquarium', $result);
        $this->assertArrayHasKey('added_no3', $result);
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
}