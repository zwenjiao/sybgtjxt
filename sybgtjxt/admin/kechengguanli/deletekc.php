<?php
	include '../../conn/conn.php';
	
	
	 mysql_query("set names utf8" );

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTDHTML 4.01//EN"

"http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>deletekc.php</title>
	
   
   
    
  <!-- Le styles -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    
    
     <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
    

    
    
<script type="text/javascript">
function YanZheng() {
            var cname = document.getElementById("cname").value;
            
           var pro = document.getElementById("pro").value;
           var grade = document.getElementById("grade").value;
             
            if (cname == "") {
                alert("请输入课程名称!");
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
    <form action="deletekcpost.php" method="post" onsubmit="return YanZheng();" class="form-horizontal">
 <div class="control-group">
  <label class="control-label" for="cname">课程名称</label>
  <div class="controls">
  <input type="text" name="cname" id="cname"   >
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
$sql="select distinct grade from  student";
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
