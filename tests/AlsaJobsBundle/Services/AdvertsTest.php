<?php


namespace tests\AlsaJobsBundle\Services;


use AlsaJobsBundle\Services\Adverts;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Vinelab\Rss\ArticlesCollection;

class AdvertsTest extends \PHPUnit_Framework_TestCase
{
    public function testGetData()
    {
        $advertsMock = $this->getMockBuilder(Adverts::class)
            ->setMethods()
            ->disableOriginalConstructor()
            ->getMock();
        
        $this->assertEquals(true, $advertsMock->getData() instanceof ArticlesCollection);
    }
}