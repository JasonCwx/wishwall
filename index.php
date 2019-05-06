<?php
//对于php代码中存在中文的情况设置header
header('content-type:text/html;charset:utf8');
//连接数据库
$link = mysqli_connect('localhost', 'root', 'root');
//选择数据库
mysqli_select_db($link, 'test');
//设置数据库字符集
mysqli_set_charset($link, 'utf8');
//书写sql语句
$sql = "SELECT * FROM wish;";
//执行sql语句并返回结果
$result = mysqli_query($link, $sql);
//根据返回的结果判断是否成功获取数据，成功则将内容解析成多维数组并保存数据，如果获取失败则提示信息
if($result){
    $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($link);
}else{
    echo "<script>alert('获取愿望失败！');</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>许愿墙</title>
	<link rel="stylesheet" href="./Css/index.css" />
	<script type="text/javascript" src='./Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='./Js/index.js'></script>
</head>
<body>
	<div id='top'>
		<span id='send'></span>
	</div>
	<div id='main'>
        <!-- 将php代码中成功获取的多维数组数组通过foreach遍历出来 -->
        <?php foreach($arr as $val): ?>
		<dl class='paper <?php echo $val['colorId'] ?>'>
			<dt>
				<span class='username'><?php echo $val['username'] ?></span>
				<span class='num'>No.<?php echo $val['id'] ?></span>
			</dt>
			<dd class='content'><?php echo $val['content'] ?></dd>
			<dd class='bottom'>
                <!-- 通过数据中的日期数据对比当前日期，如果日期相同则显示为今天，否则显示自身保存的日期 -->
                <?php $str=''; $arr = explode(' ', $val['ctime']);if($arr[0] == date('Y-m-d')){$str = '今天';}else{$str=$arr[0];}; ?>
				<span class='time'><?php echo $str.$arr[1] ?></span>
                <!-- 前往index.js文件中将关于删除按钮的自身事件注释取消掉，并写入对应连接以及参数 -->
				<a href="delete.php?key=<?php echo $val['id'] ?>" class='close'></a>
			</dd>
		</dl>
        <?php endforeach; ?>
	</div>
	
<!--[if IE 6]>
    <script type="text/javascript" src="./Js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('#send,#close,.close','background');
    </script>
<![endif]-->
</body>
</html>