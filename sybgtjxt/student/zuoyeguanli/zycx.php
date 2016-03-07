
<?php
include '../../conn/conn.php';

mysql_query("set names utf8");
$pro = $_COOKIE["pro"];
$grade = $_COOKIE["grade"];
$uid = $_COOKIE['UserId'];
// echo $pro;
// echo $grade;
if (isset($_GET['page']) && (int) $_GET['page'] > 0)
    $page = $_GET['page'];
else {
    $page = 1;
}
$page_count = 3;
//从report中选择专业 年级 学号对应的报告
$select = mysql_query("select * from report where pro='$pro' and grade='$grade' and sid='$uid'");
//报告总数
$RecordCount = mysql_num_rows($select);
//  echo $RecordCount;
$PageCount = ceil($RecordCount / $page_count);
//  echo $PageCount;
$offect = ($page - 1) * $page_count;
// echo $offect;
$sql = mysql_query("select * from report where pro='$pro' and grade='$grade' and sid='$uid' order by assignmentid desc limit $offect,$page_count");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTDHTML 4.01//EN"

"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="content-Type" content="text/html; charset=utf-8">

<!-- Le styles -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    
    
     <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

</head>
<body>
	<form action="zycx.php" method="post" name="form1" id="form1">
		<div class="form-search">
			<input type="text" name="searchrname" id="searchrname" class="input-medium search-query" placeholder="请输入实验名称" /> 
			<button type="submit" class="btn">Search</button>
		</div>
	</form>
	<div >
		
		
				<table class="table table-bordered">
				<thead>
					<tr >
						<th >课程名称</th>
						<th >实验名称</th>
						<th >任课老师</th>
						<th >是否已经批改</th>
						<th >分数</th>
						<th >查看实验报告</th>
					</tr>
					</thead>
				<?php
        
    while ($array = mysql_fetch_array($sql)) {
        
        ?>
	
			
			
		 <?php
		$step=$array['step'];
		$analyse=$array['analyse'];
		$result=$array['result'];
            $cname = $array['cname'];
//              echo $cname;
            $rname=  $array['rname'];
           
            $assignmentid = $array['assignmentid'];
//             echo $assignmentid;
            $sql_correct="select * from correct where assignmentid='$assignmentid' and pro='$pro' and grade='$grade' and sid='$uid' and cname='$cname'";
            $result_correct=mysql_query($sql_correct) or die(mysql_error());
            $sql_correctresult = mysql_fetch_array($result_correct);
            $tid = $sql_correctresult[0];
//             echo $tid;
      
            $mark=$sql_correctresult[3];
            $report_grade=$sql_correctresult['report_grade'];
            //             echo $mark;
            $sql_teacher = "select * from teacher where tid='$tid'";
            $result_teacher = mysql_query($sql_teacher) or die(mysql_error());
            $sql_teacherresult = mysql_fetch_array($result_teacher);
            $tname = $sql_teacherresult[1];
            
            
            $sql_submitreport="select * from submitreport where sid='$uid' and cname='$cname' and pro='$pro' and grade='$grade' and assignmentid='$assignmentid'";
            
           $result_submitreport=mysql_query($sql_submitreport) or die(mysql_error());
           $sql_submitreportresult = mysql_fetch_array($result_submitreport);
           $is_modify=$sql_submitreportresult['is_modify'];
            ?>
					<form action="chaxun.php" method="post">
					<tbody>
						<tr>
							<td><?php echo $cname;?></td>
							<td><?php echo $rname;?></td>
							<td><?php echo  $tname;?></td>
							<td><?php if( $is_modify==1) echo "已批改";else echo "未批改";?></td>
							<td><?php echo  $report_grade;?></td>
							<td><button type="submit" class="btn">查看实验报告</button></td>
						</tr>
						<input type="hidden" value=<?php echo $tname;?> name="tname"
							id="tname"> 
							<input type="hidden" value=<?php echo $rname;?>
							name="rname" id="rname"> 
							<input type="hidden"
							value=<?php echo $cname;?> name="cname" id="cname"> 
							<input
							type="hidden" value=<?php echo $assignmentid;?>
							name="assignmentid" id="assignmentid">
							<input
							type="hidden" value=<?php echo $step;?>
							name="step" id="step">
							<input
							type="hidden" value=<?php echo $analyse;?>
							name="analyse" id="analyse">
							<input
							type="hidden" value=<?php echo $result;?>
							name="result" id="result">
							<input type="hidden" value=<?php echo $mark;?>
							name="mark" id="mark">
							
                    </tbody>
					</form>
      
						
				<?php
    }
    ?>
    
    </table>
					<div class="pagination pagination-right">
								
								  <ul>
                                     <li><a href="zycx.php?page=1">首页</a></li>
								
								<li><a href="zycx.php?page=<?php  if($page==1){echo $page=1;} else {echo $page-1;}?>">上一页</a></li>
								<li><a href="zycx.php?page=<?php  if($page<$PageCount){echo $page+1;} else {echo $PageCount;}?>">下一页</a></li>
								<li><a href="zycx.php?page=<?php echo $PageCount;?>">尾页</a></li>
								</ul>
							
							</div>
				
					
				
			</div>

</body>
</html>

