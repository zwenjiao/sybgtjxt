<?php 
header("Content-Type:text/html;charset=UTF-8"); 
require_once 'reader.php'; 
set_time_limit(20000); 
ini_set("memory_limit","2000M"); 

$dsn = "mysql:host=localhost;dbname=sybg;"; 
$user = "root"; 
$password = "admin"; 
try{ 
$dbh = new PDO($dsn,$user,$password); 
$dbh->query('set names utf8;'); 
}catch(PDOException $e){ 
echo "连接失败".$e->getMessage(); 
} 
//pdo�󶨲������� 
$stmt = $dbh->prepare("insert into student(sid,sname,class,grade,pro) values (:sid,:sname,:class,:grade,:pro) "); 
$stmt->bindParam(":sid", $sid,PDO::PARAM_STR); 
$stmt->bindParam(":sname", $sname,PDO::PARAM_STR); 
$stmt->bindParam(":class", $class,PDO::PARAM_STR); 
$stmt->bindParam(":grade", $grade,PDO::PARAM_STR); 
$stmt->bindParam(":pro", $pro,PDO::PARAM_STR); 
//ʹ��php-excel-reader��ȡexcel���� 
$data = new Spreadsheet_Excel_Reader(); 
$data->setOutputEncoding('UTF-8'); 
$data->read("data.xls"); 
for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) { 
for ($j = 1; $j <= 3; $j++) { 
$sid = $data->sheets[0]['cells'][$i][1]; 
$sname = $data->sheets[0]['cells'][$i][2]; 
$class = $data->sheets[0]['cells'][$i][3]; 
$grade = $data->sheets[0]['cells'][$i][4]; 
$pro = $data->sheets[0]['cells'][$i][5];
if($sid=="")
{
	echo "<script> alert('读取excel过程中,存在空值,请检查!');history.go(-1);</script>";
}
else if($sname=="")
{
	echo "<script> alert('读取excel过程中,存在空值,请检查!');history.go(-1);</script>";
}
else if($class=="")
{
	echo "<script> alert('读取excel过程中,存在空值,请检查!');history.go(-1);</script>";
}
else if($grade=="")
{
	echo "<script> alert('读取excel过程中,存在空值,请检查!');history.go(-1);</script>";
}
else if($pro=="")
{
	echo "<script> alert('读取excel过程中,存在空值,请检查!');history.go(-1);</script>";
}

} 
//����ȡ��excel���ݲ��뵽���ݿ� 
$stmt->execute(); 
} 
//���������Ϊ����;
echo "执行成功"; 
echo "<script> alert('上传数据成功!');history.back();</script>";
?> 