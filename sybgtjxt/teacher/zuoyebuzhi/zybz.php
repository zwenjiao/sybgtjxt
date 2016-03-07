<?php
include '../../conn/conn.php';

mysql_query("set names utf8");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTDHTML 4.01//EN"

"http://www.w3.org/TR/html4/strict.dtd">


<html>


<head>

<meta http-equiv="content-Type" content="text/html; charset=utf-8">
<title>布置作业</title>

<!-- Le styles -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    
    
     <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->





<script type="text/javascript">
function YanZheng() {
	        //�γ�����
            var cname = document.getElementById("cname").value;
			//רҵ
            var pro = document.getElementById("pro").value;
			//�꼶
            var grade = document.getElementById("grade").value;
			
			
			//ʵ������
			var rname = document.getElementById("rname").value;
			//ʵ��Ŀ��
			var aim = document.getElementById("aim").value;
			//ʵ������
			var content = document.getElementById("content").value;
			
            if(cname=="")
			 {
               window.alert("请输入课程名称!");
                return false;
            }
			if(pro==0)
			 {
               window.alert("请选择专业!");
                return false;
            }
			if(grade==0)
			 {
               window.alert("请选择年级!");
                return false;
            }
			
			if(rname=="")
			 {
               window.alert("请输入实验名称!!");
                return false;
            }
			if(aim=="")
			 {
               window.alert("请输入实验目的!");
                return false;
            }
			if(content=="")
			 {
               window.alert("请输入实验内容!");
                return false;
            }
           return true;
        }
function Reset() {
	        //�γ�����
            document.getElementById("cname").value = "";
		
			//רҵ
            document.getElementById("pro").value = 0;
			//�꼶
            document.getElementById("grade").value = 0;
			//ʵ��Ŀ��
			document.getElementById("aim").value = "";
			//ʵ������
			document.getElementById("content").value = "";
			//��ֹʱ��
			document.getElementById("cutdate").value = "";
			
}
       
  
function YYYYMMDDstart()
          {
               MonHead = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

             //�ȸ�������������
              var y   = new Date().getFullYear();
              for (var i = (y-30); i < (y+30); i++) //�Խ���Ϊ׼��ǰ30�꣬��30��
                  document.form1.YYYY.options.add(new Option(" "+ i, i));

              //���·ݵ�������
             for (var i = 1; i < 13; i++){
		if(i>=1&&i<10)
                 document.form1.MM.options.add(new Option(" " +"0"+i, i));
else{
  document.form1.MM.options.add(new Option(" "+i, i));
}
	}
              document.form1.YYYY.value = y;
               document.form1.MM.value = new Date().getMonth() + 1;
             var n = MonHead[new Date().getMonth()];
              if (new Date().getMonth() ==1 && IsPinYear(YYYYvalue)) n++;
                  writeDay(n); //������������
               document.form1.DD.value = new Date().getDate();
           }
            if(document.attachEvent)
               window.attachEvent("onload", YYYYMMDDstart);
            else
               window.addEventListener('load', YYYYMMDDstart, false);
           function YYYYDD(str) //�귢���仯ʱ���ڷ����仯(��Ҫ���ж���ƽ��)
            {
                var MMvalue = document.form1.MM.options[document.form1.MM.selectedIndex].value;
                if (MMvalue == ""){ var e = document.form1.DD; optionsClear(e); return;}
                var n = MonHead[MMvalue - 1];
                if (MMvalue ==2 && IsPinYear(str)) n++;
                  writeDay(n)
            }
            function MMDD(str)  //�·����仯ʱ��������
           {
                var YYYYvalue = document.form1.YYYY.options[document.form1.YYYY.selectedIndex].value;
                if (YYYYvalue == ""){ var e = document.form1.DD; optionsClear(e); return;}
               var n = MonHead[str - 1];
                if (str ==2 && IsPinYear(YYYYvalue)) n++;
                  writeDay(n)
            }
            function writeDay(n)  //������д���ڵ�������
           {
               var e = document.form1.DD; optionsClear(e);
               for (var i=1; i<(n+1); i++)
                   e.options.add(new Option(" "+ i, i));
          }
           function IsPinYear(year)//�ж��Ƿ���ƽ��
            {  
                return(0 == year%4 && (year%100 !=0 || year%400 == 0));
            }
            function optionsClear(e)
           {
             e.options.length = 1;
}
</script>
</head>

<body>
	<form name="form1" action="zybzpost.php" method="post"
		onsubmit="return YanZheng();" id="form1" class="form-horizontal">
		

			<h2>布置作业</h2>
			
		
			<div>
						
				<div class="control-group">
    <label class="control-label" for="cname">课程名称</label>
    <div class="controls">
      <input type="text" id="cname" name="cname" >
    </div>
  </div>

	
		
			
              		<div class="control-group">
    <label class="control-label" for="tname">任课老师</label>
    <div class="controls">
      <input type="text" id="tname" value=<?php echo $_COOKIE['tname'];?> disabled>
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
  <!-- 年月日 -->
			
              		<div class="control-group">
    <label class="control-label" for="cutdate">截止日期</label>
    <div class="controls" >
      <select name='YYYY' id='YYYY' onchange="YYYYMM(this.value)" class="span2">
						<option value="">年</option>
				</select> 
				<select name='MM' id='MM' onchange="MMDD(this.value)" class="span2">
						<option value="">月</option>
				</select> 
				<select name='DD' id='DD' class="span2">
						<option value="">日</option>
				</select> 
				
    </div>
  </div>
				
			

			
			
			<div class="control-group">
    <label class="control-label" for="rname">实验名称</label>
    <div class="controls">
      <input type="text" id="rname" name="rname">
    </div>
  </div>
		
		</div>	
			<div>
			<div class="control-group">
    <label class="control-label" for="aim">实验目的</label>
    <div class="controls">
      <textarea  id="aim"  name="aim"></textarea>
    </div>
  </div>	
			
			
			
			
			
			
			<div class="control-group">
    <label class="control-label" for="content">实验内容</label>
    <div class="controls">
      <textarea  id="content" name="content"></textarea>
    </div>
  </div>	
</div>
			
  
  <div class="form-actions">
 <button class="btn btn-large btn-primary" type="submit">Submit</button>
 
 
 <button class="btn btn-large btn-primary" type="submit" onClick="Reset();" >Reset</button>
 
  </div>	
  
  
  
	</form>
</body>
</html>