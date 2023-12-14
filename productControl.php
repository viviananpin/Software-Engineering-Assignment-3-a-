<?php
require('productModel.php');

$act=$_REQUEST['act'];
switch ($act) {
    
case "listJob":
  $jobs=getJobList();
  echo json_encode($jobs);
  return;  
  
  
case "listPurchaseJob":
  $jobs=getPurchaseList();
  echo json_encode($jobs);
  return;  
  
  
case "listOrderJob":
  $jobs=getOrderList();
  echo json_encode($jobs);
  return;    
  
  
case "addJob":
	
	$jsonStr = $_POST['dat'];
	$job = json_decode($jsonStr);
	//should verify first
	addJob($job->id,$job->jobName,$job->jobUrgent,$job->jobContent,$job->jobDescription);
	return;

case "addCart":
	
	$jsonStr = $_POST['dat'];
	$job = json_decode($jsonStr);
	//should verify first
	addCart($job->id,$job->jobContent,$job->purchaseAmount);
	return;


case "delJob":
	$id=(int)$_REQUEST['id']; //$_GET, $_REQUEST
	//verify
	delJob($id);
	return;

case "delCart":
	$id=(int)$_REQUEST['id']; //$_GET, $_REQUEST
	//verify
	delCart($id);
	return;
    
case "createOrder":
    $cartItems = $_POST['cartItems']; // 從 POST 請求中取得購物車的商品清單
    $myID=(int)$_REQUEST['myID'];
    createOrder($cartItems,$myID);
    return;




default:
  
}

?>