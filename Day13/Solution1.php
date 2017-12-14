<?php 
$lines = file('input.txt');
$input = array();
$direction = array();
$index = array();
$layer = 0;
$severity = 0;

foreach($lines as $singleLine){
	$temp = array_map('trim',explode(" ",$singleLine));
	$temp[0] = rtrim($temp[0],":");
	$input[$temp[0]] = (int)$temp[1];
	$direction[$temp[0]] = true;//true for positive/increasing
	$index[$temp[0]] = 0;
}

for($i=0;$i<max(array_keys($input));$i++){
	if(!isset($input[$i])){
		$input[$i]=0;
	}
}	

while($layer<count($input)){
	for($i=0;$i<count($input);$i++){
		if($input[$i] != 0){
			if($index[$i] == 0){
				if($layer == $i){
					$severity += ($input[$i] * $i);
					echo "Caught at $i" . "\n";
				}
				$direction[$i] = true;
			}
			else if($index[$i] == ($input[$i]-1)){
				$direction[$i] = false;
			}
			if($direction[$i]){
				$index[$i]++;
			}
			else{
				$index[$i]--;
			}
		}
	}
$layer++;
}

echo "$severity \n";
?>