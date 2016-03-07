<?php
include '../../conn/conn.php';
mysql_query("set names utf8" );
if(isset($_POST['sname'])and isset($_POST['sid'])and isset($_POST['class'])and isset($_POST['pro'])and isset($_POST['grade'])){
   

	$sid=$_POST['sid'];
	$sname=$_POST['sname'];
	$class=$_POST['class'];
	$pro=$_POST['pro'];
	$grade=$_POST['grade'];
	
	$sql_check="select * from student where sname='$sname'and pro='$pro'and grade='$grade' and sid='$sid' and class='$class'";
	$result=mysql_query($sql_check)or die(mysql_error());
	if(mysql_num_rows($result)==1)
	{
	    echo"<script type=\"text/javascript\">";
	    echo"alert(\"数据已存在!\");";
	    echo"location.href=\"addxs.php\"";
	    echo"</script>";
	
	}

	else{
		
	$sql1="insert into student(sid,sname,class,pro,grade)
	values('$sid','$sname','$class','$pro','$grade')"; 
	
	if(mysql_query($sql1)){
	echo"<script> alert('插入数据成功!');location.href='addxs.php';</script>";
	
	
	}
	else
	    echo"<script> alert('插入数据失败!');location.href='addxs.php';</script>";
	
	}
}
	else {
	    echo"<script> alert('你还没有登录!');window.location.href='../index.html';</script>";
	}

	
		
	
	
?>