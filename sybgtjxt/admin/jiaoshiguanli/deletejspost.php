<?php
include '../../conn/conn.php';
mysql_query("set names utf8" );
if( isset($_POST['tid'])){
	$tid=$_POST['tid'];
	
	
	$sql_check="select * from teacher where tid='$tid'";
	$result=mysql_query($sql_check)or die(mysql_error());
	if(mysql_num_rows($result)==0)
	{
	    echo"<script type=\"text/javascript\">";
	    echo"alert(\"数据不存在!\");";
	    echo"location.href=\"deletejs.html\"";
	    echo"</script>";
	
	}
	else{
	$sql1="delete from releaseassignment where tid='$tid'";
	$sql2="delete from teacher where tid='$tid'";
	$sql3="delete from user where uid='$tid'";
	$sql4="delete from correct where tid='$tid'";
	$sql5="delete from teachcourse where tid='$tid'";
	
	if(mysql_query($sql1)&&mysql_query($sql2)&&mysql_query($sql3)
		&&mysql_query($sql4)&&mysql_query($sql5)){
	echo"<script> alert('删除数据成功!');location.href='deletejs.html';</script>";
	
	
	}
	else
		echo"<script> alert('删除数据失败!');location.href='deletejs.html';</script>";
}
}
	
	else 
	    echo"<script> alert('你还没有登录!');window.location.href='../index.html';</script>";
	
	
	
	
?>