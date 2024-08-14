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

mysql_select_db($database_mysqli, $mysqli);
$query_Recordset1 = "SELECT * FROM std_it12";
$Recordset1 = mysql_query($query_Recordset1, $mysqli) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<p align="center">ข้อมูลนักศึกษาห้อง สทศ 12</p>
<p align="center">ข้อมูล</p>
<form name="form1" method="post" action="">
  <div align="center">
    <table border="1">
      <tr>
        <td>id</td>
        <td>code_std</td>
        <td>name_std</td>
        <td>dep_std</td>
        <td>tel_std</td>
      </tr>
      <?php do { ?>
        <tr>
          <td><?php echo $row_Recordset1['id']; ?></td>
          <td><?php echo $row_Recordset1['code_std']; ?></td>
          <td><?php echo $row_Recordset1['name_std']; ?></td>
          <td><?php echo $row_Recordset1['dep_std']; ?></td>
          <td><?php echo $row_Recordset1['tel_std']; ?></td>
        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </table>
  </div>
</form>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<?php
mysql_free_result($Recordset1);
?>
