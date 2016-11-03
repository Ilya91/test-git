<?php
echo "I don`t know";
echo "hello world!!!";
//trew and true

function test_rec($a){
    echo $a;
    if ($a < 10){
        test_rec($a +1);
    }
}
test_rec(5);