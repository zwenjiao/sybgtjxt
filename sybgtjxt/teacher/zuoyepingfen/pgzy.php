
<?php
include '../../conn/conn.php';


mysql_query("set names utf8");

$uid = $_COOKIE['UserId'];
if (isset ( $_GET ['page'] ) && ( int ) $_GET ['page'] > 0)
	$page = $_GET ['page'];
else{
	$page = 1;
	}
	$page_count =3;

$sql = "select * from releaseassignment a,submitreport b where a.tid='$uid' and a.assignmentid=b.assignmentid and a.cname=b.cname and a.pro=b.pro and a.grade=b.grade and b.is_modify=0";


$result = mysql_query ( $sql ) or die (mysql_error());
$RecordCount = mysql_num_rows ( $result );
 //echo $RecordCount;
$PageCount = ceil ( $RecordCount / $page_count );
// echo $PageCount;
$offect=($page-1)*$page_count;

// echo $pro;
// echo $grade;
$select=mysql_query("select * from releaseassignment a,submitreport b where a.tid='$uid' and a.assignmentid=b.assignmentid and a.cname=b.cname and a.pro=b.pro and a.grade=b.grade and b.is_modify=0 order by b.assignmentid desc limit $offect,$page_count");
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
	<form action="pgzy.php" method="post" name="form1" id="form1">
		<div class="form-search">
			<input type="text" name="searchrname" id="searchrname" class="input-medium search-query" placeholder="请输入实验名称" /> 
			<button type="submit" class="btn">Search</button>
		</div>
	</form>
	<div >
		
			<table  class="table table-bordered">
			<thead>
                <tr>
                  <th>作业编号</th>
                  <th>课程名称</th>
                  <th>实验名称</th>
                  <th>学生姓名</th>
                  <th>批改实验报告</th>
                </tr>
              </thead>
					  
					
				<?php 
				
				while($array=mysql_fetch_array($select)){
				    
				?>

	
	
				
				
					    <?php
					    $grade=$array['grade'];
					    $pro=$array['pro'];
					    $cname=$array['cname'];
// 					    echo $cname;
					    $assignmentid=$array['assignmentid'];
					    $sql_result=mysql_query("select * from submitreport where assignmentid='$assignmentid' and grade='$grade' and pro='$pro'and cname='$cname'");
					    $array_sql = mysql_fetch_array($sql_result);
					    $sid=$array_sql['sid'];
					    
					    $sql_student="select * from student where sid='$sid'";
					   $result_student=mysql_query( $sql_student)or die(mysql_error());
					   $sql_studentresult=mysql_fetch_array($result_student);
				        $sname=$sql_studentresult['sname']; 
					   
					   $sql_assignment="select * from assignment where assignmentid='$assignmentid' and pro='$pro' and grade='$grade' and cname='$cname'";
					   $result_assignment=mysql_query($sql_assignment)or die(mysql_error());
					   $sql_assignmentresult=mysql_fetch_array($result_assignment);
			         $rname=$sql_assignmentresult[3];
					    ?>
					<form action="pigai.php" method="post">
					<tbody>
                <tr>
                    <td><?php echo $assignmentid;?></td>
					<td><?php echo $cname;?></td>
					<td><?php echo $rname;?></td>
					<td><?php echo  $sname;?></td>
					
					<td><button type="submit" class="btn">批改实验报告</button></td>
					</tr>
					
					<input type="hidden" value=<?php echo $sid;?> name="sid" id="sid">
					<input type="hidden" value=<?php echo $rname;?> name="rname" id="rname">
					<input type="hidden" value=<?php echo $cname;?> name="cname" id="cname">
					<input type="hidden" value=<?php echo $assignmentid;?> name="assignmentid" id="assignmentid">
					<input type="hidden" value=<?php echo $pro;?> name="pro" id="pro">
					<input type="hidden" value=<?php echo $grade;?> name="grade" id="grade">
                 </tbody>
                    </form>
                   
						
				<?php 	
				}
				?>
				</table>		
						<div class="pagination pagination-right">
								
								  <ul>
                                     <li><a href="pgzy.php?page=1">首页</a></li>
								
								<li><a href="pgzy.php?page=<?php  if($page==1){echo $page=1;} else {echo $page-1;}?>">上一页</a></li>
								<li><a href="pgzy.php?page=<?php  if($page<$PageCount){echo $page+1;} else {echo $PageCount;}?>">下一页</a></li>
								<li><a href="pgzy.php?page=<?php echo $PageCount;?>">尾页</a></li>
								</ul>
							
							</div>
				
					
				
			</div>
		
		
	

</body>
</html>

