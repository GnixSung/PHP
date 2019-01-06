<?php
/**
 * Created by PhpStorm.
 * User: ljx@dotamore.com
 * Date: 2019/1/6
 * Time: 21:21
 */

/**
 * 调用指定RPC服务
 * @param string $serviceName 服务名称
 * @param string $serviceGroup 服务组（RPC服务控制器名称）
 * @param string $serviceAction 服务行为名（RPC服务控制器action名称）
 * @param array $args 请求参数
 * @return bool|mixed|string
 */
function getRpcServiceData(string $serviceName,string $serviceGroup,string $serviceAction,array $args = [])
{
    if($serviceName==''||$serviceGroup==''||$serviceAction=='')
    {
        die('getRpcServiceData params error');
    }
    $data = [
        'serviceName'=>$serviceName,//服务名称
        'serviceGroup'=>$serviceGroup,//服务组（RPC服务控制器名称）
        'serviceAction'=>$serviceAction,//服务行为名（RPC服务控制器action名称）
        'args'=>$args
    ];
    $envServiceName = strtoupper($serviceName);
    $serviceAddress = ['ip'=>$_ENV['RPC_'.$envServiceName.'_SERVICE_IP'],'port'=>$_ENV['RPC_'.$envServiceName.'_SERVICE_PORT']];
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    if(socket_connect($socket, $serviceAddress['ip'], $serviceAddress['port']))
    {
        $sendStr = json_encode($data,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        socket_write($socket, pack('N', strlen($sendStr)).$sendStr);
        $result = socket_read($socket, 65533);
        $len = unpack('N',$result);
        $result = substr($result,'4');
        if(strlen($result) != $len[1])
        {
            $result = 'data error';
        }
        else
        {
            $result = json_decode($result,true);
        }
    }
    else
    {
        $result = "unable to connect, " . socket_strerror(socket_last_error());
    }
    socket_close($socket);
    return $result;
}