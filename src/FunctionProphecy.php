<?php


namespace HJerichen\PhpMockProphecyTrait;


use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Prophecy\ProphecyInterface;

/**
 *
 * @package
 * @author Heiko Jerichen <h.jerichen@nordwest.com>
 */
interface FunctionProphecy extends ProphecyInterface
{
    /**
     * @param string $filename
     * @param mixed $data
     * @param int $flags
     * @param resource $context
     * @return MethodProphecy
     */
    public function file_put_contents(string $filename, $data, int $flags = 0, $context = null): MethodProphecy;

    /**
     * @param bool $as_float
     * @return MethodProphecy
     */
    public function microtime(bool $as_float): MethodProphecy;
}