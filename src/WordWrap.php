<?php
declare(strict_types = 1);

namespace Dark\Kata;

use InvalidArgumentException;

class WordWrap
{
    public function wrap(string $text, int $wrapLength) : string
    {
        $this->ensureWrapLengthIsPositive($wrapLength);

        $result = '';
        if ($wrapLength < strlen($text)) {
            $substring = substr($text, 0, $wrapLength + 1);
            $lastSpace = strrpos($substring, ' ');
            $result = ($lastSpace)
                    ? substr($substring, 0, $lastSpace)
                        . PHP_EOL
                        . $this->wrap(substr($text, $lastSpace + 1), $wrapLength)
                    : substr($text, 0, $wrapLength)
                        . PHP_EOL
                        . $this->wrap(substr($text, $wrapLength), $wrapLength);
        }
        else {
            $result = $text;
        }
        return $result;
    }
    
    /**
     * @throws InvalidArgumentException
     */
    private function ensureWrapLengthIsPositive(int $wrapLength): void
    {
        if ($wrapLength < 0) {
            throw new InvalidArgumentException('Wrap function allows only positive wrap length');
        }
    }
}
