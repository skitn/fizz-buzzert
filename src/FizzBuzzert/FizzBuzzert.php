<?php

namespace Skitn\FizzBuzzert;

class FizzBuzzert
{
    const PREFIX_NUMBER_METHOD = 'no';

    const TYPE_FIZZ = 1;
    const TYPE_BUZZ = 2;
    const TYPE_FIZZ_BUZZ = 3;

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
                throw new \Exception('invalid number');
            }

            if ($expected_no % 3 === 0 && $expected_no % 5 === 0) {
                if ($value['say'] !== self::TYPE_FIZZ_BUZZ) {
                    throw new \Exception(sprintf('assert fizz buzz. num=%d', $expected_no));
                }
            } elseif ($expected_no % 3 === 0 && $value['say'] !== self::TYPE_FIZZ) {
                throw new \Exception(sprintf('assert fizz. num=%d', $expected_no));
            } elseif ($expected_no % 5 === 0 && $value['say'] !== self::TYPE_BUZZ) {
                throw new \Exception(sprintf('assert buzz. num=%d', $expected_no));
            }
        }
    }
}

$fizz_buzzert = new FizzBuzzert();
$fizz_buzzert
    ->no1()
    ->no2()
    ->no3(FizzBuzzert::TYPE_FIZZ)
    ->no4()
    ->no5(FizzBuzzert::TYPE_BUZZ)
    ->no6(FizzBuzzert::TYPE_FIZZ)
    ->no7()
    ->no8()
    ->no9(FizzBuzzert::TYPE_FIZZ)
    ->no10(FizzBuzzert::TYPE_BUZZ)
    ->no11()
    ->no12(FizzBuzzert::TYPE_FIZZ)
    ->no13()
    ->no14()
    ->no15(FizzBuzzert::TYPE_FIZZ_BUZZ)
    ->run();
