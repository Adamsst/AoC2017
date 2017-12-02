<?php

//Read each line of the input file as a single line
//Split each value in the line by the tab and cast it as an int
//Find the difference between the max int and min int in each line, add to sum

$input = array();
$lines = file('input.txt');
$sum = 0;

foreach ($lines as $singleLine){
	array_push($input, array_map('intval',explode("\t", $singleLine)));
}

for($i=0;$i<count($input);$i++){
	$sum += (max($input[$i]) - min($input[$i]));
}

echo $sum;

?>