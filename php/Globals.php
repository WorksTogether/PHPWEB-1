<?php
/**
 * Created by PhpStorm.
 * User: KS
 * Date: 2016/5/14
 * Time: 21:46
 */
function isLogin()
{
    if( $_SESSION["login"] == true)
        return true;

    return false;
}
?>