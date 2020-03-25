<?php 
$tc = $_GET['tc'];
 $query = $db->query("SELECT * FROM users WHERE userTC = '{$tc}'")->fetch(PDO::FETCH_ASSOC);

?>

<div class="container main-secction">
        <div class="row">
            <div class="row user-left-part">

                <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                    <div class="row ">
                        <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                            <img src="image/usericon.jpg" class="rounded-circle">
                        </div>


                        <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                            <?php if($query['userTime'] == 0 || $query['status'] == 1)
                            {
                                    echo ' <button id="btn-contact" data-toggle="modal"  class="btn btn-dark btn-block follow"><span class="fa fa-thumbs-up" style="margin-right:5px;"></span>Pasif Üye</button> ';

                            } 


                            else
                                {
                                    echo ' <button id="btn-contact" data-toggle="modal"  class="btn btn-success btn-block follow"><span class="fa fa-thumbs-up" style="margin-right:5px;"></span>Aktif Üye</button> ';
                                    ?>
                                    <button class="btn btn-warning btn-block"><span class="fa fa-clock" style="margin-right:5px;"></span><?php echo $query['userTime']; ?> Saat Kaldı.</button>
                                    <?php
                                }
                            ?>
                           
                            <a href="index.php?s=OgrenciOlcum&tc=<?php echo $tc; ?>" class="btn btn-info btn-block"><span class="fa fa-smile" style="margin-right:5px;" ></span> Vucüt Ölçümü Ekle </a>
                            <a href="index.php?s=OgrenciDuzenle&tc=<?php echo $tc; ?>" class="btn btn-primary btn-block"><span class="fa fa-smile" style="margin-right:5px;" ></span>Süre Uzat</a>   
                            <form action="query/uyelikDondur.php" method="POST">
                            <input type="hidden" value="<?php echo $tc; ?>" name="tc" >

                            <?php 
                              if($query['status'] == 1)
                              {
                                echo ' <input type="submit" name="uyelikDondur" value="Üyeliği Etkinleştir" style="margin-top:10px;" class="btn btn-success btn-block">';
                                echo ' <input type="hidden" value="0" name="durum" >';
                              }

                              else 
                              {
                                echo '<input type="submit" name="uyelikDondur" value="Üyeliği Dondur" style="margin-top:10px;" class="btn btn-danger btn-block">';
                                echo ' <input type="hidden" value="1" name="durum" >';
                              }
                             ?>
                              
                          
                             </form>   
                              <form action="query/uyelikDelete.php" method="POST">
                                 <input type="submit" name="uyelikDondur" value="Üyeliği Sil"  style="margin-top:10px; background: #171738;color: #fff" class="btn btn-block ">
                                 <input type="hidden" value="<?php echo $tc; ?>" name="tc" >
                              </form>
                                                      
                        </div>

     <?php 
              $status = @$_GET['status'];
              if($query['status'] == 0 && $status == 1)
              {
                   echo ' <div style="margin-top:10px;" class="alert alert-success" role="alert">
 İşlem Başarılı! Öğrenciye ders saati eklemek isteyebilirsin ?  <a href="index.php?s=OgrenciDuzenle&tc='.$tc.'" class="alert-link">Tıklayınız.</a>. 
</div>';
              }
           

            ?>
                        <div class="row user-detail-row">
                            <div class="col-md-12 col-sm-12 user-detail-section2 pull-left">
                                <div class="border"></div>
                                
                            </div>                           
                        </div>
                       
                    </div>
                </div>
 
                <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                    <div class="row profile-right-section-row">
                        <div class="col-md-12 profile-header">
                            <div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                    <h1><?php echo $query['userName']; ?></h1>
                                    
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1 text-right pull-rigth">
                                    <button class="btn btn-primary btn-block"><span class="fa fa-mobile-alt"></span> <?php echo $query['userPhone'];  ?></button> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                        <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                  <a class="nav-link active" href="#profile" role="tab" data-toggle="tab" style="font-size:16px;"><i style="margin-right:5px;" class="fa fa-user-circle"></i>Kişisel Bilgiler</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" href="#buzz" role="tab" data-toggle="tab" style="font-size:16px;"><i class="fas fa-info-circle"></i> Ölçüm Tablosu</a>
                                                </li>                                                
                                              </ul>
                                              
                                              <!-- Tab panes -->
                                              <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade show active" id="profile">
                                                    <br>
                                                        <div class="row">

                                                                <div class="col-md-3">
                                                                    <label>TC No:</label>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <p><?php echo $query['userTC']; ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label>E-mail:</label>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <p><?php echo $query['userEmail']; ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label>Kayıt Tarihi:</label>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <p><?php echo $query['userDate']; ?></p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label>Üyelik Bitiş:</label>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <p>Kayıt Girilmedi.</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Katıldığı Dersler:</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                   <span>Son katıldığı 10 saatlik dersleri görmek için [Geliştirme Aşamasında]</span> <a href="">Tıklayınız</a>
                                                                </div>
                                                            </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="buzz">
                                                        <div class="row">
                                                                 <div class="card-body">
                                                                  <div class="table-responsive">
                                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                                       <thead>
                                                                        <tr>
                                                                          <th>Tarih</th>
                                                                          <th>Kilo</th>
                                                                          <th>Yağ</th>
                                                                          <th>Su</th>
                                                                          <th>Kas</th>
                                                                          <th>Kemik</th>
                                                                          <th>Kcal</th>
                                                                          <th>Omuz</th>
                                                                          <th>Gögüs</th>
                                                                    
                                                                      <tbody>
                                                                        <?php 
                                                                            $query = $db->query("SELECT * FROM usersolcum WHERE userTC = $tc", PDO::FETCH_ASSOC);
                                                                              if ( $query->rowCount() ){
                                                                                   foreach( $query as $row ){
                                                                                        
                                                                                        echo '
                                                                                            <tr>
                                                                                              <td>'.$row['tarih'].'</td>
                                                                                              <td>'.$row['kilo'].'</td>
                                                                                              <td>'.$row['yag'].'</td>
                                                                                              <td>'.$row['su'].'</td>
                                                                                              <td>'.$row['kas'].'</td>
                                                                                              <td>'.$row['kemik'].'</td>
                                                                                              <td>'.$row['kcal'].'</td>
                                                                                              <td>'.$row['omuz'].'</td>
                                                                                              <td>'.$row['gogus'].'</td>
                                                                                              
                                                                                            </tr>';
                                                                                   }
                                                                              } ?>
                                                                        



                                                                       
                                                                      
                                                                      </tbody>



                                                                      <thead>


                                                                          <tr>
                                                                          <th>Tarih</th>
                                                                          <th>Sağ Kol</th>
                                                                          <th>Sol Kol</th>
                                                                          <th>Bel</th>
                                                                          <th>Karın</th>
                                                                          <th>Basen</th>
                                                                          <th>İç Bacak</th>
                                                                          <th>Sağ Bacak</th>
                                                                          <th>Sol Bacak</th>
                                                                          
                                                                        
                                                                          </tr>
                                                                      </thead>

                                                                      <tbody>

                                                                         <?php 
                                                                            $query = $db->query("SELECT * FROM usersolcum WHERE userTC = $tc", PDO::FETCH_ASSOC);
                                                                              if ( $query->rowCount() ){
                                                                                   foreach( $query as $row ){
                                                                                        
                                                                                        echo '
                                                                                            <tr>
                                                                                              <td>'.$row['tarih'].'</td>
                                                                                              <td>'.$row['sagkol'].'</td>
                                                                                              <td>'.$row['solkol'].'</td>
                                                                                              <td>'.$row['bel'].'</td>
                                                                                              <td>'.$row['karin'].'</td>
                                                                                              <td>'.$row['basen'].'</td>
                                                                                              <td>'.$row['icbacak'].'</td>
                                                                                              <td>'.$row['sagbacak'].'</td>
                                                                                              <td>'.$row['solbacak'].'</td>
                                                                                              
                                                                                            </tr>';
                                                                                   }
                                                                              } ?>
                                                                     

                                                                       
                                                                      
                                                                      </tbody>
                                                                    </table>
                                                                  </div>
                                                             </div>
                                                </div>
                                                
                                              </div>
                          
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    