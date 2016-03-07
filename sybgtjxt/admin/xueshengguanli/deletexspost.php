<?php
include '../../conn/conn.php';
mysql_query("set names utf8" );
if(isset($_POST['sid'])){
     

	$sid=$_POST['sid'];
	
	

	$sql_check="select * from student where sid='$sid'";
	$result=mysql_query($sql_check)or die(mysql_error());
	if(mysql_num_rows($result)==0)
	{
	    echo"<script type=\"text/javascript\">";
	    echo"alert(\"数据不存在!\");";
	    echo"location.href=\"deletexs.html\"";
	    echo"</script>";
	
	}

	else{
		
	$sql1="delete from student where sid='$sid'"; 
	$sql2="delete from user where uid='$sid'"; 
	
	$sql3="delete from submitreport where sid='$sid'";
	$sql4="delete from selectcourse where sid='$sid'"; 
		if(mysql_query($sql1)&&mysql_query($sql2)&&mysql_query($sql3)&&mysql_query($sql4)){
	echo"<script> alert('删除数据成功!');location.href='deletexs.html';</script>";
	
	
	}
	else
		echo"<script> alert('删除数据失败!');location.href='deletexs.html';</script>";
	
	}
}
	else {
	    echo"<script> alert('你还没有登录!');window.location.href='../index.html';</script>";
	}
		
	
	
?>