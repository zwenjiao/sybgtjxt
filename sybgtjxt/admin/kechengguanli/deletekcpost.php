<?php
include '../../conn/conn.php';
mysql_query("set names utf8" );
if(isset($_POST['cname'])and isset($_POST['pro'])and isset($_POST['grade'])){
	$cname=$_POST['cname'];
	$pro=$_POST['pro'];
	
	$grade=$_POST['grade'];
	
	$sql_check="select * from course where cname='$cname'and pro='$pro'and grade='$grade'";
	$result=mysql_query($sql_check)or die(mysql_error());
 	if(mysql_num_rows($result)==0)
 	{
 	    echo"<script type=\"text/javascript\">";
 	    echo"alert(\"数据不存在!\");";
 	    echo"location.href=\"deletekc.php\"";
 	    echo"</script>";
	
 	}
 	else{
	$sql1="delete from course where cname='$cname'and pro='$pro'and grade='$grade'"; 
	$result=mysql_query($sql1)or die(mysql_error());
	if(mysql_query($sql1)){
	echo"<script> alert('删除数据成功!');location.href='deletekc.php';</script>";
	
	
	}
	else
	    echo"<script> alert('删除数据失败!');location.href='deletekc.php';</script>";
	
	}
}
	else {
	    echo"<script> alert('你还没有登录!');window.location.href='../index.html';</script>";
	}
	
		

	
?>