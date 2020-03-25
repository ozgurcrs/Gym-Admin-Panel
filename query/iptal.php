<?php 

include "../connect.php";

 $id = $_GET['id'];

$delete = $db->exec("DELETE FROM programlar where ID_P = $id");
 	
 		?>



				 <meta http-equiv="refresh" content="0; URL=../index.php?s=OgrenciOnayla&status=13">
		<?php		




?>