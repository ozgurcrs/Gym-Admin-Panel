<?php 
include "../connect.php";
if($_POST)
{
	$id = $_POST['id'];

	if(@$_POST['tek'] == "Tek")
	{
		$userTC = $_POST['tc'];
		$time = $_POST['time'];
		$time = $time-1;
		$status=1;
		$tek = 1;

		$query = $db->prepare("UPDATE users SET
		userTime = :userTime
		WHERE userTC = :userTC");
		$update = $query->execute(array(
		     "userTime" => $time,
		     "userTC"  => $userTC,
		));
		if ( $update ){
		     	$query = $db->prepare("UPDATE programlar SET
				durum = :durum,
				Person= :tek
				WHERE uyeTC = :userTC and ID_P = :id");
				$update = $query->execute(array(
				     "durum" => $status,
				     "tek" =>$tek,
				     "userTC"  => $userTC,
				     "id" =>$id,
				));
				if ( $update ){
				     ?>

							    <meta http-equiv="refresh" content="0; URL=../index.php?s=OgrenciOnayla&status=35">
							<?php
		}
		}

		else 
		{
			?>
			<meta http-equiv="refresh" content="0; URL=../index.php?s=OgrenciOnayla&status=0">
			<?php
		}
	}

	if(@$_POST['cift'] == "Cift")
	{
		$userTC = $_POST['tc'];
		$ilaveTC = $_POST['ilaveTC'];
		$time = $_POST['time'];
		$ilaveTime = $_POST['ilaveTime'];
		$ilaveTime = $ilaveTime - 1;
		$time = $time-1;
		$status=1;
		$cift = 1;

		$query = $db->prepare("UPDATE users SET
		userTime = :userTime
		WHERE userTC = :userTC");
		$update = $query->execute(array(
		     "userTime" => $time,
		     "userTC"  => $userTC,
		));
				if ( $update )
				{
									$query = $db->prepare("UPDATE users SET
							userTime = :userTime
							WHERE userTC = :userTC");
							$update = $query->execute(array(
							     "userTime" => $ilaveTime,
							     "userTC"  => $ilaveTC,
							));
							if ( $update )
							{
										$query = $db->prepare("UPDATE programlar SET
										durum = :durum,
										Person= :cift
										WHERE uyeTC = :userTC and ID_P = :id");
										$update = $query->execute(array(
										     "durum" => $status,
										     "cift" => $cift,
										     "userTC"  => $userTC,
										     "id" =>$id,
										));
										if ( $update ){
										     ?>

											<meta http-equiv="refresh" content="0; URL=../index.php?s=OgrenciOnayla&status=35">
													<?php
											}

							}

							else 
							{
								?>
								<meta http-equiv="refresh" content="0; URL=../index.php?s=OgrenciOnayla&status=0">
								<?php
							}

				}

				else 
				{
					?>
					<meta http-equiv="refresh" content="0; URL=../index.php?s=OgrenciOnayla&status=0">
					<?php
				}
		



	}

}




?>