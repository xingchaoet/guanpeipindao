<?php
/**
 *
 * 把数组按指定的个数分隔
 * @param array $array 要分割的数组
 * @param int $groupNum 分的组数
 */
include_once("../auth.php");
function splitArray2($array, $groupNum)
{
    if (empty($array)) return array();

    //数组的总长度
    $allLength = count($array);

    //个数
    $groupNum = intval($groupNum);

    //开始位置
    $start = 0;

    //分成的数组中元素的个数
    $enum = (int)($allLength / $groupNum);

    //结果集
    $result = array();

    if ($enum > 0) {
        //被分数组中 能整除 分成数组中元素个数 的部分
        $firstLength = $enum * $groupNum;
        $firstArray = array();
        for ($i = 0; $i < $firstLength; $i++) {
            array_push($firstArray, $array[$i]);
            unset($array[$i]);
        }
        for ($i = 0; $i < $groupNum; $i++) {

            //从原数组中的指定开始位置和长度 截取元素放到新的数组中
            $result[] = array_slice($firstArray, $start, $enum);

            //开始位置加上累加元素的个数
            $start += $enum;
        }
        //数组剩余部分分别加到结果集的前几项中
        $secondLength = $allLength - $firstLength;
        for ($i = 0; $i < $secondLength; $i++) {
            array_push($result[$i], $array[$i + $firstLength]);
        }
    } else {
        for ($i = 0; $i < $allLength; $i++) {
            $result[] = array_slice($array, $i, 1);
        }
    }
    return $result;
}

//按一组多少个拆分
function splitArrayByNumPerPatch($array, $groupNum)
{

    if (empty($array)) return array();

    //数组的总长度
    $allLength = count($array);

    //一组几个
    $groupNum = intval($groupNum);

    //开始位置
    $start = 0;

    $next_start = array();

    $front_count = floor($allLength / $groupNum);

//    $last = $allLength % $groupNum;

    for ($i = 0; $i < $front_count; $i++, $start += $groupNum) {
        $result[] = array_slice($array, $start, $groupNum);
    }

//    到数组结束
    $result[] = array_slice($array, $start);

    return $result;
}

//按拆分的组数拆分
function splitArray($array, $groupNum)
{

    if (empty($array)) return array();

    //数组的总长度
    $allLength = count($array);

    //分成几组
    $groupNum = intval($groupNum);
    //结果集
    $result = array();

    $start = 0;
//前$groupNum个批次中的数量
    $front_count = floor($allLength / $groupNum);

    $last_index = $groupNum - 1;
    for ($i = 0; $i < $groupNum; $i++, $start += $front_count) {
        if ($i != $last_index) {
            $result[] = array_slice($array, $start, $front_count);
        }else{
            $result[] = array_slice($array, $start);
        }
    }

    return $result;
}

//function microtime_float(){
//    list($usec, $sec) = explode(" ", microtime());
//    return ((float)$usec + (float)$sec);
//}
//
//echo microtime_float();

//$test = array('0' => 0,
//    '1' => 1,
//    '2' => 2,
//    '3' => 3,
//    '4' => 4,
//    '5' => 5,
//    '6' => 6,
//);
//$result = splitArray($test, 3);
//print_r($result);
