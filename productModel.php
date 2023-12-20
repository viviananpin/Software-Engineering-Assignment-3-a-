<?php
require('dbconfig.php');

function getJobList($myID){
	global $db;
	$sql = "select * from product_list WHERE sellerID=?;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
    mysqli_stmt_bind_param($stmt, "i", $myID);
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function c_getJobList() {
	global $db;
	$sql = "select * from product_list WHERE `jobContent`>0;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)){
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}


function o_getJobList($myID) {
	global $db;
	$sql = "select * from `order` WHERE `orderStatus`='Checked out' and sellerID=?;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
    mysqli_stmt_bind_param($stmt, "i", $myID);
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}


function getSentList($myID) {
	global $db;
	$sql = "update `order` set `result` = `jobUrgent`*`jobContent`;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
    
    
	$sql = "select * from `order` WHERE ((`orderStatus`='Checked out')or(`orderStatus`='get the goods ready' )or(`orderStatus`='Arrived' )or(`orderStatus`='Shipped' ) )and `customID`=?;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
    mysqli_stmt_bind_param($stmt, "i", $myID);
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}


function getArrivedList($myID) {
	global $db;
	$sql = "select * from `order` WHERE ((`orderStatus`='Shipped')or(`orderStatus`='Arrived') )and `customID`=?;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
    mysqli_stmt_bind_param($stmt, "i", $myID);
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}



function getPurchaseList($myID) {
	global $db;
	$sql = "update `order` set `result` = `jobUrgent`*`jobContent`;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
    
    
	$sql = "select * from `order` WHERE `orderStatus`='In Cart' and `customID`=?;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
    mysqli_stmt_bind_param($stmt, "i", $myID);
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function getOrderList() {
	global $db;
	$sql = "select * from order;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}







function addJob($jobID,$jobName,$jobUrgent,$jobContent,$jobDescription,$sellerID) {
	global $db;
    if($jobID>0){
    $sql = "update product_list set jobName=?, jobUrgent=?, jobContent=? , jobDescription=? where id=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "ssssi", $jobName, $jobUrgent,$jobContent, $jobDescription, $jobID); //bind parameters with variables, with types "sss":string, string ,string
    }

    else{
	$sql = "insert into product_list (jobName, jobUrgent, jobContent , jobDescription, sellerID) values (?,?, ?, ?, ?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "ssssi", $jobName, $jobUrgent,$jobContent, $jobDescription,$sellerID); //bind parameters with variables, with types "sss":string, string ,string
    }
    mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

function addCart($jobID,$jobContent,$purchaseAmount) {
	global $db;
    $sql="SELECT `jobContent` FROM `product_list` WHERE id=?";
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_bind_param($stmt, "i", $jobID); //bind parameters with variables, with types "sss":string, string ,string
    mysqli_stmt_execute($stmt);  //執行SQL
    $result = mysqli_stmt_get_result($stmt); //取得查詢結果
      
    
    if($jobContent<=$result)
    {
    $sql = "update product_list set `jobContent`=jobContent-? where id=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
    
    mysqli_stmt_bind_param($stmt, "ii",$jobContent, $jobID); //bind parameters with variables, with types "sss":string, string ,string
    mysqli_stmt_execute($stmt);  //執行SQL
    return True;
        
    }
    else
    {
    $sql = "update product_list set `jobContent`=0 where id=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
    
    mysqli_stmt_bind_param($stmt, "ii", $jobID); //bind parameters with variables, with types "sss":string, string ,string
    mysqli_stmt_execute($stmt);  //執行SQL
    return True;
        
    }
    
	
}
function updateJob($id, $jobName,$jobUrgent,$jobContent,$jobDescription) {
	echo $id, $jobName,$jobUrgent,$jobContent,$jobDescription;
	return;
}

function feedback_save($id,$feedback) {
	global $db;

	$sql = "update `order` set `feedback`=? where `orderID`=?";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "ii",$feedback,$id); //bind parameters with variables, with types "sss":string, string ,string
    mysqli_stmt_execute($stmt);  //執行SQL
    
    $sql = "update `order` set `orderStatus`='Arrived' where `orderID`=?";
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i",$id); //bind parameters with variables, with types "sss":string, string ,string
    mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

function delCart($id) {
	global $db;

	$sql = "DELETE FROM `order` WHERE `orderID`=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $id); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}
function delJob($id) {
	global $db;

	$sql = "delete from product_list where `id`=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $id); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

function delDeliver($orderID) {
	global $db;
	$sql = "update `order`  set `orderStatus`='Shipped' where `orderID`=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $orderID); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

function delOrder($orderID) {
	global $db;
	$sql = "update `order`  set `orderStatus`='get the goods ready' where `orderID`=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $orderID); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}


// 在你的其他功能後面新增一個新的函式
function createOrder($id, $jobName, $jobUrgent, $jobContent, $jobDescription,$sellerID, $customID,$totalQuantity) {
    global $db;
    
    if($jobContent <= $totalQuantity)
    {
    $sql = "INSERT INTO `order` (`id`, jobName, jobUrgent, jobContent, jobDescription, sellerID, customID,orderStatus) VALUES (?, ?, ?, ?, ?,?,?,'In Cart')";
    $stmt = mysqli_prepare($db, $sql);

  
    mysqli_stmt_bind_param($stmt, "issssss", $id, $jobName, $jobUrgent, $jobContent, $jobDescription,$sellerID, $customID);
    mysqli_stmt_execute($stmt);

    $sql = "update `product_list`  set `jobContent`=`jobContent`-? where `id`=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "ii", $jobContent,$id); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL

    }
    
    else
    {
    $sql = "INSERT INTO `order` (`id`, jobName, jobUrgent, jobContent, jobDescription, sellerID, customID,orderStatus) VALUES (?, ?, ?, ?, ?,?,?,'In Cart')";
    $stmt = mysqli_prepare($db, $sql);

  
    mysqli_stmt_bind_param($stmt, "issssss", $id, $jobName, $jobUrgent, $totalQuantity, $jobDescription,$sellerID, $customID);
    mysqli_stmt_execute($stmt);

    $sql = "update `product_list`  set `jobContent`=0 where `id`=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $id); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
    }
      // 返回成功訊息或其他相關資訊
    echo "Order created successfully.";
    return;
        
    
    // 假設 order 資料表中有 id、jobName、jobUrgent、jobContent、jobDescription 等欄位
   
}

function listDeliverList() {
	global $db;
	$sql = "select * from `order` WHERE `orderStatus`='get the goods ready';";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果
	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function buy($customID) {
	global $db;
	$sql = "update `order`  set `orderStatus`='Checked out' where `customID`=? and `orderStatus`='In Cart';"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $customID); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
    return True;
}


?>