<?php 
    $tc = $_GET['tc'];

    $query = $db->query("SELECT * FROM usersolcum WHERE userTC = '{$tc}'")->fetch(PDO::FETCH_ASSOC);
    
    ?>


<h1 class="h3 mb-2 text-gray-800">Öğrenci Ölçüm Ekle</h1>
          <p class="mb-4">-->Unutma her ölçümü yapmak zorundasın tekrar düzenleme şansın olmayacak.</p>

 <form class="user" method="POST" action="query/ogrenciOlcum.php">
                <div class="form-group row">
                  <div class="col-sm-3 mb-3 mb-sm-0">
                    <input type="custom-select" class="form-control form-control-user" name="kilo" id="exampleFirstName" placeholder="Kilo">
                  </div>
                  <div class="col-sm-3">
                    <input type="custom-select" class="form-control form-control-user" name="yag" id="exampleLastName" placeholder="Yağ">
                  </div>

                  <div class="col-sm-3">
                    <input type="custom-select" class="form-control form-control-user" name="su" id="exampleLastName" placeholder="Su">
                  </div>
                  <div class="col-sm-3">
                    <input type="custom-select" class="form-control form-control-user" name="kas" id="exampleLastName" placeholder="Kas">
                  </div>
                </div>

                 <div class="form-group row">
                  <div class="col-sm-3 mb-3 mb-sm-0">
                   <input type="custom-select" class="form-control form-control-user" name="kemik" id="exampleLastName" placeholder="Kemik">	
                  </div>
                  <div class="col-sm-3">
                    <input type="custom-select" class="form-control form-control-user" name="kcal" id="exampleLastName" placeholder="Kcal">
                  </div>

                  <div class="col-sm-3">
                    <input type="custom-select" class="form-control form-control-user" name="omuz" id="exampleLastName" placeholder="Omuz">
                  </div>

                  <div class="col-sm-3">
                    <input type="custom-select" class="form-control form-control-user" name="gogus" id="exampleLastName" placeholder="Gögüs">
                  </div>
                </div>


                <div class="form-group row">
                	
                	 <div class="col-sm-3 mb-3 sm-0">
						
                       <input type="custom-select" class="form-control form-control-user" name="sagkol" id="exampleLastName" placeholder="Sağ Kol">
                  </div>

                  <div class="col-sm-3">
                    <input type="custom-select" class="form-control form-control-user" name="solkol" id="exampleLastName" placeholder="Sol Kol">
                  </div>

                  <div class="col-sm-3">
                    <input type="custom-select" class="form-control form-control-user" name="bel" id="exampleLastName" placeholder="Bel">
                  </div>

                  <div class="col-sm-3">
                    <input type="custom-select" class="form-control form-control-user" name="karin" id="exampleLastName" placeholder="Karın">
                  </div>
                </div>

                <div class="form-group row">
                  
                   <div class="col-sm-3 mb-3 sm-0">
            
                       <input type="custom-select" class="form-control form-control-user" name="basen" id="exampleLastName" placeholder="Basen">
                  </div>

                  <div class="col-sm-3">
                    <input type="custom-select" class="form-control form-control-user" name="icbacak" id="exampleLastName" placeholder="İç Bacak">
                  </div>

                  <div class="col-sm-3">
                    <input type="custom-select" class="form-control form-control-user" name="sagbacak" id="exampleLastName" placeholder="Sağ Bacak">
                  </div>

                  <div class="col-sm-3">
                    <input type="custom-select" class="form-control form-control-user" name="solbacak" id="exampleLastName" placeholder="Sol Bacak">
                  </div>
                </div>
             
                </div>
                <div class="col-sm-2 mb-3 mb-sm-0 ml-auto mr-3">
                  <input type="hidden" value="<?php echo $_GET['tc']; ?>" name="tc">
                   <input type="submit" class="btn btn-primary" value="Kaydet">
                   <a href="index.php" class="btn btn-warning">İptal</a>
                </div>
              
                <hr>
              
</form> 