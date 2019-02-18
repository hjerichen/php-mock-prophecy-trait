<?php

namespace HJerichen\PhpMockProphecyTrait;

use phpmock\prophecy\PHPProphet;
use Prophecy\Prophecy\ProphecyInterface;

trait ProphesizePHP
{
    /**
     * @var PHPProphet
     */
    private $phpProphet;

    /**
     * @throws \Throwable
     */
    public function runBare(): void
    {
        /** @noinspection PhpUndefinedClassInspection */
        parent::runBare();

        if ($this->phpProphet !== null) {
            $this->phpProphet->checkPredictions();
        }
        $this->phpProphet = null;
    }


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
        }
        return $this->phpProphet;
    }


}