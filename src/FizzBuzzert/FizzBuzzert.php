<?php

namespace Skitn\FizzBuzzert;

class FizzBuzzert
{
    const TYPE_FIZZ = 1;
    const TYPE_BUZZ = 2;
    const TYPE_FIZZ_BUZZ = 3;

    private const PREFIX_NUMBER_METHOD = 'no';

    private $fizzBuzzList = [];

    public function __call(string $methodName, array $params)
    {
        $this->fizzBuzzList[] = [
            'no'  => $methodName,
            'say' => $params[0] ?? ''
        ];
        return $this;
    }

    public function run()
    {
        $expectedNumber = 0;
        foreach ($this->fizzBuzzList as $value) {
            $expectedNumber++;

            if (self::PREFIX_NUMBER_METHOD . $expectedNumber !== $value['no']) {
                throw new \BadMethodCallException('invalid call method.');
            }

            if ($expectedNumber % 3 === 0 && $expectedNumber % 5 === 0) {
                if ($value['say'] !== self::TYPE_FIZZ_BUZZ) {
                    throw new \UnexpectedValueException(sprintf('fizz-buzz, unexpected num=%d', $expectedNumber));
                }
            } elseif ($expectedNumber % 3 === 0 && $value['say'] !== self::TYPE_FIZZ) {
                throw new \UnexpectedValueException(sprintf('fizz, unexpected num=%d', $expectedNumber));
            } elseif ($expectedNumber % 5 === 0 && $value['say'] !== self::TYPE_BUZZ) {
                throw new \UnexpectedValueException(sprintf('buzz, unexpected num=%d', $expectedNumber));
            }
        }
    }
}
