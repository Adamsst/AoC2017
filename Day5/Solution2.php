<?php 

$input = array();
$lines = file('input.txt');
$i=0;
$sum = 0;

foreach($lines as $singleLine){
	array_push($input,(int)$singleLine);
}

while($i<count($input)){
	$sum++;
	$j=$i;
	$i += $input[$i];
	
	if($input[$j] >= 3){
		$input[$j]--;
	}
	else{
		$input[$j]++;
	}
	
	if($i>=count($input)){
		echo $sum;
	}
}

?>