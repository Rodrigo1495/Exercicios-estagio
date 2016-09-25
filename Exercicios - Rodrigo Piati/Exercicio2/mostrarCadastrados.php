<html>	
<table>

	<?php

	  
	  include "conecta.php";
      $query = "SELECT * FROM USUARIOS";

      $exec = mysql_query($query, $conecta);
      while($do = mysql_fetch_array($exec)){
       	  echo "<strong>Nome:</strong> ".$do[0]. "<strong> Email: </strong> ".$do[1]. "<strong> Data: </strong> ".$do[2]. " <br/>";   
   	  }

  ?>

</table>
</html>
