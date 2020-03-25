<?php


$tarih = @$_GET['tarih'];
?>
          <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Program Oluştur</h1>
          <p class="mb-4">--> Unutma aynı tarihte ve aynı saatte yalnızca 2 öğrenci çalıştırabilirsin <br>
          ---> İkinci öğrenci daha sonradan kayıt olamaz. <br>
          ----> İkinci öğrenci seçilmezse ders saattinden düşülemez. </p>
          </div>   
          <!-- DataTales Example <--</-->
            
            <span>Bir tarih seçiniz.</span>
             <form action="query/programTarih.php" method="POST">
          <div class="form-group row">
                  
                           <div class="col-sm-6 mb-3 mb-sm-0">
                    
                              <input type="date" name="tarih" class="form-control form-control-user" id="exampleLastName"  >
                          </div>

                          <div class="col-sm-6 mb-3 mb-sm-0">
                    
                              <input type="submit" class="btn btn-success" id="exampleLastName"  value="Getir" >
                          </div>
              
           </div>

             </form>

               

                <?php 
                  $status = @$_GET['status'];

                  if($status == 5)
                  {
                    echo ' <div class="alert alert-danger">Heey unutma ben kahin değilim. Tarih seçmeden ekleme yapmaya çalışıyorsun! Yukarıdan tarih seç ve getire tıkla!</div>';
                  }

                  if($status == 3)
                  {
                    echo ' <div class="alert alert-danger">Dalgınlık yaptın farkettin mi ? Aynı tarihte ve saatte birine daha söz vermişsin. Randevu Dolu!</div>';
                  }
                  if($status == 1)
                  {
                    echo ' <div class="alert alert-success">Randevu başarıyla kayıt edildi. Yenilerini ekleyebilirsin...</div>';
                  }

                   if($status == 4)
                  {
                    echo ' <div class="alert alert-danger">Öğrencileri seçmeden kimi kayıt etmeye çalışıyordun :D Yapmaaaaa !! </div>';
                  }
                ?>
                
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tarihli Program</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Saat</th>
                      <th>Öğrenci Ad Soyad</th>
                      <th>Ek Öğrenci Ad Soyad</th>
                      <th>Eğitmen Adı</th>
                      <th>İşlem</th>
                      <th>İptal</th> 
                      
                    </tr>
                  </thead>
                
                  <tbody>

                    <?php 

                      $q = $db->prepare("SELECT * FROM programlar INNER JOIN users on programlar.uyeTC = users.userTC WHERE Tarih = '$tarih' ");
                    $q->execute();
                    
                          foreach ($q as $get ) {
                              $ilave = $get['ilaveTC'];
                              $egitmenU = $get['egitmenTC'];
                              $query = $db->query("SELECT * FROM users WHERE userTC = '{$ilave}'")->fetch(PDO::FETCH_ASSOC);
                              $qu = $db->query("SELECT * FROM egitmentab WHERE TC = '{$egitmenU}'")->fetch(PDO::FETCH_ASSOC);
                              
                            ?>

                       <tr>
                          <td><?php echo $get['Saat']; ?>:00</td>
                          <td><?php echo $get['userName']; ?></td>
                          <td><?php echo $query['userName'];?></td>
                          <td><?php echo $qu['FirstName']; ?></td>
                          <td> <a href="index.php?s=OgrenciDuzenle&tc=<?php echo $get['userTC']; ?>" class="btn btn-warning">Düzenle</a></td>
                          <td><a href="index.php" class="btn btn-danger">İptal</a></td>
                      
                       </tr>
                            <?php



                          }
                    ?>
                   

                     

                       <form action="query/programOlustur.php" method="POST">
                    <tr>
                      <td><select class="custom-select"  name="Zaman" id="inputGroupSelect01">
                                <option selected value="0">Saat Seç...</option>
                                <option value="8">8:00</option>
                                <option value="9">9.00</option>
                                <option value="10">10.00</option>
                                <option value="11">11.00</option>
                                <option value="12">12.00</option>
                                <option value="3">13.00</option>
                                <option value="14">14.00</option>
                                <option value="15">15.00</option>
                                <option value="16">16.00</option>
                                <option value="17">17.00</option>
                                <option value="18">18.00</option>
                                <option value="19">19.00</option>
                                <option value="20">20.00</option>
   

                          </select></td>
                      <td>
                                    
                          <select class="custom-select" name="ogrenciTC" id="inputGroupSelect01">
                                <option selected value="0">Öğrenci Seç...</option>
                                
                                <?php 
                                  $query = $db->query("SELECT * FROM users where userTime >0 and status =0 order by userName asc", PDO::FETCH_ASSOC);
                                if ( $query->rowCount() ){
                                     foreach( $query as $row ){

                                          echo "<option value=".$row['userTC'].">".$row['userName']."</option>" ."<br>";
                                     }
                                  }

                                ?>
                          </select>
                      </td>
                      <td>
                        <select class="custom-select" name="ilaveTC" id="inputGroupSelect01">
                                <option selected value="-">Ek Öğrenci Seç...</option>
                                  <?php 
                                  $query = $db->query("SELECT * FROM users where userTime >0 and status = 0 order by userName asc", PDO::FETCH_ASSOC);
                                if ( $query->rowCount() ){
                                     foreach( $query as $row ){

                                          echo "<option value=".$row['userTC'].">".$row['userName']."</option>" ."<br>";
                                     }
                                  }

                                ?>
                          </select>
                          <input type="hidden" value="<?php echo @$_GET['tarih']; ?>" name="gecerlitarih">
                      </td>
                      <td>
                                    
                          <select class="custom-select" name="egitmen" id="inputGroupSelect01">
                                <option selected value="0">Eğitmen Seç...</option>
                                
                                <?php 
                                  $query = $db->query("SELECT * FROM egitmentab ", PDO::FETCH_ASSOC);
                                if ( $query->rowCount() ){
                                     foreach( $query as $row ){

                                          echo '<option value="'.$row['TC'].'">'.$row['FirstName'].'</option>';
                                     }
                                  }

                                ?>
                          </select>
                      </td>
                      <td><input type="submit" class="btn btn-success" value="Ekle"></td> 
                      <td><a href="index.php" class="btn btn-info">Vazgeç</a></td>
                      
                    </tr>
                  
                  
                  </tbody>
                </table>
              </div>
            </div>

                </form>
          </div>

        </div></div>