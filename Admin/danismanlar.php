<?php require_once 'header.php';
require_once 'sidebar.php';
 ?>

  <div class="content-wrapper">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Danışmanlarımız</h3>

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

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <a href="danisman-ekle.php"><button style="float:right" type="submit"  class="btn btn-success">Danışman Ekle</button>
            </a>
              <thead>
                <tr>
                  <th>Resim</th>
                  <th>Ad</th>
                  <th>Telefon </th>
                  <th>Mail</th>
                  <th>Düzenle</th>
                  <th>Sil</th>
                </tr>
              </thead>
              <tbody>
<?php
$danisman=$baglan->prepare("SELECT * from danismanlar ");
$danisman->execute();

while ($danismangetir=$danisman->fetch(PDO::FETCH_ASSOC)) { ?>


                <tr>
                  <td><img style="width:230px" src="resimler/<?php echo $danismangetir['danisman_resim'] ?>"</td>
                  <td><?php echo $danismangetir['danisman_isim'] ?></td>
                  <td><?php echo $danismangetir['danisman_telefon'] ?></td>
                  <td><span class="tag tag-success"><?php echo $danismangetir['danisman_mail'] ?></span></td>
                  <td><a href="danisman-duzenle.php?id=<?php echo $danismangetir['danisman_id'] ?>"><button class="btn btn-info">Düzenle</button></a></td>
                    <td>
                     <form action="yukle.php" method="post">
                      <input type="hidden" name="danisman_id" value="<?php echo $danismangetir['danisman_id'] ?>">
                      <input type="hidden" name="danisman_resim" value="<?php echo $danismangetir['danisman_resim'] ?>">


                      <button  name="danismansil" class="btn btn-danger">Sil</button></td>

                    </form>
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
