<?php 
include "../connect.php";
 $userTC = $_POST['tc'];
$durum = $_POST['durum'];
$status = 1;



if($durum == 0)
{
	$status = 0;
}

$query = $db->prepare("UPDATE users SET
		status = :status
		WHERE userTC = :userTC");
		$update = $query->execute(array(
		     "status" => $status,
		     "userTC"  => $userTC
		));
		if ( $update ){
		     ?>

					    <meta http-equiv="refresh" content="0; URL=../index.php?s=OgrenciProfil&tc=<?php echo $userTC ?>&status=1">
					<?php
		}

		else 
		{
			?>
			<meta http-equiv="refresh" content="0; URL=../index.php?s=OgrenciDuzenle&tc=<?php echo $userTC ?>&status=2">
			<?php
		}


?>