<?php 

//Read each line of input into an array of strings
//Sanitize the input so that each array contains only the alphabetical strings
//set up an array of all the base nodes
//Check if and of the "held" strings are in the base list
//If they are, remove them leaving us with a single string.

$input = array();
$baseNodes = array();
$lines = file('input.txt');

foreach($lines as $singleLine){
	array_push($input,array_map('trim',explode(" ",$singleLine)));
}

for($i=0;$i<count($input);$i++){
	for($j=0;$j<count($input[$i]);$j++){
		if(strpos($input[$i][$j],"(") !== false || strpos($input[$i][$j],">") !== false){
			array_splice($input[$i],$j,1);
			$j--;//Needed due to splice reindexing
		}
		else if(strpos($input[$i][$j],",") !== false){
			$input[$i][$j]=rtrim($input[$i][$j],",");
			$j--;//Not needed due to the nature of our input but should be here
		}
	}
}

for($i=0;$i<count($input);$i++){
	array_push($baseNodes,$input[$i][0]);
}

for($i=0;$i<count($input);$i++){	
	if(count($input[$i])>=1){
		for($j=1;$j<count($input[$i]);$j++){
			$baseNodes = array_diff($baseNodes,[$input[$i][$j]]);
		}
	}
}

var_dump($baseNodes);

?>