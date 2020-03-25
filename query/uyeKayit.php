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
	$gender = trim($_POST['gender']);
	$time   = trim($_POST['time']);
	$control = @$_POST['control'];
	$date = date("d/m/Y");


	if(@$control)
		$time -= 1;

	

	if(empty($user) || empty($tc) || empty($email) ||empty($phone)  || empty($birth) || empty($gender) || empty($time))
	{
		?>
			<meta http-equiv="refresh" content="0; URL=../index.php?s=OgrenciEkle&status=4">
		<?php
	}

	else
	{
		$query = $db->prepare("SELECT * FROM users where userTC = $tc");
		$query->execute();
		if($query->rowCount() == 0)
		{


					if(!is_numeric($tc) || !is_numeric($phone))
					{
						?>
						<meta http-equiv="refresh" content="0; URL=../index.php?s=OgrenciEkle&status=3">
					<?php
					}


					else 
					{
						$query = $db->prepare("INSERT INTO users SET
						userName = :user,
						userTC = :tc,
						userEmail = :email,
						userPhone = :phone,
						userBirth = :birth,
						userGender  = :gender,
						userTime    = :timer,
						userDate    = :userdate");
						$insert = $query->execute(array(
						      "user" => $user,
						      "tc" => $tc,
						      "email" =>$email,
						      "phone" =>$phone,
						      "birth" => $birth,
						      "gender"=>$gender,
						      "timer" =>$time,
						      "userdate" =>$date,
						      
						));
						if ( $insert ){
						    $last_id = $db->lastInsertId();
						    ?>

						    <meta http-equiv="refresh" content="0; URL=../index.php?status=1">
						<?php
						}

						else{echo "hata";}

					}
						
						
						
		}


			else 
			{
				?>
						<meta http-equiv="refresh" content="0; URL=../index.php?s=OgrenciEkle&status=2">
					<?php
			}

			


	}

	

}






 ?>



