<?php

namespace Arrilot\SystemCheck\Test;

use Arrilot\SystemCheck\Checks\Check;
use Arrilot\SystemCheck\ChecksCollection;
use PHPUnit_Framework_TestCase;
use StdClass;

class ChecksCollectionTest extends PHPUnit_Framework_TestCase
{
    protected function collection()
    {
        $app = new StdClass();

        return new ChecksCollection($app);
    }

    public function test_it_returns_some_server_checks()
    {
        $collection = $this->collection();

        $checks = $collection->getServerChecks('production');

        $this->assertInternalType('array', $checks);
        $this->assertTrue(is_subclass_of($checks[0], Check::class));
    }

    public function test_it_returns_some_laravel_checks()
    {
        $collection = $this->collection();

        $checks = $collection->getLaravelChecks('production');

        $this->assertInternalType('array', $checks);
        $this->assertTrue(is_subclass_of($checks[0], Check::class));
    }
}
