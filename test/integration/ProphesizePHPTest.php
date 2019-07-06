<?php

namespace HJerichen\PhpMockProphecyTrait;


use phpmock\prophecy\PHPProphet;
use PHPUnit\Framework\TestCase;

/**
 * Class ProphesizePHPTest
 * @package HJerichen\PhpMockProphecyTrait
 * @author Heiko Jerichen <h.jerichen@nordwest.com>
 */
class ProphesizePHPTest extends TestCase
{
    use ProphesizePHP;

    /**
     * @var PHPProphet
     */
    private $php;

    /**
     *
     */
    public function setUp(): void
    {
        $this->php = $this->prophesizePHP(__NAMESPACE__);
    }

    /**
     *
     */
    public function testMicroTime(): void
    {
        $this->php->microtime(true)->willReturn(10);
        $this->php->reveal();

        $expected = 10;
        $actual = microtime(true);
        $this->assertEquals($expected, $actual);
    }

    /**
     *
     */
    public function testFilePutContents(): void
    {
        $filename = '/tmp/test-php-mock-prophecy-trait.txt';
        if (is_file($filename)) {
            $this->markTestIncomplete("Remove file {$filename}.");
        }

        $this->php->file_put_contents($filename, 'test')->shouldBeCalledOnce();
        $this->php->reveal();

        file_put_contents($filename, 'test');
        $this->assertFalse(is_file($filename));
    }

    /**
     *
     */
    public function testShouldNotBeCalledCountsAsPHPUnitAssertion(): void
    {
        $this->php->time()->shouldNotBeCalled();
        $this->php->reveal();
    }

    /**
     *
     */
    public function testUsageInSecondTest(): void
    {
        $this->php->time()->willReturn(123);
        $this->php->reveal();

        $this->assertEquals(123, time());
    }
}
