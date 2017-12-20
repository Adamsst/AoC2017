<?php 

$posit = array();
$veloc = array();
$accel = array();
$lines = file('input.txt');

foreach($lines as $singleLine){
	$temp = array_map('trim',explode(",",$singleLine));
	$position = array((int)substr($temp[0],3),(int)$temp[1],(int)$temp[2]);
	$velocity = array((int)substr($temp[3],3),(int)$temp[4],(int)$temp[5]);
	$acceleration = array((int)substr($temp[6],3),(int)$temp[7],(int)$temp[8]);
	array_push($posit,$position);
	array_push($veloc,$velocity);
	array_push($accel,$acceleration);
}

$minA = 100;//Arbitrary starting point from a glance at the data
$minAinds = array();

for($i=0;$i<count($accel);$i++){
	if((abs($accel[$i][0]) + abs($accel[$i][1]) + abs($accel[$i][2])) <= $minA){
		$minA = (abs($accel[$i][0]) + abs($accel[$i][1]) + abs($accel[$i][2]));
	}
}
for($i=0;$i<count($accel);$i++){
	if((abs($accel[$i][0]) + abs($accel[$i][1]) + abs($accel[$i][2])) === $minA){
		array_push($minAinds, $i);
	}
}
for($i=0;$i<count($minAinds);$i++){
	echo (abs($veloc[$minAinds[$i]][0]) + abs($accel[$minAinds[$i]][1]) + abs($accel[$minAinds[$i]][2])) . " " . $minAinds[$i];
	echo "<br>";//index with the smallest velocity will be closest to 0,0,0
}

?>