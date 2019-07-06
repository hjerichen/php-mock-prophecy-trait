<?php


namespace HJerichen\PhpMockProphecyTrait;


use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Prophecy\ProphecyInterface;

/**
 * Interface FunctionProphecy
 * @package HJerichen\PhpMockProphecyTrait
 * @author Heiko Jerichen <h.jerichen@nordwest.com>
 */
interface FunctionProphecy extends ProphecyInterface
{
    /**
     * @param string $source
     * @param string $dest
     * @param resource $context [optional]
     * @return MethodProphecy
     */
    public function copy($source, $dest, $context = null): MethodProphecy;

    /**
     * @param string $format
     * @param int $timestamp [optional]
     * @return MethodProphecy
     */
    public function date($format, $timestamp = null): MethodProphecy;

    /**
     * @param string $hostname
     * @param int $type [optional]
     * @param array $authns [optional]
     * @param array $addtl [optional]
     * @param bool $raw [optional]
     * @return MethodProphecy
     */
    public function dns_get_record($hostname, $type = DNS_ANY, array &$authns = null, array &$addtl = null, &$raw = false): MethodProphecy;

    /**
     * @param string $status
     * @return MethodProphecy
     */
    public function exit($status = ''): MethodProphecy;

    /**
     * @param string $command
     * @param array|null $output [optional]
     * @param int|null $return_var [optional]
     * @return MethodProphecy
     */
    public function exec($command, array &$output = null, &$return_var = null): MethodProphecy;

    /**
     * @return MethodProphecy
     */
    public function getmypid(): MethodProphecy;

    /**
     * @param string $filename
     * @return MethodProphecy
     */
    public function file_exists(string $filename): MethodProphecy;

    /**
     * @param string $filename
     * @param bool $use_include_path [optional]
     * @param resource $context [optional]
     * @param int $offset [optional]
     * @param int $maxlen [optional]
     * @return MethodProphecy
     */
    public function file_get_contents($filename, $use_include_path = false, $context = null, $offset = 0, $maxlen = null): MethodProphecy;

    /**
     * @param string $filename
     * @param mixed $data
     * @param int $flags
     * @param resource $context
     * @return MethodProphecy
     */
    public function file_put_contents(string $filename, $data, int $flags = 0, $context = null): MethodProphecy;

    /**
     * @param object $object [optional]
     * @return MethodProphecy
     */
    public function get_class($object = null): MethodProphecy;

    /**
     * @param string $filename
     * @return MethodProphecy
     */
    public function is_dir(string $filename): MethodProphecy;

    /**
     * @param string $filename
     * @return MethodProphecy
     */
    public function is_file(string $filename): MethodProphecy;

    /**
     * @param bool $real_usage [optional]
     * @return MethodProphecy
     */
    public function memory_get_peak_usage(bool $real_usage = null): MethodProphecy;

    /**
     * @param bool $get_as_float
     * @return MethodProphecy
     */
    public function microtime(bool $get_as_float): MethodProphecy;

    /**
     * @param bool|null $on
     * @return MethodProphecy
     */
    public function pcntl_async_signals(bool $on = null): MethodProphecy;

    /**
     * @param int $signo
     * @param callable|int $handler
     * @param bool $restart_syscalls [optional]
     * @return MethodProphecy
     */
    public function pcntl_signal($signo, $handler, $restart_syscalls = true): MethodProphecy;

    /**
     * @return MethodProphecy
     */
    public function posix_getpid(): MethodProphecy;

    /**
     * @param int $processId
     * @return MethodProphecy
     */
    public function posix_getsid(int $processId): MethodProphecy;

    /**
     * @return MethodProphecy
     */
    public function posix_setsid(): MethodProphecy;

    /**
     * @param string $directory
     * @param int $sorting_order [optional]
     * @param resource $context [optional]
     * @return MethodProphecy
     */
    public function scandir($directory, $sorting_order = null, $context = null): MethodProphecy;

    /**
     * @param int $seconds
     * @return MethodProphecy
     */
    public function sleep(int $seconds): MethodProphecy;

    /**
     * @param string $time
     * @param int $now [optional]
     * @return MethodProphecy
     */
    public function strtotime(string $time, int $now = null): MethodProphecy;

    /**
     * @return MethodProphecy
     */
    public function time(): MethodProphecy;

    /**
     * @param string $filename
     * @param int $time [optional]
     * @param int $atime [optional]
     * @return MethodProphecy
     */
    public function touch($filename, $time = null, $atime = null): MethodProphecy;

    /**
     * @param string $prefix [optional]
     * @param bool $more_entropy [optional]
     * @return MethodProphecy
     */
    public function uniqid($prefix = '', $more_entropy = false): MethodProphecy;

    /**
     * @param string $filename
     * @param resource $context [optional]
     * @return MethodProphecy
     */
    public function unlink($filename, $context = null): MethodProphecy;

    /**
     * @param string $str
     * @param mixed $options [optional]
     * @return MethodProphecy
     */
    public function unserialize($str, array $options = null): MethodProphecy;

    /**
     * @param int $micro_seconds
     * @return MethodProphecy
     */
    public function usleep($micro_seconds): MethodProphecy;

    /**
     * @param mixed $expression
     * @param bool $return [optional]
     * @return MethodProphecy
     */
    public function var_export($expression, $return = null): MethodProphecy;
}