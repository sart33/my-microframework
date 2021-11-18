<?php


namespace App\Test;

use App\Controller\Routing;
use App\Config\Routes;
use PHPUnit\Framework\TestCase;


final class RoutingTest extends TestCase
{
    private $routing;

    protected function setUp():void {
        $this->routing = new Routing();
    }

    protected function tearDown():void {
        $this->routing = NULL;
    }


    public function getInvalidPath(): array {
        return [
            ['/page/page'],
            ['/page/'],
            ['/index/11'],
            ['/view/'],
            ['/view'],
            ['/store/rst'],


        ];
    }
    /**
     * @test
     * @dataProvider getInvalidPath
     */
    public function detect_an_invalid_routing_url(string $url): void {
        $result = $this->routing->parse($url);
        $this->assertFalse($result);
    }


    public function getValidPathWithParam(): array {


        return [
            ['/page/1'],
            ['/page/2'],
            ['/view/2'],
            ['/view/23/'],
            ['/admin/category/view/5'],
            ['/admin/category/page/3'],
            ['/view/2']



        ];
    }
    /**
     * @test
     * @dataProvider getValidPathWithParam
     */
    public function detect_an_valid_routing_url_with_param(string $url): void {
        $result = $this->routing->parse($url);
       $this->assertArrayHasKey('className', $result);
        $this->assertArrayHasKey('action', $result);
        $this->assertArrayHasKey('param', $result);
    }



public function getValidPathWithoutParam(): array {


        return [

            [''],
            ['/index'],
            ['/store'],
            ['/admin'],
            ['/admin/index'],
            ['/admin/category'],
            ['/admin/category/index'],
            ['/admin/category/create'],
            ['/admin/category/store'],
            ['/index'],
            [''],
            ['/diary'],
            ['/create'],
            ['/store'],
            ['/charts'],
            ['/user/register'],
            ['/user/login'],
            ['/user/logout'],
            ['/verification'],
            ['/user/index']

        ];
    }
    /**
     * @test
     * @dataProvider getValidPathWithoutParam
     */
    public function detect_an_valid_routing_url_without_param(string $url): void {
        $result = $this->routing->parse($url);
        $this->assertArrayHasKey('className', $result);
        $this->assertArrayHasKey('action', $result);
    }





public function getValidPathWithoutParamWithTitle(): array {


        return [

            ['/index'],
            [''],
            ['/create'],
            ['/charts'],


        ];
    }
    /**
     * @test
     * @dataProvider getValidPathWithoutParamWithTitle
     */
    public function detect_an_valid_routing_url_without_param_with_title(string $url): void {
        $result = $this->routing->parse($url);
        $this->assertArrayHasKey('className', $result);
        $this->assertArrayHasKey('action', $result);
        $this->assertArrayHasKey('title', $result);
    }





    public function getValidPathWithGetParam(): array {


        return [

            ['/?sort=created_at&order=desc'],
            ['/?sort=price&order=asc'],
            ['/?sort=created_at&order=desc'],
            ['/?sort=created_at&order=asc'],
            ['/page/2?sort=created_at&order=asc'],
            ['/page/4?sort=created_at&order=asc'],
            ['/page/1?sort=created_at&order=asc'],
            ['/?sort=created_at&order=desc'],
            ['/?sort=created_at&order=asc'],
            ['/page/1?sort=created_at&order=asc'],
            ['/page/1?sort=created_at&order=desc']

        ];
    }
    /**
     * @test
     * @dataProvider getValidPathWithGetParam
     */
    public function detect_an_valid_routing_url_with_get_param(string $url): void {
        $result = $this->routing->parse($url);
        $this->assertArrayHasKey('className', $result);
        $this->assertArrayHasKey('action', $result);
        $this->assertArrayHasKey('sort', $result['getParam']);
        $this->assertArrayHasKey('order', $result['getParam']);
    }


}