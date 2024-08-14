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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE std_it12 SET code_std=%s, name_std=%s, dep_std=%s, tel_std=%s WHERE id=%s",
                       GetSQLValueString($_POST['code_std'], "text"),
                       GetSQLValueString($_POST['name_std'], "text"),
                       GetSQLValueString($_POST['dep_std'], "text"),
                       GetSQLValueString($_POST['tel_std'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_mysqli, $mysqli);
  $Result1 = mysql_query($updateSQL, $mysqli) or die(mysql_error());

  $updateGoTo = "admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_peak22 = "-1";
if (isset($_GET['id'])) {
  $colname_peak22 = $_GET['id'];
}
mysql_select_db($database_mysqli, $mysqli);
$query_peak22 = sprintf("SELECT * FROM std_it12 WHERE id = %s", GetSQLValueString($colname_peak22, "int"));
$peak22 = mysql_query($query_peak22, $mysqli) or die(mysql_error());
$row_peak22 = mysql_fetch_assoc($peak22);
$totalRows_peak22 = mysql_num_rows($peak22);
?>

<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Code_std:</td>
      <td><input type="text" name="code_std" value="<?php echo htmlentities($row_peak22['code_std'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Name_std:</td>
      <td><input type="text" name="name_std" value="<?php echo htmlentities($row_peak22['name_std'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dep_std:</td>
      <td><input type="text" name="dep_std" value="<?php echo htmlentities($row_peak22['dep_std'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tel_std:</td>
      <td><input type="text" name="tel_std" value="<?php echo htmlentities($row_peak22['tel_std'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_peak22['id']; ?>" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
mysql_free_result($peak22);
?>
