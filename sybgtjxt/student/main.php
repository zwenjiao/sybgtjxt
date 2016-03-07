<?php
	$uid=$_COOKIE['UserId'];
	$pwd=$_COOKIE['Pwd'];
	
	if($uid==""||$pwd==""){
	echo"<script type='text/javascript'>";
	echo"alert('COOKIE已经过期!'); window.location.href='../index.html';</script>";
	}
	?>
<?php
	include('../conn/conn.php');
	mysql_query("set names utf8" );
	$uid=$_COOKIE['UserId'];
	//echo $uid;
	$pwd=$_COOKIE['Pwd'];
	
	
	
	$sql="select * from user where uid='$uid' and pwd='$pwd'"; 
	$result=mysql_query($sql)or die(mysql_error());
	if($rs=mysql_fetch_array($result)){
	$role=$rs[1];
	
	
	$sql1="select * from teacher  where tid='$uid'  "; 
	$sql2="select * from  student where  sid='$uid' "; 
	$sql3="select * from admin where aid='$uid'"; 
	$result1=mysql_query($sql1);
	if($rs1=mysql_num_rows($result1)){
		if($rs1=mysql_fetch_array($result1)){
	
		$name=$rs1[1];
	
	}
	
	}
	$result2=mysql_query($sql2);
	if($rs2=mysql_num_rows($result2)){
		if($rs2=mysql_fetch_array($result2)){
	
		$name=$rs2[1];
	
	}
	
	}
	$result3=mysql_query($sql3);
	if($rs3=mysql_num_rows($result3)){
		if($rs3=mysql_fetch_array($result3)){
			$name=$rs3[1];
	
	}
	}
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTDHTML 4.01//EN"

"http://www.w3.org/TR/html4/strict.dtd">
<html >
  <head>
   <meta http-equiv="content-Type" content="text/html; charset=utf-8" >
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
   
    <style type="text/css">
      body {
        padding-top: 41px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 100px 0;
      }
	  
	
      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
	  #iframe{
		  width:1000px;
		  height:500px;
		  border:0;
		  margin:0;
		  padding:0;
	 
		  }
		  #footer{
		  	text-align: center;
		  }
    </style>
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->




　



  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
         
          <div class="nav-collapse collapse">
        <p class="navbar-text pull-left">欢迎你 <?php echo $name;?>
         你的身份是:<?php echo $role;?></p>
        <ul class="nav" style=" padding-left:1020px;">
              <li class="active" ><a href="../index.html">退出系统</a></li>
        </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid" >
      <div class="row-fluid" >
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">作业管理</li>
              <li class="active"  id="index">
            <a href="zuoyeguanli/zysj.php" target="main">作业上交</a>  </li>
			
              <li ><a href="zuoyeguanli/zycx.php" target="main">作业查询</a></li>
              
              
             
             <li class="nav-header">个人信息管理</li>
              <li><a href="../gerenxinxiguanli/mima.html" target="main">修改密码</a></li> 
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9" >
        
         <!--在此界面显示跳转的链接，如何用jquery实现，网上看了代码，还是没能成功，求大家指点-->
          <iframe src="zuoyeguanli/zysj.php" id="iframe" name="main"></iframe>
        </div>      
</div>
</div>

      <hr>

    <div id="footer">
      <div class="container">
        <p class="muted credit"> &copy;南京信息工程大学 </p>
      </div>
    </div>
    



  </body>
</html>
