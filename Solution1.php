<?php 

$input = array();
$lines = file('input.txt');
$n=0;
$s=0;
$e=0;
$w=0;

foreach($lines as $singleLine){
	$input = array_map('trim',explode(",",$singleLine));
}

for($i=0;$i<count($input);$i++){
	
	switch($input[$i]){
		case "n":
			$n += 1;
			break;
		case "ne":
			$n += 0.5;
			$e += 0.5;
			break;
		case "nw":
			$n += 0.5;
			$w += 0.5;
			break;
		case "s":
			$s += 1;
			break;
		case "se":
			$s += 0.5;
			$e += 0.5;
			break;
		case "sw":
			$s += 0.5;
			$w += 0.5;
			break;
		default:
			break;
	}
	
}

if(abs($e - $w) > abs($n - $s)){
	echo (abs($e - $w)*2);
}
else{
	echo (abs($n - $s) + abs($e - $w));
}
?>