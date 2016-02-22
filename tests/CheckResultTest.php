<?php

namespace Arrilot\SystemCheck\Test;

use Arrilot\SystemCheck\CheckResult;
use PHPUnit_Framework_TestCase;

class CheckResultTest extends PHPUnit_Framework_TestCase
{
    public function test_it_can_be_instantiated_with_ok_status()
    {
        $result = new CheckResult('Ok', 'Ok comment');

        $this->assertSame('Ok', $result->status);
        $this->assertSame('Ok comment', $result->comment);
    }

    public function test_it_can_be_instantiated_with_note_status()
    {
        $result = new CheckResult('Note', 'Note comment');

        $this->assertSame('Note', $result->status);
        $this->assertSame('Note comment', $result->comment);
    }

    public function test_it_can_be_instantiated_with_fail_status()
    {
        $result = new CheckResult('Fail', 'Fail comment');

        $this->assertSame('Fail', $result->status);
        $this->assertSame('Fail comment', $result->comment);
    }

    public function test_it_can_be_instantiated_with_skip_status()
    {
        $result = new CheckResult('Skip', 'Skip comment');

        $this->assertSame('Skip', $result->status);
        $this->assertSame('Skip comment', $result->comment);
    }

    public function test_it_can_not_be_instantiated_with_random_status()
    {
        $this->setExpectedException('InvalidArgumentException');

        $result = new CheckResult('Foo', 'Random comment');
    }
}
