<!DOCTYPE html PUBLIC "-//W3C//DTDHTML 4.01//EN"

"http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
  <meta http-equiv="content-Type" content="text/html; charset=utf-8" >
    <title>addjs.php</title>
	
  
  <!-- Le styles -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    
    
     <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
<script type="text/javascript">
function YanZheng() {
           
            var tname = document.getElementById("tname").value;
            var tid = document.getElementById("tid").value;
            if (tid == "") {
                alert("请输入老师学号!");
                form1.tid.focus();
                return false;
            }
            if (tname=="") {
                alert("请输入老师名字!");
                form1.tname.focus();
                return false;
            }
            return true;
        }
      
        </script>
  </head>
  
  <body>
    <form  name="form1"id="form1" action="addjspost.php"method="post" onsubmit="return YanZheng();"  class="form-horizontal">
    
    <div class="control-group">
  <label class="control-label" for="tid">老师学号</label>
  <div class="controls">
  <input type="text" name="tid" id="tid"  >
  </div>
  
  </div>
    
    
    
     <div class="control-group">
  <label class="control-label" for="tname">老师名字</label>
  <div class="controls">
  <input type="text" name="tname" id="tname"   >
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
