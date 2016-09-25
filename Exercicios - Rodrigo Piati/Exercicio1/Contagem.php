<?php
	for ($x = 1; $x <= 100; $x++){
		echo "<li>";
		if($x % 3 == 0 || $x % 5 == 0){
			if($x % 3 == 0){
				echo 'Tres';
			} echo " ";
			if ($x % 5 == 0){
				echo 'Cinco';
			}
		}else{
			echo $x;
		} 
		echo "</li>";
		echo "<br/>";
	}	

?>