<h1 class="h3 mb-2 text-gray-800">Eğitmen Kayıt</h1>
          <p class="mb-4">-->Bir eğitmen kayit ederken ona bir program oluşturmayi unutma <br>
            ------> Bir eğitmeni yalnızca bir kez kayıt edebileceğini unutma.2.kez kayıt edersen veriler karışabilir.
          </p> 

          <?php 
            $status = @$_GET['status'];

            if($status == 4)
              {
                echo '<div class="alert alert-danger" role="alert">
                  Bazı önemli yerleri girmediniz. Boş bırakmayınız.
                </div>';
              }

              if($status == 3)
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

 <form class="user" method="POST" action="query/egitmenKayit.php">
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
                 
                  </div>
                </div>


                </div>
                <div class="col-sm-2 mb-3 mb-sm-0 ml-auto mr-3">
                   <input type="submit" class="btn btn-primary" value="Kaydet">
                   <a href="index.php" class="btn btn-danger">İptal</a>
                </div>
              
                <hr>
              
</form> 