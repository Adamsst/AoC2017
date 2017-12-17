<?php 

$step = 359;
$lock = array();
array_push($lock,0);
$x=0;//Used as an index for spinning around the lock
$c=0;//max element to be added to our lock array
$pos=0;
while($c<2017){
	while($x < $step){
		if($pos == count($lock) -1){
			$pos=0;
		}
		else{
			$pos++;
		}
		$x++;
	}
	$x=0;
	array_splice($lock,$pos+1,0,$c+1);
	$pos++;
	$c++;
}
echo $lock[$pos+1];
?>