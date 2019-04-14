<?php
/**
 * Created by PhpStorm.
 * User: ljx@dotamore.com
 * Date: 2019/4/15
 * Time: 0:13
 */


/**
 * 根据传入日期获取周日时间戳
 * @param $date
 * @return false|int
 */
function getSunDayTimeStampForDate($date)
{
    $dateTimeStamp = strtotime($date);
    return strtotime(date('Y-m-d 23:59:59', strtotime('this week Sunday', $dateTimeStamp)));
}