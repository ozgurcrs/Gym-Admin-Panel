<h1 class="h3 mb-2 text-gray-800">Üye Kayıt</h1>
          <p class="mb-4">-->Unutma daha önce kayıtlı bir üye tekrardan kayıt olamaz.</p>
        


          <?php 
            $status = @$_GET['status'];

            if($status == 4)
              {
                echo '<div class="alert alert-danger" role="alert">
                  Bazı önemli yerleri girmediniz. Boş bırakmayınız.
                </div>';
              }

              if($status ==3)
              {
                echo '<div class="alert alert-danger" role="alert">
                  Tc ve telefon numarası sayılardan oluşmalıdır
                </div>';
              }


               if($status == 2)
              {
                echo '<div class="alert alert-danger" role="alert">
                  Aynı TC kimlik numarasına ait bir kayıt var. Dikkatli ol aynı kişiyi kayıt etmek hatalara sebep olabilir. <br>
                  Bu yüzden lütfen o TC kimlik numarasının kayıtlı olduğu kişiyi aktif et.
                </div>';
              }

          ?>
 <form class="user" method="POST" action="query/uyeKayit.php">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="name" id="exampleFirstName" placeholder="Ad Soyad">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="TC" id="exampleLastName" placeholder="TC No">
                  </div>
                </div>

                 <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                   <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" placeholder="Email Adresi">	
                  </div>
                  <div class="col-sm-6">
                    <input type="custom-select" class="form-control form-control-user" name="phone" id="exampleLastName" placeholder="Telefon No">
                  </div>
                </div>


                <div class="form-group row">
                	
                	 <div class="col-sm-12">
						
                      <input type="date" name="birth" class="form-control form-control-user" id="exampleLastName" placeholder="Doğum Tarihi" >
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                   <select class="custom-select" name="gender" id="inputGroupSelect01">
						    <option selected>Cinsiyet...</option>
						    <option value="1">Erkek</option>
						    <option value="2">Kadın</option>
						    <option value="3">Diğer</option>
						  </select>
                  </div>
                  <div class="col-sm-6">
                    <select class="custom-select"  name="time" id="inputGroupSelect01">
						    <option selected>Saat...</option>
						    <option value="1">1 Saat</option>
						    <option value="2">2 Saat</option>
						    <option value="3">3 Saat</option>
						    <option value="4">4 Saat</option>
						    <option value="5">5 Saat</option>
						    <option value="6">6 Saat</option>
						    <option value="7">7 Saat</option>
						    <option value="8">8 Saat</option>
						    <option value="9">9 Saat</option>
						    <option value="10">10 Saat</option>
						    <option value="10">11 Saat</option>
						    <option value="12">12 Saat</option>
						  </select>
                  </div>


                </div>


                <div class="form-group row">
                	<div class="col-sm-6 mb-3 mb-sm-0">
                		
						      <input type="checkbox" name="control" aria-label="Checkbox for following text input">
						  
						
							<span>Öğrenci derse kayıtla aynı tarihte başlayacaksa işaretleyiniz.</span>
						</div>
                	</div>
                </div>
                <div class="col-sm-2 mb-3 mb-sm-0 ml-auto mr-3">
                   <input type="submit" class="btn btn-primary" value="Kaydet">
                   <a href="index.php" class="btn btn-danger">İptal</a>
                </div>
              
                <hr>
              
</form> 