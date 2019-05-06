<?php
//对于php代码中存在中文的情况设置header
header('content-type:text/html;charset:utf8');
//php代码中有涉及到时间相关的代码和数据则需要设置时区，避免发生时间错误
date_default_timezone_set('Asia/Shanghai');

//判断用户是否点击提交/发送按钮
if(isset($_POST['submit'])){
    //取出表单发送过来并且保存在超全局变量$_POST中的数据并保存
    $name = htmlentities($_POST['name']);
    $content = htmlentities($_POST['content']);
    $color = $_POST['idvalue'];
    //在wish.php中没有设置默认的背景颜色的值，则加一步判断，如果没有选择颜色则默认是最后一个颜色
    if($color == ''){
        $color = 'a5';
    }
    //时间数据则使用用户点击提交确认按钮后的时间，用date函数获取
    $time = date("Y-m-d H:i:s");
    $code = $_POST['code'];
    $recode = $_POST['recode'];
    //判断署名是否为空，是则提示信息并且跳转到首页，终止程序
    if($name == ''){
        echo "<script>alert('署名没有填写!');window.location.href='wish.php';</script>";
        die;
    }
    //判断许愿内容是否为空，是则提示信息并且跳转到首页，终止程序
    if($content == ''){
        echo "<script>alert('愿望没有填写!');window.location.href='wish.php';</script>";
        die;
    }
    //判断用户输入的验证码是否匹配，是则提示信息并且跳转到首页，终止程序
    if($code != $recode){
        echo "<script>alert('验证码错误!');window.location.href='wish.php';</script>";
        die;
    }
    //连接数据库
    $link = mysqli_connect('localhost', 'root', 'root');
    //选择数据库
    mysqli_select_db($link, 'test');
    //设置数据库字符集
    mysqli_set_charset($link, 'utf8');
    //书写sql语句
    $sql = "INSERT wish(username, content, colorId, ctime) VALUES('{$name}', '{$content}', '{$color}', now());";
    //执行sql语句并将结果保存起来
    $result = mysqli_query($link, $sql);
    //根据结果判断是否执行成功，是则提示信息并转到首页，关闭mysql连接
    //否则提示相关信息并转回发布愿望页面关闭mysql连接
    if($result){
        mysqli_close($link);
        echo "<script>alert('发表愿望成功！');window.location.href='index.php';</script>";
    }else{
        echo "<script>alert('发表愿望失败！');window.location.href='wish.php';</script>";
        mysqli_close($link);
    }
}