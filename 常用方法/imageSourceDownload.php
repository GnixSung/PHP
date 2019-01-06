<?php
/**
 * Created by PhpStorm.
 * User: ljx@dotamore.com
 * Date: 2019/1/6
 * Time: 21:22
 */

function imageSourceDownload($url,$path = EASYSWOOLE_ROOT.'/Temp/Image/')
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    $file = curl_exec($ch);
    curl_close($ch);
    $filename = pathinfo($url, PATHINFO_BASENAME);
    $resource = fopen($path . $filename, 'a');
    fwrite($resource, $file);
    fclose($resource);
}