<?php
declare(strict_types = 1);

namespace Dark\Kata;

use InvalidArgumentException;

class WordWrap
{
    /**
     * @param string $string
     * @param int $wrapLength
     * @return string
     */
    public function wrap(string $string, int $wrapLength) : string
    {
        $this->ensureWrapLengthIsPositive($wrapLength);

        $result = '';
        if ($wrapLength < strlen($string)) {
            $substring = substr($string, 0, $wrapLength + 1);
            $lastSpace = strrpos($substring, ' ');
            $result = ($lastSpace)
                    ? substr($substring, 0, $lastSpace)
                        . PHP_EOL
                        . $this->wrap(substr($string, $lastSpace + 1), $wrapLength)
                    : substr($string, 0, $wrapLength)
                        . PHP_EOL
                        . $this->wrap(substr($string, $wrapLength), $wrapLength);
        }
        else {
            $result = $string;
        }
        return $result;
    }
    
    
    /**
     * @param int $wrapLength
     * @throws InvalidArgumentException
     */
    private function ensureWrapLengthIsPositive(int $wrapLength)
    {
        if ($wrapLength < 0) {
            throw new InvalidArgumentException('Wrap function allows only positive wrap length');
        }
    }
}
