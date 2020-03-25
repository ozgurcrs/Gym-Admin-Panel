
          <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Aktif Öğrenci Takibi</h1>
          <p class="mb-4">--> Bu sayfada   <span style="color:#1cc88a; font-weight: bold;">üyeliği devam eden </span> öğrencileri görebilirsiniz.<br>
          <span style="color: red;">--->Öğrencilerin sıralaması bitiş tarihi yakından uzağa doğru sıralanır.</span>
         </p>
          </div>   
          <!-- DataTales Example <--</-->

            
          
               
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Aktif Öğrenci Tablosu</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Ad Soyad</th>
                      <th>TC No</th>
                      <th>Kayıt Tarihi</th> 
                      <th>Düzenle</th>
                      <th>Profil</th> 

                        
                    </tr>
                  </thead>
                
                  <tbody>
                      <?php 
                      $query = $db->prepare("SELECT * FROM users where userTime >0 && status =0  order by userName asc");
                      $query->execute();
                        foreach ($query as $get) 
                        {
                            ?>
                       <tr>
                              <td><?php echo $get['ID']; ?></td>
                              <td><?php echo $get['userName']; ?></td>
                              <td><?php echo $get['userTC']; ?></td>
                              <td><?php echo $get['userDate']; ?></td>
                              <td><a href="index.php?s=OgrenciDuzenle&tc=<?php echo $get['userTC']; ?>"><input type="button" class="btn btn-info" value="Düzenle"></a></td>
                              <td><a href="index.php?s=OgrenciProfil&tc=<?php echo $get['userTC']; ?>"><input type="button" class="btn btn-primary" value="Profil"></a></td>
                      </tr>

                            <?php
                        }
                       ?>
                   

                    

                  
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div></div>