<?php

include "../connect.php";

if($_POST)
{
	echo $tarih = $_POST['tarih'];

	?>

	  <meta http-equiv='refresh' content='0; URL=../index.php?s=ProgramOlustur&tarih=<?php echo $tarih ?>'>
<?php
}

 ?>