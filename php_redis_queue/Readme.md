# php+redis+mysql实现简单消息队列(商品秒杀)
##代码文件结构

        order.php 生成订单
        good.php 消费标记订单
        good.sh 轮询模拟消费者
##1. 生成订单
生成一个订单
         
        php order.php 

##2.消费订单
间隔2秒轮询redis队列，循环插入mysql数据库

        php good.php




