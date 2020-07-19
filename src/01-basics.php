<?php
/**
 * The $minute variable contains a number from 0 to 59 (i.e. 10 or 25 or 60 etc).
 * Determine in which quarter of an hour the number falls.
 * Return one of the values: "first", "second", "third" and "fourth".
 * Throw InvalidArgumentException if $minute is negative of greater then 60.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  int $minute
 * @return string
 * @throws InvalidArgumentException
 */
function getMinuteQuarter(int $minute)
{
    if ($minute >= 1 && $minute <= 15) {
        return 'first';
    } elseif ($minute >= 16 && $minute <= 30) {
        return 'second';
    } elseif ($minute >= 31 && $minute <= 45) {
        return "third";
    } elseif (($minute >= 46 && $minute <= 60) || $minute == 0) {
        return "fourth";
    } else {
        throw new InvalidArgumentException();
    }
}

/**
 * The $year variable contains a year (i.e. 1995 or 2020 etc).
 * Return true if the year is Leap or false otherwise.
 * Throw InvalidArgumentException if $year is lower then 1900.
 * @see https://en.wikipedia.org/wiki/Leap_year
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  int $year
 * @return boolean
 * @throws InvalidArgumentException
 */
function isLeapYear(int $year)
{
    if ($year < 1900) {
        throw new InvalidArgumentException();
    }
    return date("d", strtotime("{$year}-02-29")) == 29;
}

/**
 * The $input variable contains a string of six digits (like '123456' or '385934').
 * Return true if the sum of the first three digits is equal with the sum of last three ones
 * (i.e. in first case 1+2+3 not equal with 4+5+6 - need to return false).
 * Throw InvalidArgumentException if $input contains more then 6 digits.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  string $input
 * @return boolean
 * @throws InvalidArgumentException
 */
function isSumEqual(string $input)
{
    if ((strlen($input) != 6)) {
        throw new InvalidArgumentException();
    }
    $digit = str_split($input);
    $digitArrayOne = array_slice($digit, 0, 3);
    $digitArrayTwo = array_slice($digit, 3, 6);
    return array_sum($digitArrayOne) == array_sum($digitArrayTwo);
}