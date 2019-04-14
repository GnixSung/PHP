<?php
/**
 * Created by PhpStorm.
 * User: ljx@dotamore.com
 * Date: 2019/4/15
 * Time: 0:12
 */


/**
 * 获取本周一时间戳
 * @return false|int
 */
function getCurMondayTimeStamp()
{
    return strtotime(date('Y-m-d 00:00:00', (time() - ((date('w') == 0 ? 7 : date('w')) - 1) * 24 * 3600)));
}