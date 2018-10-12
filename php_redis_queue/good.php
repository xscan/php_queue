<?php
include 'mysql.php';

$redis = new Redis();
$redis->connect('127.0.0.1',6379);
$redis_name="miaosha";

while(1){
    $res = $redis->lPop($redis_name);
    print $res."\n";
    if(!$res || $res=="nil"){
        sleep(2);
        continue;
    }
    $res_arr=explode("%",$res);
    $insert_data=array(
        "uid"=>$res_arr[0],
        "time_stamp"=>$res_arr[1]
    );
    $dbObj = new Mysqls("127.0.0.1", "root", "root", "test", "t_redis_queue");
    $dbres = $dbObj->add($insert_data);
    if(!$dbres){
        $redis->rPush($redis_name,$res);
    }

    sleep(2);
}