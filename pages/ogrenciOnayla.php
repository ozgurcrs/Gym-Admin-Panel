<?php 




?>
          <div class="container-fluid">
          <?php

            $s = @$_GET['status'];
            if($s == 13)
            {
              echo '
          <div class="alert alert-success" role="alert">
            Program başarıyla silindi.
          </div>';
            }
            if($s == 35)
            {
              echo '
          <div class="alert alert-success" role="alert">
            Program başarıyla onaylandı.
          </div>';
            }

            if($s == 1)
            {
              echo '
          <div class="alert alert-danger" role="alert">
            Ups bir şeyler ters gitti. Bakılması gerekiyor.
          </div>';
            }

           ?>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Öğrenci Antreman Takibi</h1>
          <p class="mb-4">--> Eğer öğrenci belirtilen tarihte derse katılmışsa <span style="color:#1cc88a; font-weight: bold;"> onay </span>veriniz.<br>
          <span style="color: red;">--->Onay verilmemiş öğrencilerin ders saatlerinden düşüş yaşanmaz.</span>
         </p>
          </div>   
          <!-- DataTales Example <--</-->

            
          
               
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Öğrenci Onay Tablosu</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Saat</th>
                      <th>Öğrenci Ad Soyad</th>
                      <th>Ek Öğrenci Ad Soyad</th>
                      <th>Tarih</th> 
                      <th>Tekil</th>
                      <th>Çoğul</th> 
                      <th>İptal</th> 
                      
                    </tr>
                  </thead>
                
                  <tbody>
                   
                      <?php 

                        $query = $db->prepare("SELECT * FROM programlar INNER JOIN users on programlar.uyeTC = users.userTC WHERE durum  = 0");
                        $query->execute();


                          if($query->rowCount())
                          {
                            foreach ($query as $row) 
                            {



                               $ilave = $row['ilaveTC'];
                              $q = $db->query("SELECT * FROM users WHERE userTC = '{$ilave}'")->fetch(PDO::FETCH_ASSOC);
                             echo '
                               <tr>
                              <td>'.$row['Saat'].':00</td>
                              <td>'.$row['userName'].'</td>
                              <td>'.$q['userName'].'</td>
                              <td>'.$row['Tarih'].'</td>
                              <form action="query/ogrenciTimer.php" method="POST" name="Tek">
                                <td><input type="submit" class="btn btn-success" value="Tek Katıldı."/></td>
                                <input type="hidden" name="tc" value="'.$row['userTC'].'">
                                <input type="hidden" name="time" value="'.$row['userTime'].'">
                                <input type="hidden" name="id" value="'.$row['ID_P'].'">
                                <input type="hidden" name="tek" value="Tek">
                              </form>
                              <form action="query/ogrenciTimer.php" method="POST" name="Cift">
                                <td><input type="submit" class="btn btn-info" value="Çift Katıldı" /></td>
                                 <input type="hidden" name="tc" value="'.$row['userTC'].'">
                                 <input type="hidden" name="ilaveTC" value="'.$ilave.'">
                                 <input type="hidden" name="time" value="'.$row['userTime'].'">
                                 <input type="hidden" name="ilaveTime" value="'.$q['userTime'].'">
                                <input type="hidden" name="id" value="'.$row['ID_P'].'">
                                 <input type="hidden" name="cift" value="Cift">
                              </form>
                              
                              <td><a  href="query/iptal.php?id='.$row['ID_P'].'" class="btn btn-danger">İptal</a></td>
                            </tr>';
                            }
                          }

                      ?>


                    


                  
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div></div>