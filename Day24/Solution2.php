<?php 
ini_set('memory_limit','3G');
$lines = file('input.txt');
$input = array();
$bridges=array();
$bridges[0]=array();
$t=0;//track for our bridges array
$run = true;

foreach($lines as $singleLine){
	$temp = explode("/",$singleLine);
	$temp[1] = trim($temp[1]);
	array_push($input,$temp);
}
for($i=0;$i<count($input);$i++){
	if($input[$i][0] == "0"){
        array_push($bridges[$t],array($input[$i][0],$input[$i][1]));
		//array_splice($input,$i,1);
		//$i--;
	}
	else if($input[$i][1] == "0"){
		array_push($bridges[$t],array($input[$i][1],$input[$i][0]));
		//array_splice($input,$i,1);
		//$i--;
	}
}
$t++;
$bridges[$t]=array();
while($run){
	$run = false;
	for($i=0;$i<count($bridges[$t-1]);$i++){
		$l = count($bridges[$t-1][$i])-1;
		for($j=0;$j<count($input);$j++){
			if($input[$j][0] == $bridges[$t-1][$i][$l]){
				$donotadd=false;
				for($x=0;$x<count($bridges[$t-1][$i]);$x+=2){
					if($bridges[$t-1][$i][$x] == $input[$j][0] && $bridges[$t-1][$i][$x+1] == $input[$j][1]){
						$donotadd=true;
					}
					else if($bridges[$t-1][$i][$x] == $input[$j][1] && $bridges[$t-1][$i][$x+1] == $input[$j][0]){
						$donotadd=true;
					} 
				}
				if(!$donotadd){
					array_push($bridges[$t],array_merge($bridges[$t-1][$i],$input[$j]));
					$run = true;
				}
			}
			else if($input[$j][1] == $bridges[$t-1][$i][$l]){
				$donotadd=false;
				for($x=0;$x<count($bridges[$t-1][$i]);$x+=2){
					if($bridges[$t-1][$i][$x] == $input[$j][0] && $bridges[$t-1][$i][$x+1] == $input[$j][1]){
						$donotadd=true;
					}
					else if($bridges[$t-1][$i][$x] == $input[$j][1] && $bridges[$t-1][$i][$x+1] == $input[$j][0]){
						$donotadd=true;
					} 
				}
				if(!$donotadd){
					$temp = array($input[$j][1],$input[$j][0]);
					array_push($bridges[$t],array_merge($bridges[$t-1][$i],$temp));
					$run = true;
				}
			}
		}
	}
	if($run){
		$t++;
		$bridges[$t]=array();
		echo $t . "\n";
	}
}

$i=$t-1;
$max=0;
for($j=0;$j<count($bridges[$i]);$j++){
	$temp = 0;
	for($x=0;$x<count($bridges[$i][$j]);$x++){
			$temp += (int)$bridges[$i][$j][$x];
	}
	if($temp > $max){
			$max = $temp;
	}	
}
echo $max . " is the max";

?>