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


function getPurchaseList() {
	global $db;
	$sql = "update product_list set total_price = jobUrgent*purchaseAmount;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$sql = "select * from product_list WHERE purchaseAmount>0;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}




function addJob($jobID,$jobName,$jobUrgent,$jobContent,$jobDescription) {
	global $db;
    if($jobID>0){
    $sql = "update product_list set jobName=?, jobUrgent=?, jobContent=? , jobDescription=? where id=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "ssssi", $jobName, $jobUrgent,$jobContent, $jobDescription, $jobID); //bind parameters with variables, with types "sss":string, string ,string
    }

    else{
	$sql = "insert into product_list (jobName, jobUrgent, jobContent , jobDescription) values (?,?, ?, ?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "ssss", $jobName, $jobUrgent,$jobContent, $jobDescription); //bind parameters with variables, with types "sss":string, string ,string
    }
    mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

function addCart($jobID,$jobContent,$purchaseAmount) {
	global $db;
    $sql = "update product_list set purchaseAmount=? where id=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
    
    
    if($jobContent>=$purchaseAmount)
    {
    mysqli_stmt_bind_param($stmt, "ii",$purchaseAmount, $jobID); //bind parameters with variables, with types "sss":string, string ,string
    mysqli_stmt_execute($stmt);  //執行SQL
    return True;
        
    }
    else
    {
    mysqli_stmt_bind_param($stmt, "ii",$jobContent, $jobID); //bind parameters with variables, with types "sss":string, string ,string
    mysqli_stmt_execute($stmt);  //執行SQL
    return True;
        
    }
    
	
}
function updateJob($id, $jobName,$jobUrgent,$jobContent,$jobDescription) {
	echo $id, $jobName,$jobUrgent,$jobContent,$jobDescription;
	return;
}
function delCart($id) {
	global $db;

	$sql = "update product_list set purchaseAmount=0 where id=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $id); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}
function delJob($id) {
	global $db;

	$sql = "delete from product_list where id=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $id); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

// 在你的其他功能後面新增一個新的函式
function createOrder($orderData,$myID) {
    global $db;

    // 假設 order 資料表中有 id、jobName、jobUrgent、jobContent、jobDescription 等欄位
    $sql = "INSERT INTO `order` (id, jobName, jobUrgent, jobContent, jobDescription, sellerID, customID) VALUES (?, ?, ?, ?, ?,?,?)";

    // 解析字串為陣列
    $cartItems = json_decode($orderData, true);

    $stmt = mysqli_prepare($db, $sql);

    // 取得每個商品的資訊並插入資料表
    foreach ($cartItems as $item) {
        $id = $item['id'];
        $jobName = $item['jobName'];
        $jobUrgent = $item['jobUrgent'];
        $jobContent = $item['jobContent'];
        $jobDescription = $item['jobDescription'];
        $sellerID = $item['sellerID'];
        $customID = $myID;

        mysqli_stmt_bind_param($stmt, "issssss", $id, $jobName, $jobUrgent, $jobContent, $jobDescription,$sellerID, $customID);
        mysqli_stmt_execute($stmt);
    }

    // 返回成功訊息或其他相關資訊
    echo "Order created successfully.";
    return;
}



?>