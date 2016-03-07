<?php
header("Content-Type:   application/msword");
header("Content-Disposition:   attachment;   filename=实验报告.doc");
header("Pragma:   no-cache");
header("Expires:   0");

$cname = $_POST['cname'];
$tname = $_POST['tname'];
$grade = $_COOKIE['grade'];
$rname = $_POST['rname'];
$aim = $_POST['aim'];
$content = $_POST['content'];
$step = $_POST['step'];
$result = $_POST['result'];
$analyse = $_POST['analyse'];
$mark = $_POST['mark'];
$pro = $_COOKIE['pro'];
echo "实验报告
    ";
  
 echo "课程名称:$cname
	";

echo "任课老师:$tname
	";

echo "年级:$grade
	";

echo "专业:$pro
	";

echo "实验名称:$rname
	";

echo "实验目的:$aim
	";

echo "实验内容:$content
	";

echo "实验步骤:$step
	";

echo "实验结果:$result
	";

echo "分析讨论:$analyse
	";

echo "评语:$mark
	";

?>