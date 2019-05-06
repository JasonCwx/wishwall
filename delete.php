<?php
//对于php代码中存在中文的情况设置header
header('content-type:text/html;charset:utf8');
//判断是否有参数传递过来，如果没有传递参数，则直接跳转到首页
if($_GET){
    //将传递过来的参数保存起来
    $key =  $_GET['key'];
    //连接数据库
    $link = mysqli_connect('localhost', 'root', 'root');
    //选择数据库
    mysqli_select_db($link, 'test');
    //设置数据库字符集
    mysqli_set_charset($link, 'utf8');
    //书写sql语句
    $sql = "DELETE FROM wish WHERE id={$key}";
    //执行sql语句
    $result = mysqli_query($link, $sql);
    //判断是否执行成功，是则提示相关信息并跳转到首页，关闭数据库连接
    //否则提示相关信息并跳转到首页，关系数据库连接
    if($result){
        echo "<script>alert('删除愿望成功！');window.location.href='index.php';</script>";
        mysqli_close($link);
    }
    else{
        echo "<script>alert('删除愿望失败！');window.location.href='index.php';</script>";
        mysqli_close($link);
    }
}else{
    echo "<script>window.location.href='index.php';</script>";
}