<?php

require_once './vendor/autoload.php';

use Skitn\FizzBuzzert\FizzBuzzert;

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
