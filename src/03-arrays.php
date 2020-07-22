<?php
/**
 * The $input variable contains an array of digits
 * Return an array which will contain the same digits but repetitive by its value
 * without changing the order.
 * Example: [1,3,2] => [1,3,3,3,2,2]
 *
 * @param  array $input
 * @return array
 */
function repeatArrayValues(array $input)
{
    $result = [];
    foreach ($input as $key => $value) {
        for ($i = 1; $i <= $value; $i++) {
            $result[] = $value;
        }
    }
    return $result;
}

/**
 * The $input variable contains an array of digits
 * Return the lowest unique value or 0 if there is no unique values or array is empty.
 * Example: [1, 2, 3, 2, 1, 5, 6] => 3
 *
 * @param  array $input
 * @return int
 */
function getUniqueValue(array $input)
{
    $array = array_count_values($input);
    $array = array_filter($array, function ($value, $key) {
        if ($value == 1) {
            return true;
        }
    }, ARRAY_FILTER_USE_BOTH);
    if (!$array) {
        return 0;
    }
    $array = array_keys($array);
    $result = min($array);
    return $result;
}

/**
 * The $input variable contains an array of arrays
 * Each sub array has keys: name (contains strings), tags (contains array of strings)
 * Return the list of names grouped by tags
 * !!! The 'names' in returned array must be sorted ascending.
 *
 * Example:
 * [
 *  ['name' => 'potato', 'tags' => ['vegetable', 'yellow']],
 *  ['name' => 'apple', 'tags' => ['fruit', 'green']],
 *  ['name' => 'orange', 'tags' => ['fruit', 'yellow']],
 * ]
 *
 * Should be transformed into:
 * [
 *  'fruit' => ['apple', 'orange'],
 *  'green' => ['apple'],
 *  'vegetable' => ['potato'],
 *  'yellow' => ['orange', 'potato'],
 * ]
 *
 * @param  array $input
 * @return array
 */
function groupByTag(array $input)
{
    $tags = [];
    foreach ($input as $value) {
        $tags = array_merge_recursive($value['tags'], $tags);
    }
    $tags = array_unique($tags);
    $resultArray = [];
    foreach ($tags as $key => $value) {
        foreach ($input as $key2 => $value2) {
            if (in_array($value, $value2['tags'])) {
                $resultArray[$value] = array_merge(isset($resultArray[$value]) ? $resultArray[$value] : [], [$value2['name']]);
            }
        }
        sort($resultArray[$value], SORT_STRING);
    }
    return $resultArray;
}