<?php
/**
 * Created by PhpStorm.
 * User: ljx@dotamore.com
 * Date: 2019/4/15
 * Time: 0:14
 */

/**
 * 获取下周日时间戳
 * @return false|int
 */
function getLastSunDayTimeStamp()
{
    return strtotime(date('Y-m-d 23:59:59',strtotime('last sunday', time())));
}