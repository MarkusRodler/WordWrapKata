<?php
declare(strict_types = 1);

namespace Dark\Kata;

/**
 * @covers \Dark\Kata\WordWrap
 */
class WordWrapTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var WordWrap $wordWrap
     */
    private $wordWrap;

    public function setUp()
    {
        parent::setUp();
        $this->wordWrap = new WordWrap();
    }

    public function testWrapAcceptsEmptyStrings()
    {
        $result = $this->wordWrap->wrap('', 4);
        $this->assertEquals('', $result);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testWrapAcceptsOnlyPositiveWrapLength()
    {
        $this->wordWrap->wrap('', -1);
    }

    public function testWrapMakesNoWrapIfStringLengthEqualsWrapLength()
    {
        $result = $this->wordWrap->wrap('test test', 9);
        $this->assertEquals('test test', $result);
    }

    public function testWrapMakesNoWrapIfStringLengthIsBelowWrapLength()
    {
        $result = $this->wordWrap->wrap('test test', 10);
        $this->assertEquals('test test', $result);
    }

    public function testWrapSplitWordsIfTheyAreLongerThanWrapLength()
    {
        $result = $this->wordWrap->wrap('testtesttest', 4);
        $this->assertEquals('test' . PHP_EOL . 'test' . PHP_EOL . 'test', $result);
    }

    public function testWrapMakesOneWrapIfStringContainsOneSpaceAndLineLengthIsBelowStringLength()
    {
        $result = $this->wordWrap->wrap('test test', 6);
        $this->assertEquals('test' . PHP_EOL . 'test', $result);
    }

    public function testWrapWorks()
    {
        $result = $this->wordWrap->wrap('0123 4 56 789', 3);
        $this->assertEquals('012' . PHP_EOL . '3 4' . PHP_EOL . '56' . PHP_EOL . '789', $result);
    }
}
