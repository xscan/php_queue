<?php
$redis = new Redis();
$redis->connect('127.0.0.1',6379);
$redis_name="miaosha";

$uid = time();
$num=10;

if($redis->lLen($redis_name)<10){
    $redis->rPush($redis_name,$uid.'%'.microtime());
    echo $uid."miaosha ok";
}else{
    echo "miaosha no";
}
