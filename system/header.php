<?php
	session_start();

	error_reporting(-1);
	ini_set('display_errors', '1');

	define('DATABASE_SERVER', 'academic-mysql.cc.gatech.edu');
	define('DATABASE_USER', 'cs4400_Group_112');
	define('DATABASE_PASS', 'ZIFRibn7');
	define('DATABASE_DB', 'cs4400_Group_112');

	$database = mysqli_connect(DATABASE_SERVER,DATABASE_USER,DATABASE_PASS, DATABASE_DB);

	function password($string){
		return md5($string);
	}

	function fetch($result, $zero = false){
		$row = array();
		if($zero){
			return mysql_fetch_assoc($result);
	    }else{
			while($data = mysql_fetch_assoc($result)){
				$row[] = $data;
			}
		}
		return $row;
	}

	function randomNumber($length) {
	    $result = '';

	    for($i = 0; $i < $length; $i++) {
	        $result .= mt_rand(0, 9);
	    }

	    return $result;
	}

	function location ($location){
		header("Location: $location");
		exit();
	}

	function today ($dots = ""){
		$today = getdate();
		$today = $today['year'] . $dots . str_pad($today['mon'],2,"0",STR_PAD_LEFT) . $dots . str_pad($today['mday'],2,"0",STR_PAD_LEFT);
		if($dots == ""){
			return intval($today);
		}
		return $today;
	}

	function adminonly ($force = true){
		global $_USER;
		if(!$force){
			header('HTTP/1.0 403 Forbidden');
			include('error/403.htm');
			exit();
		}
	}

	define('authenticated', @$_SESSION['authenticated'] === true);

	$_USER = array();

	if(authenticated){
		$result = mysqli_query($database, "SELECT * FROM user WHERE username = {$_SESSION['username']}") or die( mysql_error());
		$_USER = fetch($result, true);
	}

	// if($_SERVER['REQUEST_URI'] != "/" && $_SERVER['REQUEST_URI'] != "/authentication"){
	// 	if($_SESSION['authenticated'] != true){
	// 		location("/authentication");
	// 	}
	// }

	if(strpos($_SERVER['REQUEST_URI'], "/admin-") === 0){
		adminonly();
	}
