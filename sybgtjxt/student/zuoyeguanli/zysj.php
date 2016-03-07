
<?php
include '../../conn/conn.php';


mysql_query("set names utf8");

date_default_timezone_set('PRC');
$date=date('Y-m-d ',time());




$pro = $_COOKIE["pro"];
$grade = $_COOKIE["grade"];
$uid = $_COOKIE['UserId'];
if (isset ( $_GET ['page'] ) && ( int ) $_GET ['page'] > 0)
	$page = $_GET ['page'];
else{
	$page = 1;
	}
	$page_count =3;

$sql = "select * from assignment  where pro='$pro' and grade='$grade' and cname in(select cname from selectcourse where sid='$uid')";
// date_default_timezone_set ( 'PRC' );
// $date = date ( 'Y-m-d', time () );
// echo $date;

$result = mysql_query ( $sql ) or die (mysql_error());
$RecordCount = mysql_num_rows ( $result );
 //echo $RecordCount;
$PageCount = ceil ( $RecordCount / $page_count );
// echo $PageCount;
$offect=($page-1)*$page_count;

// echo $pro;
// echo $grade;
$select=mysql_query("select * from assignment where pro='$pro' and grade='$grade' and cname in(select cname from selectcourse where sid='$uid') order by assignmentid desc limit $offect,$page_count");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTDHTML 4.01//EN"

"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="content-Type" content="text/html; charset=utf-8" >

<!-- Le styles -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    
    
     <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->


</head>
<body>
	<form action="zysj.php" method="post" name="form1" id="form1">
		<div class="form-search">
			<input type="text" name="searchrname" id="searchrname" class="input-medium search-query" placeholder="请输入实验名称" /> 
			<button type="submit" class="btn">Search</button>
		</div>
	</form>
	<div >
		
			<table  class="table table-bordered">
			<thead>
                <tr>
                  <th>课程名称</th>
                  <th>实验名称</th>
                  <th>任课老师</th>
                  <th>实验日期</th>
                  <th>实验报告</th>
                </tr>
              </thead>
					  
					
				<?php 
				while($array=mysql_fetch_array($select)){
				
				    $cname=$array['cname'];
				    // 					    echo $cname;
				    $assignmentid=$array['assignmentid'];
				    $sql_result=mysql_query("select * from releaseassignment where assignmentid='$assignmentid' and grade='$grade' and pro='$pro'and cname='$cname'");
				    $array_sql = mysql_fetch_array($sql_result);
				
				
				    
				

	
	
				
				
					   
					    
					    $tid=$array_sql['tid'];
					    
					    $sql_teacher="select * from teacher where tid='$tid'";
					   $result_teacher=mysql_query($sql_teacher)or die(mysql_error());
					   $sql_teacherresult=mysql_fetch_array($result_teacher);
				        $tname=$sql_teacherresult[1]; 
					   
					   $sql_assignment="select * from assignment where assignmentid='$assignmentid' and pro='$pro' and grade='$grade' and cname='$cname'";
					   $result_assignment=mysql_query($sql_assignment)or die(mysql_error());
					   $sql_assignmentresult=mysql_fetch_array($result_assignment);
			         $rname=$sql_assignmentresult[3];
					    
					    
					    ?>
					<form action="shangjiao.php" method="post">
					<tbody>
                <tr>
					<td><?php echo $cname;?></td>
					<td><?php echo $rname;?></td>
					<td><?php echo  $sql_teacherresult[1];?></td>
					<td><?php echo $array_sql['readate']?>至<?php echo $array_sql['cutdate']?></td>
					<td><button type="submit" class="btn" >上交实验报告</button></td>
					</tr>
					
					<input type="hidden" value=<?php echo $tname;?> name="tname" id="tname">
					<input type="hidden" value=<?php echo $rname;?> name="rname" id="rname">
					<input type="hidden" value=<?php echo $cname;?> name="cname" id="cname">
					<input type="hidden" value=<?php echo $assignmentid;?> name="assignmentid" id="assignmentid">
                 </tbody>
                    </form>
                  <?php 
				}
                  ?>
						
				
				</table>		
						<div class="pagination pagination-right">
								
								  <ul>
                                     <li><a href="zysj.php?page=1">首页</a></li>
								
								<li><a href="zysj.php?page=<?php  if($page==1){echo $page=1;} else {echo $page-1;}?>">上一页</a></li>
								<li><a href="zysj.php?page=<?php  if($page<$PageCount){echo $page+1;} else {echo $PageCount;}?>">下一页</a></li>
								<li><a href="zysj.php?page=<?php echo $PageCount;?>">尾页</a></li>
								</ul>
							
							</div>
				
					
				
			</div>
		
		
	

</body>
</html>

