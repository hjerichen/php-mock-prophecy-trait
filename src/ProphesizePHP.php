<?php
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpDocMissingThrowsInspection */


namespace HJerichen\PhpMockProphecyTrait;

use phpmock\prophecy\PHPProphet;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ProphecyInterface;
use Prophecy\Prophet;
use ReflectionException;
use ReflectionMethod;
use ReflectionProperty;
use Throwable;

/**
 * Trait ProphesizePHP
 * @package HJerichen\PhpMockProphecyTrait
 * @author Heiko Jerichen <h.jerichen@nordwest.com>
 */
trait ProphesizePHP
{
    /**
     * @var PHPProphet
     */
    private $phpProphet;

    /**
     * @param string $namespace
     * @return FunctionProphecy
     */
    protected function prophesizePHP(string $namespace): ProphecyInterface
    {
        return $this->getPHPProphet()->prophesize($namespace);
    }

    /**
     * @return PHPProphet
     */
    private function getPHPProphet(): PHPProphet
    {
        if ($this->phpProphet === null) {
            $this->phpProphet = new PHPProphet();
            $this->setProphetFromTestCase();
        }
        return $this->phpProphet;
    }

    /**
     * @throws ReflectionException
     */
    private function setProphetFromTestCase(): void
    {
        $prophet = $this->getProphetFromTestCase();
        $reflectionProperty = new ReflectionProperty(PHPProphet::class, 'prophet');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->phpProphet, $prophet);
    }

    /**
     * @return Prophet
     * @throws ReflectionException
     */
    private function getProphetFromTestCase(): Prophet
    {
        $refectionMethod = new ReflectionMethod(TestCase::class, 'getProphet');
        $refectionMethod->setAccessible(true);
        return $refectionMethod->invoke($this);
    }

    /**
     * @throws Throwable
     */
    public function runBare(): void
    {
        parent::runBare();

        if ($this->phpProphet !== null) {
            $this->phpProphet->checkPredictions();
        }
        $this->phpProphet = null;
    }
}