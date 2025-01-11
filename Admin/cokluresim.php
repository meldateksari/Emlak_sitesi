<?php require_once 'header.php';
require_once 'sidebar.php';
 ?>

  <div class="content-wrapper">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Çoklu Resim</h3>

          </div>
          <?php if (@$_GET['yukleme']=="ok"){ ?>


                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Yükleme Başarılı!</strong> Değişiklikler başarılı bir şekilde kaydedildi.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <?php } elseif(@$_GET['yukleme']=="no"){  ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Yükleme Başarısız!</strong> Değişiklikler kaydedilirken bir hata oluştu.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>


          <?php } ?>


          <div class="card-body table-responsive p-0">
            <form  id="my-awesome-dropzone" class="dropzone" action="cokluresimyukle"  enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

            </form>
            <table class="table table-hover text-nowrap">

              <thead>
                <tr>
                  <th>İlan Resim</th>
                  <th>Sil</th>
                </tr>
              </thead>
              <tbody>
<?php
$cokluresim=$baglan->prepare("SELECT * from cokluresim where ilan_id=?");
$cokluresim->execute(array($_GET['id']));

while ($cokluresimgetir=$cokluresim->fetch(PDO::FETCH_ASSOC)) { ?>


                <tr>
                  <td><img style="width:300px" src="resimler/cokluresim/<?php echo $cokluresimgetir['resim'] ?>"></td>
              <td>
                     <form action="yukle.php" method="post">
                      <input type="hidden" name="eskiresim" value="<?php echo $cokluresimgetir['resim'] ?>">
                      <input type="hidden" name="id" value="<?php echo $cokluresimgetir['cokluresim_id'] ?>">
                        <input type="hidden" name="ilan_id" value="<?php echo $cokluresimgetir['ilan_id'] ?>">


                      <button  name="cokluresimsil" class="btn btn-danger">Sil</button></td>

                    </form>
                  </td>
                </tr>

<?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- Main content -->
    <section class="content">



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>
