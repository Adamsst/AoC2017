<?php 

$input = array();
$lines = file('input.txt');
$register = array();
$tempMax = 0;

foreach($lines as $singleLine){
	array_push($input,array_map('trim',explode(" ",$singleLine)));
}

for($i=0;$i<count($input);$i++){
	$input[$i][2] = (int)$input[$i][2];
	$input[$i][6] = (int)$input[$i][6];
}

for($i=0;$i<count($input);$i++){
	if(!isset($register[$input[$i][0]])){
		$register[$input[$i][0]] = 0;
	}
	if(!isset($register[$input[$i][4]])){
		$register[$input[$i][4]] = 0;
	}
	$pass = false;
	$pass=compare($register[$input[$i][4]],$input[$i][6],$input[$i][5]);

	if($pass){
		if($input[$i][1] == "inc"){
			$register[$input[$i][0]]+=$input[$i][2];
		}
		else if($input[$i][1] == "dec"){
			$register[$input[$i][0]]-=$input[$i][2];
		}
	}

	if(max($register) > $tempMax){
		$tempMax = max($register);
	}

}

echo $tempMax;

function compare($first,$second,$operation){
	$bool = false;
	switch($operation){
		case ">":
			$bool = ($first > $second) ? true : false;
			break;
		case "<":
			$bool = ($first < $second) ? true : false;
			break;
		case ">=":
			$bool = ($first >= $second) ? true : false;
			break;
		case "<=":
			$bool = ($first <= $second) ? true : false;
			break;
		case "==":
			$bool = ($first == $second) ? true : false;
			break;
		case "!=":
			$bool = ($first != $second) ? true : false;
			break;
		default:
			echo "here";
			break;
	}
	return $bool;
}

?>