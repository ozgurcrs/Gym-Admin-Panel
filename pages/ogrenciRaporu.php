
          <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Üye Vücut Ölçümleri</h1>
          <p class="mb-4">--> Bu sayfada   <span style="color:#1cc88a; font-weight: bold;">ölçüm bilgilerini,kişisel bilgilerini öğrenebilir ve ekleyebilirsiniz. </span> <br>
          <span style="color: red;">--->Öğrencilerin sıralaması alfabetik sıralanır.</span>
         </p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Aktif Öğrenci Tablosu</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Ad Soyad</th>
                      <th>TC No</th>
                      <th>Profil</th>
                      <th>Ekle</th>
                      
                      
                    </tr>
                  </thead>
                
                  <tbody>
                    <?php 
                      $query = $db->prepare("SELECT * FROM users order by userName asc");
                      $query->execute();
                        foreach ($query as $get) 
                        {
                            ?>
                       <tr>
                              <td><?php echo $get['userName']; ?></td>
                              <td><?php echo $get['userTC']; ?></td>
                              <td><a href="index.php?s=OgrenciProfil&tc=<?php echo $get['userTC']; ?>"><button class="btn btn-primary">Görüntüle</button></a></td>
                              <td><a href="index.php?s=OgrenciOlcum&tc=<?php echo $get['userTC']; ?>"><button class="btn btn-warning">Ölçüm Ekle</button></a></td>
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