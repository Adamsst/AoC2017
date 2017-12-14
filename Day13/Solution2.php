<?php 
$lines = file('input.txt');
$input = array();
$direction = array();
$prevdirection = array();
$index = array();
$previndex = array();
$layer = 0;
$severity = 0;
$do = true;
$delay=0;

foreach($lines as $singleLine){
	$temp = array_map('trim',explode(" ",$singleLine));
	$temp[0] = rtrim($temp[0],":");
	$input[$temp[0]] = (int)$temp[1];
	$direction[$temp[0]] = true;//true for positive/increasing
	$prevdirection[$temp[0]] = true;//true for positive/increasing
	$index[$temp[0]] = 0;
	$previndex[$temp[0]] = 0;
}

for($i=0;$i<max(array_keys($input));$i++){
	if(!isset($input[$i])){
		$input[$i]=0;
	}
}	

for($i=0;$i<=max(array_keys($input));$i++){
	$previndex[$i] = 0;
	$index[$i] = 0;
	$direction[$i] = true;
	$prevdirection[$i] = true;
}

while($do){	
	$severity = 0;
	$layer=0;
	
	for($z=0;$z<count($index);$z++){//get previous state
		$index[$z] = $previndex[$z];
		$direction[$z] = $prevdirection[$z];
	}

	for($i=0;$i<count($input);$i++){//update previous state to current state
		if($input[$i] != 0){
			if($index[$i] == 0){
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

	for($z=0;$z<count($index);$z++){//set previous sate
		$previndex[$z] = $index[$z];
		$prevdirection[$z] = $direction[$z];
	}
	
	while($layer<count($input)){//Run through the old process loop
		for($i=0;$i<count($input);$i++){
			if($input[$i] != 0){
				if($index[$i] == 0){
					if($layer == $i){
						$severity++;
						$layer=count($input)-1;
						$i=count($input)-1;
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

	if($severity == 0){
		$do = false;
		echo ($delay + 1);
	}
	
	$delay++;
}

?>