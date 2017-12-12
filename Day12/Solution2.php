<?php 
$lines = file('input.txt');
$input = array();

foreach($lines as $singleLine){
	$temp = array_map('trim',explode(" ",$singleLine));
	$clean = array();
	unset($temp[1]);
	$temp = array_values($temp);
	for($i=0;$i<count($temp);$i++){
		$temp[$i]= rtrim($temp[$i],',');
	}
	for($i=0;$i<count($temp);$i++){
		$temp[$i]= (int)$temp[$i];
	}
	array_push($input,$temp);
}

$group = array();
$groups = 1;
array_push($group,0);
for($x=0;$x<count($input);$x++){

	if(!in_array($input[$x][0],$group,true)){
		array_push($group,$input[$x][0]);
		$groups++;		
	}

	for($i=count($group)-1;$i<count($group);$i++){	
		for($j=0;$j<count($input);$j++){
			if($input[$j][0] === $group[$i]){
				for($k=1;$k<count($input[$j]);$k++){
					if(!in_array($input[$j][$k],$group,true)){
						array_push($group,$input[$j][$k]);
					}
				}
			}
		}
	}
	
}

echo $groups;
?>