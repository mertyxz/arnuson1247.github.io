<?php require_once('Connections/mysqli.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_peak_rec_admin = 6;
$pageNum_peak_rec_admin = 0;
if (isset($_GET['pageNum_peak_rec_admin'])) {
  $pageNum_peak_rec_admin = $_GET['pageNum_peak_rec_admin'];
}
$startRow_peak_rec_admin = $pageNum_peak_rec_admin * $maxRows_peak_rec_admin;

mysql_select_db($database_mysqli, $mysqli);
$query_peak_rec_admin = "SELECT * FROM peak_system";
$query_limit_peak_rec_admin = sprintf("%s LIMIT %d, %d", $query_peak_rec_admin, $startRow_peak_rec_admin, $maxRows_peak_rec_admin);
$peak_rec_admin = mysql_query($query_limit_peak_rec_admin, $mysqli) or die(mysql_error());
$row_peak_rec_admin = mysql_fetch_assoc($peak_rec_admin);

if (isset($_GET['totalRows_peak_rec_admin'])) {
  $totalRows_peak_rec_admin = $_GET['totalRows_peak_rec_admin'];
} else {
  $all_peak_rec_admin = mysql_query($query_peak_rec_admin);
  $totalRows_peak_rec_admin = mysql_num_rows($all_peak_rec_admin);
}
$totalPages_peak_rec_admin = ceil($totalRows_peak_rec_admin/$maxRows_peak_rec_admin)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>ข้อมูลสมาชิก สทส.12	</p>
<p><a href="insert.php">insert data</a></p>
<form id="form1" name="form1" method="post" action="search.php">
  ค้นหา:
  <label for="search"></label>
  <input type="text" name="search" id="search" />
  <a href="search.php">
  <input name="w" type="submit" id="w" value="search" />
  </a>
</form>
<p>&nbsp;</p>
<p><a href="logout.php">logout</a></p>
<p>&nbsp;</p>
<table border="1">
  <tr>
    <td>id</td>
    <td>uname</td>
    <td>upass</td>
    <td>myname</td>
    <td>email</td>
    <td>tell</td>
    <td>option</td>
    <td>option</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_peak_rec_admin['id']; ?></td>
      <td><?php echo $row_peak_rec_admin['uname']; ?></td>
      <td><?php echo $row_peak_rec_admin['upass']; ?></td>
      <td><?php echo $row_peak_rec_admin['myname']; ?></td>
      <td><?php echo $row_peak_rec_admin['email']; ?></td>
      <td><?php echo $row_peak_rec_admin['tell']; ?></td>
      <td><a href="delete.php?id=<?php echo $row_peak_rec_admin['id']; ?>">delete</a></td>
      <td><a href="update.php?id=<?php echo $row_peak_rec_admin['id']; ?>">update</a></td>
    </tr>
    <?php } while ($row_peak_rec_admin = mysql_fetch_assoc($peak_rec_admin)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($peak_rec_admin);
?>
