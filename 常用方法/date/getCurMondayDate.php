<?php
/**
 * Created by PhpStorm.
 * User: ljx@dotamore.com
 * Date: 2019/4/15
 * Time: 0:12
 */

/**
 * 获取当前周一日期
 * @return false|string
 */
function getCurMonday()
{
    return date('Ymd', (time() - ((date('w') == 0 ? 7 : date('w')) - 1) * 24 * 3600));
}