<?php require_once 'header.php';
require_once 'sidebar.php';
 ?>

  <div class="content-wrapper">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Kategori</h3>

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
              <a href="kategori-ekle.php"><button style="float:right" type="submit"  class="btn btn-success">Kategori Ekle</button>
            </a>
              <thead>
                <tr>
                  <th>Kategori Ad</th>
                  <th>Kategori Sıra </th>
                  <th>Alt Kategoriler </th>
                  <th>Düzenle</th>
                  <th>Sil</th>
                </tr>
              </thead>
              <tbody>
<?php
$kategori=$baglan->prepare("SELECT * from kategori ");
$kategori->execute();

while ($kategorigetir=$kategori->fetch(PDO::FETCH_ASSOC)) { ?>


                <tr>
                  <td><?php echo $kategorigetir['kategori_baslik'] ?></td>
                  <td><?php echo $kategorigetir['kategori_sira'] ?></td>
                  <td><a href="altkategori.php?id=<?php echo $kategorigetir['kategori_id'] ?>"><button class="btn btn-success">Alt Kategori</button></a></td>
                  <td><a href="kategori-duzenle.php?id=<?php echo $kategorigetir['kategori_id'] ?>"><button class="btn btn-info">Düzenle</button></a></td>
                    <td>
                     <form action="yukle.php" method="post">
                      <input type="hidden" name="kategori_id" value="<?php echo $kategorigetir['kategori_id'] ?>">


                      <button  name="kategorisil" class="btn btn-danger">Sil</button></td>

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
