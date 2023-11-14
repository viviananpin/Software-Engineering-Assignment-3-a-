<?php
require('dbconfig.php');

function getJobList() {
	global $db;
	$sql = "select * from product_list;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function addJob($jobName,$jobUrgent,$jobContent,$jobDescription) {
	global $db;

	$sql = "insert into product_list (jobName, jobUrgent, jobContent , jobDescription) values (?,?, ?, ?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "ssss", $jobName, $jobUrgent,$jobContent, $jobDescription); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

function updateJob($id, $jobName,$jobUrgent,$jobContent,$jobDescription) {
	echo $id, $jobName,$jobUrgent,$jobContent,$jobDescription;
	return;
}

function delJob($id) {
	global $db;

	$sql = "delete from product_list where id=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $id); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}
?>