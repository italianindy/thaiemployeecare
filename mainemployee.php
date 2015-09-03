<?
session_start();
if($_SESSION["strUserID"] == "")
{
header("location:http://112.121.150.67/thaiemployeecare/mainmenu.php");
exit();
}
?>
<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>jQuery Mobile Web App</title>
<link href="jquery-mobile/jquery.mobile.theme-1.0.min.css" rel="stylesheet" type="text/css"/>
<link href="jquery-mobile/jquery.mobile.structure-1.0.min.css" rel="stylesheet" type="text/css"/>
<script src="jquery-mobile/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="jquery-mobile/jquery.mobile-1.0.min.js" type="text/javascript"></script>
</head> 
<body>
 
<?
$objConnect = mysql_connect("112.121.150.67","hdc","hdc") or die(mysql_error());

$objDB = mysql_select_db("db_employee");
mysql_query("SET NAMES utf8", $objConnect);

$strSQL = " SELECT * FROM employee  WHERE emp_id = '".$_SESSION["strUserID"]."'";
$objQuery = mysql_query($strSQL) or die (mysql_error());

$objResult = mysql_fetch_array($objQuery);
?>

<div data-role="page" data-theme="e" id="pageMparent">
	<div data-role="header" data-theme="a">
    <a href="http://112.121.150.67/thaiemployeecare/logout.php" data-icon="home" data-iconpos="notext" data-direction="reverse" >Back</a>
		<h1><font size="2" >ชื่อผู้ใช้ : คุณ<? echo $objResult["emp_fname"];?> <? echo $objResult["emp_lname"];?></font></h1>
	</div>
<?
$strSQL2 = "SELECT * 
FROM branch ";
$objQuery2 = mysql_query($strSQL2) or die (mysql_error());
?>   

	<div data-role="content">	
    <div align="center">
      <img src="pic/choosebrancht.png" width="250" height="80"> 			</div>
		<ul data-inset="true" data-role="listview" data-theme="a">
<?
while($objResult2 = mysql_fetch_array($objQuery2)) {
?>
  <li><a href="#">
    <h3><font size="4" >สาขา<? echo $objResult2["branch_name"]?></font></h3>
    <p><font size="3" >เลขที่สาขา </font><font size="2" ><? echo $objResult2["branch_id"]?></font></p>
  </a><a href="http://112.121.150.67/thaiemployeecare/detailemployee.php?bid=<?=$objResult2["branch_id"];?>">รายละเอียด</a></li>
<?
}
?> 
</ul>
	</div>
    <div data-role="footer" data-theme="a" data-position="fixed">
		<div data-role="navbar">
          <ul>
            <li><a href="http://112.121.150.67/thaiemployeecare/logout.php"><font size="4">ออกจากระบบ</font></a></li>
           
          </ul>
        </div>
  </div>
</div>

</body>
</html>