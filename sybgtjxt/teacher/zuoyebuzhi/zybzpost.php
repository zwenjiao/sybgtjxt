<?php

include '../../conn/conn.php';
mysql_query("set names utf8" );

    $tid=$_COOKIE['UserId'];
    
    if(isset($_POST['cname'])and isset($_POST['pro'])and isset($_POST['grade'])and isset($_POST['rname'])and isset($_POST['aim'])and isset($_POST['content'])){
    
	$cname=$_POST['cname'];
	//echo "$cname";
	


	$pro=$_POST['pro'];
	
	$grade=$_POST['grade'];
	//echo "$grade";
	
	$readate=date("Y-m-d",time());
	
// echo $readate;
	$YYYY=$_POST['YYYY'];
	$MM=$_POST['MM'];
	$MM=1000+$MM;
	$MM=(string)$MM;
	$MM=substr($MM,2,2);
	$DD=$_POST['DD'];
	$array=array("$YYYY","$MM","$DD");
	
	$arr_date=implode('',$array);
	
	$cutdate=date("Y-m-d",strtotime($arr_date));
// 	echo"$cutdate";

	$rname=$_POST['rname'];
	//echo "$rname";
	
	$aim=$_POST['aim'];
	//echo "$aim";
	
	$content=$_POST['content'];
	//echo "$content";

$sql_assignment="select * from assignment where cname='$cname' and pro='$pro' and grade='$grade' order by assignmentid desc";
    $result_assignment=mysql_query($sql_assignment)or die(mysql_error());
    $assignmentid_result=mysql_fetch_assoc($result_assignment);
	$assignmentid=$assignmentid_result['assignmentid']+1;
// 	echo $assignmentid;
	$sql2="INSERT INTO  assignment(assignmentid,cname,pro,rname,content,aim,grade)
	VALUES('$assignmentid','$cname','$pro','$rname','$content','$aim','$grade')";

	

	
	$sql1="INSERT INTO  releaseassignment(tid,assignmentid,readate,cutdate,pro,grade,cname)
	VALUES('$tid','$assignmentid','$readate','$cutdate','$pro','$grade','$cname')";
	if(mysql_query($sql1)&&mysql_query($sql2)){
	    echo"<script> alert('插入数据成功!');location.href='Mtmn.php';</script>";
	
	
	}
	else
	    echo"<script> alert('插入数据失败!');location.href='Mtmn.php';</script>";
	
	}
	else {
	    echo"<script> alert('你还没有登录!');window.location.href='../../index.html';</script>";
 	}
	
		
?>