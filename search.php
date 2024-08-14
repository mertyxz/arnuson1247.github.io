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

$colname_p_s = "-1";
if (isset($_POST['search'])) {
  $colname_p_s = $_POST['search'];
}
mysql_select_db($database_mysqli, $mysqli);
$query_p_s = sprintf("SELECT * FROM std_it12 WHERE name_std LIKE %s", GetSQLValueString("%" . $colname_p_s . "%", "text"));
$p_s = mysql_query($query_p_s, $mysqli) or die(mysql_error());
$row_p_s = mysql_fetch_assoc($p_s);
$totalRows_p_s = mysql_num_rows($p_s);$colname_p_s = "-1";
if (isset($_POST['search'])) {
  $colname_p_s = $_POST['search'];
}
mysql_select_db($database_mysqli, $mysqli);
$query_p_s = sprintf("SELECT * FROM std_it12 WHERE name_std LIKE %s", GetSQLValueString("%" . $colname_p_s . "%", "text"));
$p_s = mysql_query($query_p_s, $mysqli) or die(mysql_error());
$row_p_s = mysql_fetch_assoc($p_s);
$totalRows_p_s = mysql_num_rows($p_s);
?>

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
      <td><?php echo $row_p_s['id']; ?></td>
      <td><?php echo $row_p_s['code_std']; ?></td>
      <td><?php echo $row_p_s['name_std']; ?></td>
      <td><?php echo $row_p_s['dep_std']; ?></td>
      <td><?php echo $row_p_s['tel_std']; ?></td>
    </tr>
    <?php } while ($row_p_s = mysql_fetch_assoc($p_s)); ?>
</table>
<?php
mysql_free_result($p_s);
?>
