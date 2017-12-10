<?php 

$nums = array();
$lengths = array(34,88,2,222,254,93,150,0,199,255,39,32,137,136,1,167);
$stream = null;

for($i=0;$i<count($lengths);$i++){//Begin setting up input stream
	$stream .= (string)$lengths[$i];
	if($i != count($lengths) - 1){
		$stream .= ",";
	}
}

$lengths = array();

for($i=0;$i<strlen($stream);$i++){
	array_push($lengths,ord($stream[$i]));
}
array_push($lengths,17);
array_push($lengths,31);
array_push($lengths,73);
array_push($lengths,47);
array_push($lengths,23);//Finish setting up input stream

$iterations = 0;
$pos = 0;
$skip = 0;

for($i=0;$i<256;$i++){
	array_push($nums,$i);
}

$tempArray = array();
for($i=0;$i<64;$i++){//Since we have to do 64 loops, I just make the array 64x bigger
	for($j=0;$j<count($lengths);$j++){
		array_push($tempArray,$lengths[$j]);
	}
}

$lengths = $tempArray;//Now the process loop doesn't have to be modified at all

while($iterations < (count($lengths))){	

	$curLength = $lengths[($iterations)];
	$arrToRev = array();
	$i = $pos;
	$affected = array();

	while(count($arrToRev) < $curLength){//This clause produces the array to be reversed and an array of original indeces affected
		array_push($arrToRev, $nums[$i]);	
		array_push($affected,$i);

		if($i === count($nums) - 1){
			$i=0;
		}
		else{
			$i++;
		}	
	}
	$arrToRev = array_reverse($arrToRev);
	for($j=0;$j<count($arrToRev);$j++){//This merges the new reversed array into the original array at the proper indeces
		$nums[$affected[$j]] = $arrToRev[$j];
	}
	
	$j=$pos;
	$k=0;
	while($k < count($arrToRev)){//This moves the position based on the length of the previous reversed array
		if($j === count($nums) - 1){
			$j=0;
		}
		else{
			$j++;
		}
		$k++;
	}
	$k=0;
	while($k < $skip){//This moves the position based on the current skip size
		if($j === count($nums) - 1){
			$j=0;
		}
		else{
			$j++;
		}
		$k++;
	}
	
	$pos=$j;
	$skip++;
	$iterations++;
}

$knot = array();
$knot[0] = array();
$track = 0;
for($i=0;$i<count($nums);$i++){//This produces our "sparse hash" arrays which are 16 consecutive array of 16 ints produced by the previous output
	if($i % 16 === 0 && $i != 0){
		$track++;
		$knot[$track] = array();
	}
	array_push($knot[$track],$nums[$i]);
}

$hexArr = array();

for($i=0;$i<count($knot);$i++){//This XORs each sparse hash array into a "dense hash"
	array_push($hexArr,($knot[$i][0] ^ $knot[$i][1] ^ $knot[$i][2] ^ $knot[$i][3] ^ $knot[$i][4] ^ $knot[$i][5] ^ $knot[$i][6] ^ $knot[$i][7] ^ $knot[$i][8] ^ $knot[$i][9] ^ $knot[$i][10] ^ $knot[$i][11] ^ $knot[$i][12] ^ $knot[$i][13] ^ $knot[$i][14] ^ $knot[$i][15]));
}

$hex = null;
for($i=0;$i<count($hexArr);$i++){//This converts each dense hash into its hex value, prepending a 0 if necessary
	$temp = dechex($hexArr[$i]);
	if(strlen($temp) < 2){
		$temp = ("0" . $temp);
	}
	$hex .= $temp;
}

echo $hex . "\n";

?>