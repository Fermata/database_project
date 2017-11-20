<?php
	session_start();

	error_reporting(-1);
	ini_set('display_errors', '1');

	define('DATABASE_SERVER', 'localhost');
	define('DATABASE_USER', 'root');
	define('DATABASE_PASS', '111111');
	define('DATABASE_DB', 'cs4400_Group_112');

	$database = mysqli_connect(DATABASE_SERVER,DATABASE_USER,DATABASE_PASS, DATABASE_DB);

	mysqli_query($database,"set session character_set_connection=utf8;");
	mysqli_query($database,"set session character_set_results=utf8;");
	mysqli_query($database,"set session character_set_client=utf8;");

	function password($string){
		return md5($string);
	}

	function fetch($result, $zero = false){
		$row = array();
		if($zero){
			return mysqli_fetch_assoc($result);
	    }else{
			while($data = mysqli_fetch_assoc($result)){
				$row[] = $data;
			}
		}
		return $row;
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
		$query =  "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
		$result = mysqli_query($database, $query) or die( mysql_error());
		$_USER = fetch($result, true);
	}

	if($_SERVER['REQUEST_URI'] != "/" && $_SERVER['REQUEST_URI'] != "/authentication"){
		if($_SESSION['authenticated'] != true){
			location("/authentication");
		}
	}

	if(strpos($_SERVER['REQUEST_URI'], "/admin-") === 0){
		adminonly();
	}

	function randomNumber($length) {
	    $result = '';

	    for($i = 0; $i < $length; $i++) {
	        $result .= mt_rand(0, 9);
	    }

	    return $result;
	}

