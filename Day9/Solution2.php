<?php 

$input = file_get_contents('input.txt');
$level = 0;
$score = 0;
$garbage = false;
$garbageScore = 0;

for($i=0;$i<strlen($input);$i++){
	
	switch($input[$i]){
		case '{':
			if(!$garbage){
				$level++;
			}
			else{
				$garbageScore++;
			}
			break;
		case '}':
			if(!$garbage){
				$score+=$level;
				$level--;	
			}
			else{
				$garbageScore++;
			}
			break;
		case '<':
			if(!$garbage){
				$garbage = true;
			}
			else{
				$garbageScore++;
			}
			break;
		case '>':
			$garbage = false;
			break;
		case '!':
			$i++;
			break;
		default:
			if($garbage){
				$garbageScore++;
			}
			break;	
	}

}

echo $score . " " . $garbageScore;

?>