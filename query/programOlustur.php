<?php 

include "../connect.php";

if($_POST)
{
	$ogrenciTC = $_POST['ogrenciTC']; 	
	$ilaveTC   = $_POST['ilaveTC'];
	$zaman = $_POST['Zaman'];
	$egitmen = $_POST['egitmen'];
	$date = $_POST['gecerlitarih'];
	$tarih = date("dmY",strtotime($_POST['gecerlitarih']));

			if($tarih == "01011970")
			{
				//Status 5 durumu tarih seçilmeden işlem yapıldı;		?>	
					<meta http-equiv="refresh" content="0; URL=../index.php?s=ProgramOlustur&status=5">  
	
  				<?php
			}

			else 
			{

				if($ogrenciTC == 0 || $zaman == 0)
				{
					//Status 4 veri girilmedi-		?>	
					<meta http-equiv="refresh" content="0; URL=../index.php?s=ProgramOlustur&status=4">  
	
  				<?php
				}


				else 
				{

				$q = $db->prepare("SELECT * FROM programlar where Tarih = $tarih and Saat = $zaman");
  			$q->execute();
  			 $count = $q->rowCount();
  						foreach ($q as $a ) {
  						 echo "<br>";	echo $a["Tarih"];
  						 echo "<br>";echo "<br>";echo $tarih;
  						}
  			if($count > 0)
  			{		//Status 3 Durumu Bu Saate ve tarihte biri var;		?>	
					<meta http-equiv="refresh" content="0; URL=../index.php?s=ProgramOlustur&tarih=<?php echo $date; ?>&status=3">  
	
  				<?php
  			}

  			else {
  				$query = $db->prepare("INSERT INTO programlar SET
			uyeTC = :userTC,
			ilaveTC = :ilaveTC,
			Saat = :zaman,
			egitmenTC = :egitmen,
			Tarih = :tarih");
			$insert = $query->execute(array(
			      "userTC" => $ogrenciTC,
			      "ilaveTC" => $ilaveTC,
			      "zaman" =>$zaman,
			      "egitmen"=>$egitmen,
			      "tarih" =>$date,
			      
			));
			if ( $insert ){
			    $last_id = $db->lastInsertId();
			    ?>
			    <meta http-equiv="refresh" content="0; URL=../index.php?s=ProgramOlustur&tarih=<?php echo $date; ?>&status=1">

			 
			<?php
			}

			
  			}
  				
				}

			}
  			

	

			

}


?>