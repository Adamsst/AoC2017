<?php 

//This was a good puzzle.
//I wrote this code late at night so its clunky but heres my thought process
//Find a node whose child nodes are all at the top level of the tree
//Check the child node's weights against eachother
//If they are not all equal, report it.
//Else, add their weights to their root node, and mark that root node as top level
//Repeat this until a report of unequal weights comes in

$input = array();
$weights = array();
$temp = array();
$baseNodes = array();
$branches = array();
$do = true;
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
	$baseNodes[$input[$i][0]] = count($input[$i]);
}
for($i=0;$i<count($input);$i++){
	if(count($input[$i]) > 1){
		$branches[$input[$i][0]] = array($input[$i][1]);
		for($j=2;$j<count($input[$i]);$j++){
			array_push($branches[$input[$i][0]], $input[$i][$j]);
		}	
	}
	else{
		$branches[$input[$i][0]] = "0";
	}
}

foreach($lines as $singleLine){
	array_push($temp,array_map('trim',explode(" ",$singleLine)));
}

for($i=0;$i<count($temp);$i++){
	$temp[$i][1]=rtrim($temp[$i][1],")");
	$temp[$i][1]=ltrim($temp[$i][1],"(");
	$weights[$temp[$i][0]]=(int)$temp[$i][1];
}

while($do){
	foreach($baseNodes as $key => $value){
		if($value > 1){
			
			$firstTest = true;
			
			for($x=0;$x<count($branches[$key]);$x++){
				if($baseNodes[$branches[$key][$x]] > 1){
					$firstTest = false;
				}
			}

			if($firstTest){
				$weightTest = false;
				$target = $weights[$branches[$key][0]];

				for($k=1;$k<count($branches[$key]);$k++){
					if($weights[$branches[$key][$k]] != $target){
						$weightTest = true;
						break;
					}
				}
			
				if($weightTest){
					echo $key . " is " . "\n";
					var_dump($branches[$key]);
					echo $key . " weight is " . $weights[$branches[$key][0]] . " " . $weights[$branches[$key][1]] . " " . $weights[$branches[$key][2]] . "\n";
					//May need to adjust this to see which key has the wrong weight
					$do=false;
				}
				else{
					for($k=0;$k<count($branches[$key]);$k++){
						$weights[$key] += $weights[$branches[$key][$k]];
					}
					$baseNodes[$key] = 1;
				}
			}
		}
	}
}

?>