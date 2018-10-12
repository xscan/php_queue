<?php
include 'mysql.php';


$dbObj = new ms_new_mysql("127.0.0.1", "root", "root", "test", "", "utf-8", "0");

// 1.处理订单
// 2.配送订单

// 处理订单
$waiting = "status=0";
$lock = array('status'=>2);
$res_lock = $dbObj->update('t_order_queue',$lock,$waiting,5);
// var_dump($res_lock);
if($res_lock){
    // 配送订单
    echo "get order 5 success!\n";
    $res = $dbObj->query('select * from t_order_queue where status=2 limit 2');

    // $result = $dbObj->fetchArray($res);
    while($result = $dbObj->fetchArray($res) ){
        // print_r($result);
        $success = array(
            'updated_at'=>date('Y-m-d H:i:s',time()),
            'status'=>1
        );
        $where = 'id='.$result['id'];
        $issuccess = $dbObj->update('t_order_queue',$success,$where,1);
        if($issuccess){
            echo "$result[order_id] order success!\n";
        }else{
            echo "$result[order_id] order error!\n";
        }
    }
}else{
    echo "get order error!\n";
}
// 配送订单
// // 订单信息
// $inert_data=array(
//     'order_id'=>rand(100000,999999),
//     'mobile'=>'15608464062',
//     'status'=>0
// );
// // 插入订单信息到订单表
// $tables = $dbObj->insert('t_order_queue',$inert_data);
// var_dump($tables);

