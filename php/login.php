<?php
/**
 * Created by PhpStorm.
 * User: KS
 * Date: 2016/4/13
 * Time: 18:51
 */
if(!empty($_POST["user"]) && !empty($_POST["password"]))
{
    $userName=addslashes($_POST["user"]);
    $password=addslashes($_POST["password"]);

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=kstest', "root", "nankai");
        $user=$dbh->query("SELECT * from userinfo where username='".$userName."'and password='".$password."'");
        $dbh = null;/*关闭数据库*/
        if($user->rowCount()>0)
        {
            $jsonArr = Array("result"=>"success","info"=>urlencode(iconv("utf-8","gbk"," 登录成功")));
            echo urldecode(json_encode($jsonArr));
        }
        else
        {
            $jsonArr = Array("result"=>"failed","info"=>urlencode(iconv("utf-8","gbk","用户名或密码错误")));
            echo urldecode(json_encode($jsonArr));
        }

    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br/>";
        die("connect to DB error");
    }

}
else
{
    $jsonArr = Array("result"=>"failed","info"=>urlencode(iconv("utf-8","gbk","请输入用户名和密码")));
    echo urldecode(json_encode($jsonArr));
}
?>