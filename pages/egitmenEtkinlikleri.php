<?php
@$tarih = date("dmY",strtotime($_GET['tarih']));
?>

          <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Eğitmen Etkinlikleri</h1>
          
          </div>   
          <!-- DataTales Example <--</-->
            <form action="" method="POST">
            <span>Bu tarihten</span> 

             
                  <div class="form-group row">
                  
                           <div class="col-sm-4 mb-3 mb-sm-0">
                    
                              <input type="date" name="tarih" class="form-control form-control-user" id="exampleLastName"  >

                          </div>
                  </div>

                   <span>Bu tarihe kadar</span> 
                           <div class="form-group row">
                  
                           <div class="col-sm-4 mb-3 mb-sm-0">
                    
                              <input type="date" name="secondTarih" class="form-control form-control-user" id="exampleLastName"  >

                          </div>
                  </div>

                   <span>Bu eğitmen</span> 
                           <div class="form-group row">
                  
                           <div class="col-sm-4 mb-3 mb-sm-0">
                              
                                <select class="custom-select"  name="egitmen" id="inputGroupSelect01">
                                <option selected value="0">Eğitmen Seç</option>
                                  <?php
                                    $query = $db->prepare("SELECT * FROM egitmentab ORDER BY FirstName asc");
                                    $query->execute();

                                    foreach($query as $row)
                                    {
                                        echo '<option value="'.$row['TC'].'">'.$row['FirstName'].'</option>';
                                    }
                                   ?>
                                </select>
                        

                          </div>
                     </div>
                         
                          <div class="col-sm-3 mb-3 mb-sm-0">
                    
                              <input type="submit" class="btn btn-success" id="exampleLastName"  value="Getir" >
                          </div>     

             </form>
  
          <br>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Eğitmen Etkinliği</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Eğitmen Adı</th>
                      <th>Eğitim Tarihi</th>
                      <th>Öğrencinin Adı</th> 
                      <th>Ek Öğrencinin Adı</th>      
                    </tr>
                  </thead>
                
                  <tbody>
					

      <?php 
                GLOBAL $toplam;
                
				        if($_POST)
				        {
				          $tarih = $_POST['tarih'];
				          $secondTarih = $_POST['secondTarih'];
				          $egitmen = $_POST['egitmen'];
				          $query = $db->prepare("SELECT * FROM programlar WHERE Tarih BETWEEN '$tarih' AND '$secondTarih' and durum = 1 and egitmenTC = $egitmen");
				          $query->execute();
				          $q = $db->query("SELECT * FROM egitmentab WHERE TC = '{$egitmen}'")->fetch(PDO::FETCH_ASSOC);

								  
				      	 }
				      	 		 
								foreach ($query as $row)
								{
									 $qu = $db->query("SELECT * FROM users WHERE userTC = '{$row['uyeTC']}'")->fetch(PDO::FETCH_ASSOC);
									 $que = $db->query("SELECT * FROM users WHERE userTC = '{$row['ilaveTC']}'")->fetch(PDO::FETCH_ASSOC);
									echo ' <tr>
									  <td>'.$q['FirstName'].'</td>
									  <td>'.$row['Tarih'].'</td>
		                              <td>'.$qu['userName'].'</td>
		                              <td>'.$que['userName'].'</td>
		                                 </tr>';

                 $toplam += $row['Person'];
                 
								}
                            ?>


					<div class="alert alert-success" role="alert">
            
 					 Belirtilen tarihler arasında eğitim verilen saatlik ders toplamı: <?php if(empty($toplam)) 
           $toplam = 0; 

           echo $toplam; ?> saattir.
					</div>
                    

                  
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

               