<?php
include "../connect.php";
date_default_timezone_set('Europe/Istanbul');
 

if($_POST)
{
	$user = trim($_POST['name']);
	$tc   = trim($_POST['TC']);
	$email = trim($_POST['email']);
	$phone = htmlspecialchars(trim($_POST['phone']));
	$birth = trim($_POST['birth']);
	$date = date("d/m/Y");


	if(empty($user) || empty($tc) || empty($email) ||empty($phone)  || empty($birth))
	{
		?>
			<meta http-equiv="refresh" content="0; URL=../index.php?s=EgitmenKayit&status=4">
		<?php
	}

	else
	{

		$query = $db->prepare("SELECT * FROM egitmentab where TC = $tc");
		$query->execute();
		if($query->rowCount() == 0)
		{


			if(!is_numeric($tc) || !is_numeric($phone))
			{
				?>
				<meta http-equiv="refresh" content="0; URL=../index.php?s=EgitmenKayit&status=3">
			<?php
			}
				
				
				$query = $db->prepare("INSERT INTO egitmentab SET
				FirstName = :user,
				TC = :tc,
				Email = :email,
				Phone = :phone,
				Birthday = :birth,
				registration    = :registration");
				$insert = $query->execute(array(
				      "user" => $user,
				      "tc" => $tc,
				      "email" =>$email,
				      "phone" =>$phone,
				      "birth" => $birth,
				      "registration" =>$date,
				      
				));
				if ($insert){
				    $last_id = $db->lastInsertId();
				    ?>
					<meta http-equiv="refresh" content="0; URL=../index.php?status=1">
				    
				<?php
				}

				else{echo "hata";}
		}

		else 
		{
			?>
				<meta http-equiv="refresh" content="0; URL=../index.php?s=EgitmenKayit&status=2">
			<?php
		}


				


	}

	

}






 ?>



