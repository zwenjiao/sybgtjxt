<?php
include '../../conn/conn.php';

mysql_query("set names utf8");
$tid=$_COOKIE['UserId'];
$assignmentid=$_POST['assignmentid'];
// echo $assignmentid;
$grade=$_POST['grade'];
// echo $grade;
$pro=$_POST['pro'];
// echo $pro;
$cname=$_POST['cname'];
// echo $cname;
$sid=$_POST['sid'];
// echo $sid;
$report_grade=$_POST['report_grade'];
// echo $report_grade;
 $mark=$_POST['mark'];
if(isset($_POST['cname'])and isset($_POST['grade'])and isset($_POST['assignmentid'])and isset($_POST['pro'])and isset($_POST['sid'])and isset($_POST['report_grade']))  {  

    $assignmentid=$_POST['assignmentid'];
    $grade=$_POST['grade'];
    $pro=$_POST['pro'];
    $cname=$_POST['cname'];
    $sid=$_POST['sid'];
    $report_grade=$_POST['report_grade'];
    $mark=$_POST['mark'];
    
    $sql1="insert into correct(tid,assignmentid,grade,mark,pro,cname,sid,report_grade)values('$tid','$assignmentid','$grade','$mark','$pro','$cname','$sid','$report_grade')";
    $sql2="update submitreport set is_modify=1 where sid='$sid' and assignmentid='$assignmentid' and pro='$pro' and grade='$grade' and cname='$cname'";
    if(mysql_query($sql1)&&mysql_query($sql2)){
        echo"<script> alert('插入数据成功!');location.href='pgzy.php';</script>";
    
    
    }
    else
        echo"<script> alert('插入数据失败!');location.href='pgzy.php';</script>";
    
    }
    else {
        echo"<script> alert('你还没有登录!');window.parent.location.href='../../index.html';</script>";
    }

?>