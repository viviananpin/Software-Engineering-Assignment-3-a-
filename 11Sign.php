<?php
require('dbconfig.php');

$Account=$_POST['MemberName']; //$_GET, $_REQUEST
$Password=$_POST['MemberCode'];
$Identity=$_POST['Identity'];

	$sql = "insert into member (Account,Password,Identity) values (?, ?, ?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "sss", $Account, $Password,$Identity); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	echo "Sign Done.";
?>

<a href="00ShoppingWebsite.html">Main Page</a>