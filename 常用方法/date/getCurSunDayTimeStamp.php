<?php
/**
 * Created by PhpStorm.
 * User: ljx@dotamore.com
 * Date: 2019/4/15
 * Time: 0:13
 */


/**
 * 获取本周日时间戳
 * @return false|int
 */
function getCurSunDayTimeStamp()
{
    return strtotime(date('Y-m-d 23:59:59', strtotime('this week Sunday', time())));
}