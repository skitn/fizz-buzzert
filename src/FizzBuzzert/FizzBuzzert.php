<?php

namespace Skitn\FizzBuzzert;

class FizzBuzzert
{
    const TYPE_FIZZ = 1;
    const TYPE_BUZZ = 2;
    const TYPE_FIZZ_BUZZ = 3;

    private const PREFIX_NUMBER_METHOD = 'no';

    private $fizz_buzz_list = [];

    public function __call(string $method_name, array $params)
    {
        $this->fizz_buzz_list[] = [
            'no'  => $method_name,
            'say' => $params[0] ?? ''
        ];
        return $this;
    }

    public function run()
    {
        $expected_no = 0;
        foreach ($this->fizz_buzz_list as $value) {
            $expected_no++;

            if (self::PREFIX_NUMBER_METHOD . $expected_no !== $value['no']) {
                throw new \BadMethodCallException('invalid call method.');
            }

            if ($expected_no % 3 === 0 && $expected_no % 5 === 0) {
                if ($value['say'] !== self::TYPE_FIZZ_BUZZ) {
                    throw new \UnexpectedValueException(sprintf('fizz-buzz, unexpected num=%d', $expected_no));
                }
            } elseif ($expected_no % 3 === 0 && $value['say'] !== self::TYPE_FIZZ) {
                throw new \UnexpectedValueException(sprintf('fizz, unexpected num=%d', $expected_no));
            } elseif ($expected_no % 5 === 0 && $value['say'] !== self::TYPE_BUZZ) {
                throw new \UnexpectedValueException(sprintf('buzz, unexpected num=%d', $expected_no));
            }
        }
    }
}
