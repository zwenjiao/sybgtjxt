<?php
include '../../conn/conn.php';

mysql_query("set names utf8");
$tname=$_POST['tname'];
$rname=$_POST['rname'];
$cname=$_POST['cname'];
$step=$_POST['step'];
$analyse=$_POST['analyse'];
$result=$_POST['result'];
$mark=$_POST['mark'];
$pro=$_COOKIE['pro'];
$grade=$_COOKIE['grade'];
// echo $rname;
$assignmentid=$_POST['assignmentid'];
$sql="select * from assignment where assignmentid='$assignmentid' and pro='$pro' and grade='$grade' and cname='$cname' and rname='$rname'";
$result_sql=mysql_query($sql)or die(mysql_error());
$rs=mysql_fetch_array($result_sql);
$aim=$rs[5];
$content=$rs[4];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTDHTML 4.01//EN"

"http://www.w3.org/TR/html4/strict.dtd">
<html>
<meta http-equiv="content-Type" content="text/html; charset=utf-8">
<head>

<!-- Le styles -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    
    
     <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->


<title>查询</title>


<script type="text/javascript">
		function YanZheng() {
			  var step = document.getElementById("step").value;
			  var analyse = document.getElementById("analyse").value;
			  var result = document.getElementById("result").value;
			
            if (step =="")
			 {
           	 alert("请输入实验步骤");
				form1.step.focus();
              return false;
                
            }
            if (analyse =="")
			 {
         	 alert("请输入分析讨论");
				form1.analyse.focus();
            return false;
              
          }
            if (result =="")
			 {
         	 alert("请输入实验结果");
				form1.result.focus();
            return false;
              
          }
            return true;
        }
		function Reset() {
			document.getElementById("step").value = "";
			document.getElementById("analyse").value = "";
			document.getElementById("result").value = "";
		 }   
   </script>
</head>
<body>


<form action="daochu.php" method="post" class="form-horizontal" >
	
		
		
				
						<h2>提交作业</h2>
			<div>	
				
				<div class="control-group">
    <label class="control-label" for="cname">课程名称</label>
    <div class="controls">
      <input type="text" id="cname" value=<?php echo $cname;?> disabled>
    </div>
  </div>
				
				
              		<div class="control-group">
    <label class="control-label" for="tname">任课老师</label>
    <div class="controls">
      <input type="text" id="tname" value=<?php echo $tname;?> disabled>
    </div>
  </div>
  
  
  		
              		<div class="control-group">
    <label class="control-label" for="grade">年级</label>
    <div class="controls">
      <input type="text" id="grade" value=<?php echo $_COOKIE['grade'];?> disabled>
    </div>
  </div>
				 
					
				
				       		<div class="control-group">
    <label class="control-label" for="pro">专业</label>
    <div class="controls">
      <input type="text" id="pro" value=<?php echo $_COOKIE['pro'];?> disabled>
    </div>
  </div>
			
                  
				  

				   
				        		<div class="control-group">
    <label class="control-label" for="rname">实验名称</label>
    <div class="controls">
      <input type="text" id="rname" value=<?php echo $rname;?> disabled>
    </div>
  </div>
			
</div>			<!-- input元素 -->	    
		  
           <div>
                
				        		<div class="control-group">
    <label class="control-label" for="aim">实验目的</label>
    <div class="controls">
      <textarea  id="aim"  disabled><?php echo $aim;?></textarea>
    </div>
  </div>
			

			        		<div class="control-group">
    <label class="control-label" for="content">实验内容</label>
    <div class="controls">
      <textarea  id="content" disabled ><?php echo $content;?></textarea>
    </div>
  </div>
				
				        		<div class="control-group">
    <label class="control-label" for="step">实验步骤</label>
    <div class="controls">
      <textarea  id="step"  disabled><?php echo $step;?></textarea>
    </div>
  </div>
			
				
					        		<div class="control-group">
    <label class="control-label" for="result">实验结果</label>
    <div class="controls">
      <textarea  id="result" disabled><?php echo $result;?></textarea>
    </div>
  </div>
				
					
				
				        		<div class="control-group">
    <label class="control-label" for="analyse">分析讨论</label>
    <div class="controls">
      <textarea  id="analyse" disabled><?php echo $analyse;?></textarea>
    </div>
  </div>
			
			
				        		<div class="control-group">
    <label class="control-label" for="mark">评语</label>
    <div class="controls">
      <textarea  id="mark"  disabled><?php echo $mark;?></textarea>
    </div>
  </div>
			
				
				
			</div>
                <button type="submit" class="btn">导出</button>
			
	
		
		<input type="hidden" value=<?php echo $tname;?> name="tname"
							id="tname"> 
							<input type="hidden" value=<?php echo $rname;?>
							name="rname" id="rname"> 
							<input type="hidden"
							value=<?php echo $cname;?> name="cname" id="cname">
							<input
							type="hidden" value=<?php echo $aim;?>
							name="aim" id="aim"> 
							<input
							type="hidden" value=<?php echo $content;?>
							name="content" id="content">
							<input
							type="hidden" value=<?php echo $step;?>
							name="step" id="step">
							<input
							type="hidden" value=<?php echo $analyse;?>
							name="analyse" id="analyse">
							<input
							type="hidden" value=<?php echo $result;?>
							name="result" id="result">
							<input
							type="hidden" value=<?php echo $mark;?>
							name="mark" id="mark">
						
		</form>
		
	
	
</body>
</html>