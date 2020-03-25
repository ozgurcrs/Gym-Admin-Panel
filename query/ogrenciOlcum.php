<?php 

include "../connect.php";

date_default_timezone_set('Europe/Istanbul');
function convertPoint($var)
{
	$var = explode(",",$var);
	
		if(count($var) >1)
		{
			$var = $var[0].".".$var[1];
			return $var;
		}


		else 
			{return $var[0];}
}




$tc = $_POST['tc'];
$tarih = date("d-m-Y");

	$kilo = $_POST['kilo'];
	$yag = $_POST['yag'];
	$su = $_POST['su'];
 	$kas = $_POST['kas'];
	$kemik = $_POST['kemik'];
	$kcal = $_POST['kcal'];
	$omuz = $_POST['omuz'];
	$gogus = $_POST['gogus'];
	$sagkol = $_POST['sagkol'];
	$solkol = $_POST['solkol'];
	$bel = $_POST['bel'];
	$karin = $_POST['karin'];
	$basen = $_POST['basen'];
	$icbacak = $_POST['icbacak'];
	$sagbacak = $_POST['sagbacak'];
	$solbacak = $_POST['solbacak'];


	$kilo = convertPoint($kilo);
	$yag = convertPoint($yag);
	$su = convertPoint($su);
	$kas = convertPoint($kas);
	$kemik = convertPoint($kemik);
	$kcal = convertPoint($kcal);
	$omuz = convertPoint($omuz);
	$gogus = convertPoint($gogus);
	$sagkol = convertPoint($sagkol);
	$solkol = convertPoint($solkol);
	$bel = convertPoint($bel);
	$karin = convertPoint($karin);
	$basen = convertPoint($basen);
	$icbacak = convertPoint($icbacak);
	$sagbacak = convertPoint($sagbacak);
	$solbacak = convertPoint($solbacak);

if($_POST)
	{

			$query = $db->prepare("INSERT INTO usersolcum SET
			kilo = :kilo,
			yag = :yag,
			su =  :su,
			kas =  :kas,
			kemik =  :kemik,
			kcal =  :kcal,
			omuz =  :omuz,
			gogus =  :gogus,
			sagkol =  :sagkol,
			solkol =  :solkol,
			bel =  :bel,
			karin =  :karin,
			basen =  :basen,
			icbacak =  :icbacak,
			sagbacak =  :sagbacak,
			solbacak =  :solbacak,
			tarih   = :tarih,
			userTC      = :tc");

			$insert = $query->execute(array(
			      "kilo" => $kilo,
			      "yag" => $yag,
			      "su" => $su,
			      "kas" => $kas,
			      "kemik" => $kemik,
			      "kcal" => $kcal,
			      "omuz" => $omuz,
			      "gogus" => $gogus,
			      "sagkol" => $sagkol,
			      "solkol" => $solkol,
			      "bel" => $bel,
			      "karin" => $karin,
			      "basen" => $basen,
			      "icbacak" => $icbacak,
			      "sagbacak" => $sagbacak,
			      "solbacak" => $solbacak,
			      "tarih" =>$tarih,
			      "tc"    =>$tc,

		
			      
			));
			if ( $insert ){
			    $last_id = $db->lastInsertId();
			    ?>

			     <meta http-equiv="refresh" content="0; URL=../index.php?status=10">
			<?php
			}

			else{echo "hata";}
	}





?>