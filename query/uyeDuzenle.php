<?php 
include "../connect.php";

$userPhone = $_POST['userPhone'];
$userTime = $_POST['userTime'];
$userTC = $_POST['userTC'];
$id = @$_POST['id'];



    $query = $db->query("SELECT * FROM users WHERE userTC = '{$userTC}'")->fetch(PDO::FETCH_ASSOC);

  	if($userTime == 0)
  	{
  		$userTime = 0;
  	}

  	else 
  	{
		  		if($userTime == 1)
		  	{
		  		$userTime = $query['userTime'];
		  	
		  	
		  	}

		  	else 
		  	{
		  		 $userTime = $query['userTime']+$userTime;
		  	}
  		 
  	}

  	



if(!empty($userPhone))
{

		$query = $db->prepare("UPDATE users SET
		userPhone = :userPhone,
		userTime  = :userTime
		WHERE userTC = :userTC");
		$update = $query->execute(array(
		     "userPhone" => $userPhone,
		     "userTime" => $userTime,
		     "userTC"  => $userTC
		));
		if ( $update ){
		     ?>
					 <meta http-equiv="refresh" content="0; URL=../index.php?s=OgrenciDuzenle&tc=<?php echo $userTC; ?>&status=1">
					   
					<?php
		}

		else 
		{
			?>
			<meta http-equiv="refresh" content="0; URL=../index.php?s=OgrenciDuzenle&tc=<?php echo $userTC; ?>&status=2">
			<?php
		}
}



?>