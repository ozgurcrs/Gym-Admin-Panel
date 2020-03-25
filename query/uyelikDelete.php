<?php 
include "../connect.php";
 $userTC = $_POST['tc'];


 if($_POST)
 {
 	$delete = $db->exec("DELETE FROM users where userTC = $userTC");
 	$delete = $db->exec("DELETE FROM usersolcum where userTC = $userTC");
 	$delete = $db->exec("DELETE FROM programlar where userTC = $userTC");
 		?>



				 <meta http-equiv="refresh" content="0; URL=../index.php?status=11">
		<?php		
 	}
 
?>