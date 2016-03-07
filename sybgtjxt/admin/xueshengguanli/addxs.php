<?php
	
	include '../../conn/conn.php';
	
	 mysql_query("set names utf8" );

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTDHTML 4.01//EN"

"http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
  <meta http-equiv="content-Type" content="text/html; charset=utf-8" >
    <title>addxs.php</title>
	
   
    
 <!-- Le styles -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    
    
     <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
    
<script type="text/javascript">
function YanZheng() {
            var sname = document.getElementById("sname").value;
            var sid = document.getElementById("sid").value;
            var _class = document.getElementById("class").value;
            var grade = document.getElementById("grade").value;
             var pro = document.getElementById("pro").value;

             if (sid == "") {
                 alert("请输入学生学号!");
                 form1.sid.focus();
                 return false;
             }

             
            if (sname == "") {
                alert("请输入学生名字!");
                form1.sname.focus();
                return false;
            }
           
            if (_class == "") {
                alert("请输入班级!");
            
                return false;
            }
            if (pro == 0) {
                alert("请选择专业!");
                return false;
            }
            if (grade == 0) {
                alert("请选择年级!");
                return false;
            }
            return true;
        }
      
        </script>
</head>
 <body>
 <form name="form1" id="form1" method="post" action="addxspost.php" onsubmit="return YanZheng();" class="form-horizontal"> 
 
   <div class="control-group">
  <label class="control-label" for="sid">学生学号</label>
  <div class="controls">
  <input type="text" name="sid" id="sid"  >
  </div>
  
  </div>
 
 
  <div class="control-group">
  <label class="control-label" for="sname">学生姓名</label>
  <div class="controls">
  <input type="text" name="sname" id="sname"  >
  </div>
  
  </div>
 
 
 
  <div class="control-group">
  <label class="control-label" for="class">班级</label>
  <div class="controls">
  <input type="text" name="class" id="class"  >
  </div>
  
  </div>
 
 
 
  <div class="control-group">
  <label class="control-label" for="pro">专业</label>
  <div class="controls">
     <select name="pro" id="pro">
     <option value='0' selected>请选择</option>
<?php

$sql="select pro from college";
$result=mysql_query($sql)or die(mysql_error());
while($row=mysql_fetch_assoc($result)){
?>

<option value="<?php echo $row['pro'] ?>"><?php echo $row['pro'] ?></option> 
<?php
}

?>
   
   </select>
  </div>
  
  </div>
 
 
 
   <div class="control-group">
  <label class="control-label" for="grade">年级</label>
  <div class="controls">
   <select name="grade" id="grade">
     <option value='0' selected>请选择</option>
<?php
$sql="select distinct grade from student";
$result=mysql_query($sql)or die(mysql_error());
while($row=mysql_fetch_assoc($result)){
?>

<option value="<?php echo $row['grade'] ?>"><?php echo $row['grade'] ?></option> 
<?php
}

?>
   
   </select>
  </div>
  
  </div>
 
 
 
 
 
  <div class="control-group">
    <div class="controls">
 <button class="btn btn-large btn-primary" type="submit">Submit</button>
 
 
 
 </div>
  </div>
    
  

   
 
   
  
    
 
 </form>
 </body>

</html>

