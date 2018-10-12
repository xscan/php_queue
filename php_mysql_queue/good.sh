#!/bin/bash

echo "order up start!"
num=0
while :
do
    echo "number:${num}"
    num=`expr $num + 1`
    php -f good.php
    sleep 1
done
