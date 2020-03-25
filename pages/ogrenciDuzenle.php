<?php 
    $tc = $_GET['tc'];

    $query = $db->query("SELECT * FROM users WHERE userTC = '{$tc}'")->fetch(PDO::FETCH_ASSOC);

    if($query['userGender'] == 1)
      $gender = "Erkek";
    else if($query['userGender'] == 2)
      $gender = "Kadın";
    else 
      $gender = "Diğer";



      if(@$_GET['status'] == 1)
      {
        echo '<div class="alert alert-primary" role="alert">
  Başarıyla güncellendi. <a href="index.php" class="alert-link">Bu sayfadan çıkış yapabilirsiniz.</a>
</div>';
      }

      if(@$_GET['status'] == 2)
      {
        echo '<div class="alert alert-danger" role="alert">
  HATA! Başarısız oldum. Tekrar deneyebilirsin ya da<a href="index.php" class="alert-link"> Bu sayfadan çıkış yapabilirsiniz.</a>
</div>';
      }
?>
<form action="query/uyeDuzenle.php" method="POST">

      <h1 class="h3 mb-2 text-gray-800">Üye Düzenle</h1>
                <p class="mb-4">--> Unutma süresini uzatmak istediğin bir üyenin süresinin üstüne seçtiğin eklenir. <br>
                --> Örneğin, 3 Saati olan bir öğrencinin ders süresini uzatmak istiyorsan 8 seçtiğini düşünerek kaydettiğinde 11 saat dersi olacaktır.</p>

                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" disabled class="form-control form-control-user" id="exampleFirstName" value="<?php echo $query['userName']; ?>">
                        </div>
                      
                      </div>

                       <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                         <input type="email" class="form-control form-control-user" disabled value="<?php echo $query['userEmail']; ?>" id="exampleInputEmail" placeholder="Email Adresi">	
                        </div>
                        <div class="col-sm-6">
                          <input type="custom-select"  class="form-control form-control-user" name="userPhone" id="exampleLastName" value="<?php echo $query['userPhone']; ?>">
                        </div>
                      </div>

                      
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                         <select class="custom-select" disabled id="inputGroupSelect01">
      						    <option selected><?php echo $gender ?></option>
      						    <option value="1">Erkek</option>
      						    <option value="2">Kadın</option>
      						    <option value="3">Diğer</option>
      						  </select>
                        </div>
                        <div class="col-sm-6">
                      <select class="custom-select" name="userTime" id="inputGroupSelect01">
      						    <option value="1"><?php echo $query['userTime']; ?> saat ders hakkı var. Değiştir...</option>
      						    <option value="8">8</option>
      						    <option value="10">11</option>
      						    <option value="12">12</option>
                      <option value="0">Ders Saatini Sıfırla</option>

                     

      						  </select>

                    <input type="hidden" value="<?php echo $tc ?>" name="userTC">
                        </div>


                      </div>

                      </div>
                     <div class="col-sm-2 mb-3 mb-sm-0 ml-auto mr-3">
                        <input type="submit" value="Kaydet" class="btn btn-primary">
                         <a href="index.php" class="btn btn-danger">İptal</a>
                      </div>
                      <hr>
 </form> 