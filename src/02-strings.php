<?php
/**
 * The $input variable contains text in snake case (i.e. hello_world or this_is_home_task)
 * Transform it into camel cased string and return (i.e. helloWorld or thisIsHomeTask)
 * @see http://xahlee.info/comp/camelCase_vs_snake_case.html
 *
 * @param  string $input
 * @return string
 */
function snakeCaseToCamelCase(string $input)
{
    $arr = explode('_', $input);
    $string = '';
    foreach ($arr as $key => $value) {
        $string .= ucfirst($value);
    }
    $string = lcfirst($string);

    return $string;
}

/**
 * The $input variable contains multibyte text like 'ФЫВА олдж'
 * Mirror each word individually and return transformed text (i.e. 'АВЫФ ждло')
 * !!! do not change words order
 *
 * @param  string $input
 * @return string
 */
function mirrorMultibyteString(string $input)
{
    $array = explode(' ', $input);
    $prepare = [];
    foreach ($array as $key => $value) {
        $prepare[] = mb_strrev($value);
    }

    return implode(' ', $prepare);
}

/**
 * @param string $string
 * @return string
 */
function mb_strrev(string $string)
{
    $result = '';
    for ($i = mb_strlen($string); $i >= 0; $i--) {
        $result .= mb_substr($string, $i, 1);
    }

    return $result;
}

/**
 * My friend wants a new band name for her band.
 * She likes bands that use the formula: 'The' + a noun with first letter capitalized.
 * However, when a noun STARTS and ENDS with the same letter,
 * she likes to repeat the noun twice and connect them together with the first and last letter,
 * combined into one word like so (WITHOUT a 'The' in front):
 * dolphin -> The Dolphin
 * alaska -> Alaskalaska
 * europe -> Europeurope
 * Implement this logic.
 *
 * @param  string $noun
 * @return string
 */
function getBrandName(string $noun)
{
    $string = $noun;
    if (mb_strtolower(mb_substr($string, 0, 1)) !== mb_strtolower(mb_substr($string, -1))) {
        return "The " . ucfirst($noun);
    }
    return ucfirst($noun) . mb_substr($noun, 1);
}