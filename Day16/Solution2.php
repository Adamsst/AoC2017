<?php 

$input = array();
$lines = file('input.txt');
$dance = "abcdefghijklmnop";
foreach($lines as $singleLine){
	$input = array_map('trim',explode(",",$singleLine));//This gives us dancemovePOSITTION/POSITION2
}
$bill=true;
$state = array();
array_push($state, $dance);
while($bill){
	for($x=0;$x<count($input);$x++){
		switch($input[$x][0]){
			case 's':
				$temp = substr($input[$x],1,strlen($input[$x]));
				$num = (int)$temp;
				$temp = substr($dance,strlen($dance)-$num,strlen($dance));
				$temp2 = substr($dance,0,strlen($dance)-$num);
				$dance = $temp . $temp2;
				break;
			case 'x':
				$str1=null;
				$str2=null;
				$swi = true;
				for($i=1;$i<strlen($input[$x]);$i++){
					if($input[$x][$i] != '/'){
						if($swi){
							$str1.=$input[$x][$i];
						}
						else{
							$str2.=$input[$x][$i];
						}
					}
					else{
						$swi=false;
					}
				}
				$num1 = (int)$str1;
				$num2 = (int)$str2;
				$str1 = $dance[$num1];
				$str2 = $dance[$num2];
				$dance[$num1]=$str2;
				$dance[$num2]=$str1;
				break;
			case 'p':
				$str1=$input[$x][1];
				$str2=$input[$x][3];
				$dance = str_replace($str1,"y",$dance);
				$dance = str_replace($str2,"z",$dance);
				$dance = str_replace("y",$str2,$dance);
				$dance = str_replace("z",$str1,$dance);
				break;
			default:
				break;
		}
	}
	
for($j=0;$j<count($state);$j++){
	if($state[$j] == $dance){
		$bill = false;
	}
}
if($bill){
	array_push($state, $dance);
}
	
}
$offset = 1000000000 % count($state);

echo $state[$offset];

?>