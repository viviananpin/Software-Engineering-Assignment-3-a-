<?php
require("dbconfig.php");

function login($account, $pwd) {
	global $db;
	//verify with DB
	//dangerous way
	//$sql = "select role from user where id='$id' and pwd='$pwd';";
	//$stmt = mysqli_prepare($db, $sql );

	//safer way
	
	$sql = "select role from user where account=? and pwd=?;";
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_bind_param($stmt, "ss", $account, $pwd);
	

	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果
	if($r = mysqli_fetch_assoc($result)) {		
		return $r['role'];
	} else {
		return 0;
	}

}

function login2($account, $pwd) {
	global $db;
	//verify with DB
	//dangerous way
	//$sql = "select role from user where id='$id' and pwd='$pwd';";
	//$stmt = mysqli_prepare($db, $sql );

	//safer way
	
	$sql = "select id from user where account=? and pwd=?;";
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_bind_param($stmt, "ss", $account, $pwd);
	

	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果
	if($r = mysqli_fetch_assoc($result)) {		
		return $r['id'];
	} else {
		return 0;
	}

}

function signin($account, $pwd,$role){
        global $db;
    
        $sql = "insert into user (account, pwd, role) values (?,?,?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
        $stmt = mysqli_prepare($db, $sql); //prepare sql statement
        mysqli_stmt_bind_param($stmt, "sss", $account,$pwd,$role); //bind parameters with variables, with types "sss":string, string ,string
    
        mysqli_stmt_execute($stmt);  //執行SQL
        return True;
        }
        
        

?>