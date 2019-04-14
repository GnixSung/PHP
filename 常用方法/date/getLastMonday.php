<?php
/**
 * Created by PhpStorm.
 * User: ljx@dotamore.com
 * Date: 2019/4/15
 * Time: 0:11
 */

/**
 * 获取下周一
 * @return false|string
 */
function getLastMonday()
{
    if (date('l',time()) == 'Monday')
    {
        return date('Ymd',strtotime('last monday'));
    }
    else
    {
        return date('Ymd',strtotime('-1 week last monday'));
    }
}