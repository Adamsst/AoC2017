<?php 

$posit = array();
$veloc = array();
$accel = array();
$lines = file('C:\php72\scripts\AOC2017\AoC2017\Day20\input.txt');

foreach($lines as $singleLine){
	$temp = array_map('trim',explode(",",$singleLine));
	$position = array((int)substr($temp[0],3),(int)$temp[1],(int)$temp[2]);
	$velocity = array((int)substr($temp[3],3),(int)$temp[4],(int)$temp[5]);
	$acceleration = array((int)substr($temp[6],3),(int)$temp[7],(int)$temp[8]);
	array_push($posit,$position);
	array_push($veloc,$velocity);
	array_push($accel,$acceleration);
}
$runs=0;
while($runs < 1000){
	for($i=0;$i<count($posit);$i++){
		$temp=false;
		for($j=count($posit)-1;$j>=0;$j--){
			if(!array_diff($posit[$i],$posit[$j])){
				if($j != $i){
					echo "run: $runs, collision $i $j \n";
					array_splice($posit,$j,1);
					array_splice($veloc,$j,1);
					array_splice($accel,$j,1);
					$temp = true;
				}
			}
		}
		if($temp){
			array_splice($posit,$i,1);
			array_splice($veloc,$i,1);
			array_splice($accel,$i,1);
			$i--;
		}
	}
	for($i=0;$i<count($veloc);$i++){
		$veloc[$i][0] += $accel[$i][0];
		$veloc[$i][1] += $accel[$i][1];
		$veloc[$i][2] += $accel[$i][2];
	}
	for($i=0;$i<count($posit);$i++){
		$posit[$i][0] += $veloc[$i][0];
		$posit[$i][1] += $veloc[$i][1];
		$posit[$i][2] += $veloc[$i][2];
	}
	$runs++;
}
echo count($posit) . " end";

?>