<?php

//はじめに書いたもの（処理速度おそい）--- 3分以内
for($i = 1;$i<= 100;$i++){
	$ret="";
	if($i%3 == 0){$ret.="Fizz";}
	if($i%5 == 0){$ret.="Buzz";}

	if($ret){echo $ret;}else{echo $i;}
	echo"</br>";
}

//$s=()?true:false;
// $s="";
// for($i=1;$i<=100;$i++){
// 	$s= ((((($i%15 == 0)?'FizzBuzz':'').($i%3 == 0)?'Fizz':'').(($i%5 == 0)?'Buzz':'') )?:$i);
// 	echo $s.'</br>';
// }

//echo()?true:false;
// for($i=1;$i<=100;$i++){echo ((((($i%15 == 0)?'FizzBuzz':'').($i%3 == 0)?'Fizz':'').(($i%5 == 0)?'Buzz':'') )?:$i). '</br>';}

//全部で1時間くらい

?>