<?php 
	$get = @$_GET['s'];



	switch ($get) 
	{
		case "OgrenciEkle":
		include "pages/ogrenciEkle.php";
		break;

    case "OgrenciDuzenle":
    include "pages/ogrenciDuzenle.php";
    break;

    case "OgrenciRaporu":
    include "pages/ogrenciRaporu.php";
    break;

		case "ProgramOlustur":
		include "pages/programOlustur.php";
		break;

		case "OgrenciOnayla":
		include "pages/ogrenciOnayla.php";
		break;

		case "AktifOgrenciler":
		include "pages/aktifOgrenciler.php";
		break;

		case "ProgramGoruntule":
		include "pages/programGoruntule.php";
		break;

		case "PasifOgrenciler":
		include "pages/pasifOgrenciler.php";
		break;

    case "OgrenciProfil":
    include "pages/ogrenciProfil.php";
    break;

    case "OgrenciOlcum":
    include "pages/ogrenciOlcum.php";
    break;

    case "EgitmenKayit":
    include "pages/egitmenKayit.php";
    break;

    case "EgitmenEtkinlikleri":
    include "pages/egitmenEtkinlikleri.php";
    break;


		default:
		$status = @$_GET['status'];

    $query = $db->prepare("SELECT * FROM users where userTime >0 and status = 0");
    $query->execute();
    $count = $query->rowCount();

    $query = $db->prepare("SELECT * FROM users where userTime =0 or status = 1");
    $query->execute();
    $passivecount = $query->rowCount();

    $query = $db->prepare("SELECT * FROM users where userTime < 3 and status = 0");
    $query->execute();
    $lessTime = $query->rowCount();


    $query = $db->prepare("SELECT * FROM users");
    $query->execute();
    $sum = $query->rowCount();




    if($status == 10)
    {
      echo '<div class="alert alert-success" role="alert">
  Kullanıcını ölçümleri eklendi. Profil sayfasından görebilirsiniz.
</div>';
    }

    if($status == 11)
    {
      echo '<div class="alert alert-success" role="alert">
  Silme işlemi başarılı bir şekilde gerçekleşti.
</div>';
    }

    if($status == 1)
    {
      echo '<div class="alert alert-success" role="alert">
  Kayıt başarılı bir şekilde gerçekleşti.
</div>';
    }
    echo '
      
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">İstatistik</h1>
        
          </div>

          <!-- Content Row -->
          <div class="row">

     <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Toplam Kayıt Sayısı</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">'.$sum.'</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-piggy-bank fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Aktif Üyeler</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">'.$count.'</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-thumbs-up fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


              <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Süresi Az Kalan Üyeler</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">'.$lessTime.'</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-clock fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        
      

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pasif Üyeler</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">'.$passivecount.'</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-thumbs-down fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        

          <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Süresi az kalan üyeler</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Üye Süre Tablosu</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Ad Soyad</th>
                      <th>Telefon</th>
                      <th>Kayıt Süresi</th>
                      <th>Profil</th> 
                    </tr>
                  </thead>
                
                  <tbody>';
                  ?>

      
                  <?php

                      $query = $db->prepare("SELECT * FROM users where userTime <3  LIMIT 10");
                      $query->execute();
                        foreach ($query as $get) 
                        {
                            ?>
                       <tr>
                             
                              <td><?php echo $get['userName']; ?></td>
                              <td><?php echo $get['userPhone']; ?></td>
                              <td><?php echo $get['userTime']; ?></td>

                              <td><a href="index.php?s=OgrenciProfil&tc=<?php echo $get['userTC']; ?>"><input type="button" class="btn btn-primary" value="Profil"></a></td>
                             
                      </tr>

                            <?php
                        }
                   
                  echo '
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div></div>';
		break;
	}


?>