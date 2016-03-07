<?php
include '../../conn/conn.php';
mysql_query("set names utf8" );
if(isset($_POST['tname'])and isset($_POST['tid'])){
	$tid=$_POST['tid'];
	$tname=$_POST['tname'];
	
	
	$sql_check="select * from teacher where tname='$tname'and tid='$tid'";
	$result=mysql_query($sql_check)or die(mysql_error());
	if(mysql_num_rows($result)==1)
	{
	    echo"<script type=\"text/javascript\">";
	    echo"alert(\"数据已存在!\");";
	    echo"location.href=\"addjs.php\"";
	    echo"</script>";
	
	}
	
	else{
		
	
	$sql1="insert into teacher(tname,tid)values('$tname','$tid')";
	if(mysql_query($sql1)){
	echo"<script> alert('插入数据成功!');location.href='addjs.php';</script>";
	}
	else
	    echo"<script> alert('插入数据失败!');location.href='addjs.php';</script>";
	
	}
}
	else {
	    echo"<script> alert('你还没有登录!');window.location.href='../index.html';</script>";
	}
	
		
	
	
?>