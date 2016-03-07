<?php 
session_start();
?>
<?php
include 'conn/conn.php';
mysql_query("set names utf8" );
header("Content-type: text/html; charset=utf-8");
	
	if(isset($_POST['UserId'])and isset($_POST['Pwd'])){
	$uid=$_POST['UserId'];
	$pwd=$_POST['Pwd'];
	$sql="select * from user where uid='$uid' and pwd='$pwd'"; 
	$result=mysql_query($sql)or die(mysql_error());
	
	if(mysql_num_rows($result)==0)
	{
		echo"<script type=\"text/javascript\">";
        echo"alert(\"账号错误,请核对用户名和密码!\");";
        echo"location.href=\"index.html\"";
        echo"</script>";
	
	}
	if(mysql_num_rows($result)==1){

	
	setcookie("UserId",$uid,time()+24*3600,"/","localhost");
	setcookie("Pwd",$pwd,time()+24*3600,"/","localhost");
	
	//$_SESSION['login']=true;
	$_SESSION['UserId']=$uid;
	
	$result_array=mysql_fetch_row($result);
	$user_type=$result_array[1];
	
	if($user_type=="tea")//teacher
	{
	    $sql1="select * from teacher where tid='$uid'";
	    $result1=mysql_query($sql1)or  die(mysql_error());
	    if($rs=mysql_fetch_array($result1)){
	        $tname=$rs[1];
	       setcookie("tname",$tname,time()+24*3600,"/","localhost");
	    }
// 	    $sql2="select * from teachcourse where tid='$uid'";
// 	    $result2=mysql_query($sql2)or  die(mysql_error());
		echo"<script type=\"text/javascript\">";
		echo"location.href=\"teacher/main.php\"";
		echo"</script>";
		exit;
	}
	else if($user_type=="stu")//student
	{
	    $sql1="select * from student where sid='$uid'";
	    $result1=mysql_query($sql1)or  die(mysql_error());
	    if($rs=mysql_fetch_array($result1)){
	        $sname=$rs[1];
	        $class=$rs[2];
	        $grade=$rs[3];
	        $pro=$rs[4];

	        setcookie("sname",$sname,time()+24*3600,"/","localhost");
	        
	        setcookie("class",$class,time()+24*3600,"/","localhost");
	        setcookie("grade",$grade,time()+24*3600,"/","localhost");
	        setcookie("pro",$pro,time()+24*3600,"/","localhost");
	    }
		echo"<script type=\"text/javascript\">";
		echo"location.href=\"student/main.php\"";
		echo"</script>";
		exit;
	}
    else if($user_type=="admin")//manager
	{
		echo"<script type=\"text/javascript\">";
		
		echo"location.href=\"admin/main.php\"";
		echo"</script>";
		exit;
	}
	}
	else
		die("系统错误,非常抱歉!");
	}
	else {
	    echo"<script> alert('你好没有登录!');window.location.href='index.html';</script>";
	}

	
?>
