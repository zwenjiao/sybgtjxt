
<?php
include 'conn/conn.php';
mysql_query("set names utf8" );
$uid=$_COOKIE['UserId'];
    if(isset($_POST['NewPwd'])){
	 
	
	   $NewPwd=$_POST['NewPwd'];
	
	
	
	$sql="update user set pwd='$NewPwd' where uid='$uid'"; 
	$result=mysql_query($sql)or die(mysql_error());
	if($result){
		echo"<script type='text/javascript'>";
		echo"alert('修改密码成功!')";
		echo"</script>";
		echo"<script type=\"text/javascript\">";
		echo"location.href=\"mima.html\"";
		echo"</script>";
		
	}
	else{
		echo"<script type='text/javascript'>";
		echo"alert('修改密码失败!')";
		echo"</script>";
		echo"<script type=\"text/javascript\">";
		echo"location.href=\"mima.html\"";
		echo"</script>";
		
	}
	
	
	}
	else {
	    echo"<script> alert('你还没有登录!');window.location.href='index.html';</script>";
	}

?>
