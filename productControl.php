<?php
require('productModel.php');

$act=$_REQUEST['act'];
switch ($act) {
    
case "listJob":
  $myID=(int)$_REQUEST['myID'];
  $jobs=getJobList($myID);
  echo json_encode($jobs);
  return;  
  
case "c_listJob":
  $jobs=c_getJobList();
  echo json_encode($jobs);
  return;  
  
case "o_listJob":
  $myID=(int)$_REQUEST['myID'];
  $jobs=o_getJobList($myID);
  echo json_encode($jobs);
  return;  

case "listSentJob":
  $myID=(int)$_REQUEST['myID'];
  $jobs=getSentList($myID);
  echo json_encode($jobs);
  return;
  
  
case "listArrivedJob":
  $myID=(int)$_REQUEST['myID'];
  $jobs=getArrivedList($myID);
  echo json_encode($jobs);
  return;

  
case "listPurchaseJob":
  $myID=(int)$_REQUEST['myID'];
  $jobs=getPurchaseList($myID);
  echo json_encode($jobs);
  return;  
  
case "listDeliverList":
  $jobs=listDeliverList();
  echo json_encode($jobs);
  return;   
  
  
case "listOrderJob":
  $jobs=getOrderList();
  echo json_encode($jobs);
  return;    
  
  
case "addJob":
	$sellerID=(int)$_REQUEST['sellerID'];
	$jsonStr = $_POST['dat'];
	$job = json_decode($jsonStr);
	//should verify first
	addJob($job->id,$job->jobName,$job->jobUrgent,$job->jobContent,$job->jobDescription,$sellerID);
	return;

case "addCart":
	$jsonStr = $_POST['dat'];
	$job = json_decode($jsonStr);
	//should verify first
	addCart($job->id,$job->jobContent,$job->purchaseAmount);
	return;

case "feedback_save":
	$orderID=(int)$_REQUEST['orderID']; //$_GET, $_REQUEST
    $feedback=(int)$_REQUEST['feedback']; //$_GET, $_REQUEST
	//verify
	feedback_save($orderID,$feedback);
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

case "delDeliver":
	$orderID=(int)$_REQUEST['orderID']; //$_GET, $_REQUEST
	//verify
	delDeliver($orderID);
	return;
    
case "delOrder":
	$orderID=(int)$_REQUEST['orderID']; //$_GET, $_REQUEST
	//verify
	delOrder($orderID);
	return;
    
    
case "createOrder":
    $orderData = $_POST['cartItems']; // 從 POST 請求中取得購物車的商品清單
    $myID=(int)$_REQUEST['myID'];
    $cartItems = json_decode($orderData);
    createOrder($cartItems -> id, $cartItems -> jobName, $cartItems -> jobUrgent, $cartItems -> purchaseAmount, $cartItems -> jobDescription,$cartItems -> sellerID, $myID, $cartItems ->jobContent);
    return;
    
    
case "buy":
    $myID=(int)$_REQUEST['myID'];
    buy($myID);
    return;




default:
  
}

?>
?>