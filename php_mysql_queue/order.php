<?php
include 'mysql.php';

$config=array(
    "dbhost"=>"127.0.0.1",
    "dnuser"=>'root',
    "dbpsw"=>"root",
    "dbname"=>"test",  
    "dbcharset"=>"utf-8"
);


$dbObj = new ms_new_mysql("127.0.0.1", "root", "root", "test", "", "utf-8", "0");
// 订单信息
for ($i=0; $i <50 ; $i++) { 
    $inert_data=array(
        'order_id'=>date('YmdHis',time()),
        'mobile'=>'15608'.rand(100000,999999),
        'status'=>0
    );
    // 插入订单信息到订单表
    sleep(1);
    $tables = $dbObj->insert('t_order_queue',$inert_data);

    if($tables){
        echo $inert_data['order_id'] ." post success!\n";
    }else{
        echo $inert_data['order_id'] ." post error!\n";
    }
    // var_dump($tables);
}
