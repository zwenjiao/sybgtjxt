<?php
     include '../../conn/conn.php';
     mysql_query("set names utf8");
	 date_default_timezone_set('PRC');
	 $date=date('Y-m-d ',time());
	 $pro=$_COOKIE['pro'];
	 $grade=$_COOKIE['grade'];
	 $uid=$_COOKIE['UserId'];
// 	echo $_POST['rname'];
// 	echo $_POST['cname'];
// 	echo $_POST['assignmentid'];
// 	echo $_POST['step'];
// 	echo $_POST['result'];
// 	echo $_POST['analyse'];
	 if(isset($_POST['cname'])and isset($_POST['rname'])and isset($_POST['assignmentid'])and isset($_POST['step'])and isset($_POST['result'])and isset($_POST['analyse'])){
	 $rname=$_POST['rname'];
	 $cname=$_POST['cname'];
	 $assignmentid=$_POST['assignmentid'];
	 $step=$_POST['step'];
	 $result=$_POST['result'];
	 $analyse=$_POST['analyse'];
	 
// 	 echo $date;
	$sql="insert into report(sid,grade,assignmentid,rname,step,result,analyse,pro,cname)values('$uid','$grade','$assignmentid','$rname', '$step', '$result', '$analyse', '$pro', '$cname')";
    
	if(mysql_query($sql)){
	echo"<script> alert('插入数据成功!');location.href='zysj.php';</script>";
	
	
	}
	else
	    echo"<script> alert('插入数据失败!');location.href='zysj.php';</script>";
	
    }
    else {
        echo"<script> alert('你还没有登录!');window.parent.location.href='../index.html';</script>";
    }
	
	