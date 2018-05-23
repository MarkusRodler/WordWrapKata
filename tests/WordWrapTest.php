<?php
declare(strict_types = 1);

namespace Dark\Kata\Tests;

use Dark\Kata\WordWrap;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers Dark\Kata\WordWrap
 */
class WordWrapTest extends TestCase
{
    public function testWrapAcceptsEmptyStrings()
    {
        $wordWrap = new WordWrap();

        $result = $wordWrap->wrap('', 4);
        
        $this->assertEquals('', $result);
    }

    public function testWrapAcceptsOnlyPositiveWrapLength()
    {
        $this->expectException(InvalidArgumentException::class);

        $wordWrap = new WordWrap();

        $wordWrap->wrap('', -1);
    }

    public function testWrapMakesNoWrapIfStringLengthEqualsWrapLength()
    {
        $wordWrap = new WordWrap();

        $result = $wordWrap->wrap('test test', 9);

        $this->assertEquals('test test', $result);
    }

    public function testWrapMakesNoWrapIfStringLengthIsBelowWrapLength()
    {
        $wordWrap = new WordWrap();

        $result = $wordWrap->wrap('test test', 10);

        $this->assertEquals('test test', $result);
    }

    public function testWrapSplitWordsIfTheyAreLongerThanWrapLength()
    {
        $wordWrap = new WordWrap();

        $result = $wordWrap->wrap('testtesttest', 4);

        $this->assertEquals('test' . PHP_EOL . 'test' . PHP_EOL . 'test', $result);
    }

    public function testWrapMakesOneWrapIfStringContainsOneSpaceAndLineLengthIsBelowStringLength()
    {
        $wordWrap = new WordWrap();

        $result = $wordWrap->wrap('test test', 6);

        $this->assertEquals('test' . PHP_EOL . 'test', $result);
    }

    public function testWrapWorks()
    {
        $wordWrap = new WordWrap();

        $result = $wordWrap->wrap('0123 4 56 789', 3);

        $this->assertEquals('012' . PHP_EOL . '3 4' . PHP_EOL . '56' . PHP_EOL . '789', $result);
    }
}
