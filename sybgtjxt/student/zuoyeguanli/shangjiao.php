<?php
include '../../conn/conn.php';

mysql_query("set names utf8");
$tname=$_POST['tname'];
$rname=$_POST['rname'];
$cname=$_POST['cname'];
$pro=$_COOKIE['pro'];
$grade=$_COOKIE['grade'];
// echo $rname;
$assignmentid=$_POST['assignmentid'];
$sql="select * from assignment where assignmentid='$assignmentid' and pro='$pro' and grade='$grade' and cname='$cname' and rname='$rname'";
$result=mysql_query($sql)or die(mysql_error());
$rs=mysql_fetch_array($result);
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
    
<title>上交</title>

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



	<form name="form1" action="mtmn.php" method="post"
		onsubmit="return YanZheng();"  class="form-horizontal" >
		
		
				
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
      <textarea  id="aim" disabled><?php echo $rs[5];?></textarea>
    </div>
  </div>	
  
  <div class="control-group">
    <label class="control-label" for="content">实验内容</label>
    <div class="controls">
      <textarea  id="content"  disabled><?php echo $rs[4];?></textarea>
    </div>
  </div>
				<div class="control-group">
    <label class="control-label" for="step">实验步骤</label>
    <div class="controls">
      <textarea  id="step" name="step"></textarea>
    </div>
  </div>
				
				
				<div class="control-group">
    <label class="control-label" for="result">实验结果</label>
    <div class="controls">
      <textarea  id="result" name="result" ></textarea>
    </div>
  </div>
				<div class="control-group">
    <label class="control-label" for="analyse">分析讨论</label>
    <div class="controls">
      <textarea  id="analyse" name="analyse"></textarea>
    </div>
  </div>
  
  </div>
				
		 <div class="form-actions">
 <button class="btn btn-large btn-primary" type="submit">Submit</button>
 
 
 <button class="btn btn-large btn-primary" type="submit" onClick="Reset();" >Reset</button>
 
  </div>	
		
		<input type="hidden" name="rname"  value=<?php echo $rname;?>>
		<input type="hidden" name="cname"  value=<?php echo $cname;?>>
		<input type="hidden" name="assignmentid"  value=<?php echo $assignmentid;?>>
		
	</form>
	
</body>
</html>