<?php
/**
 * Created by PhpStorm.
 * User: KS
 * Date: 2016/5/8
 * Time: 15:30
 */

$var=1;
$GLOBALS['var2']=2;
function test()
{
    echo $GLOBALS['var2'];
}
test();
echo $var;