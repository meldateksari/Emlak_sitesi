<?php
require_once 'baglan.php';
#veritabanı yükleme işlemleri

#ilk işlemimiz ayar Sayfası
if (isset($_POST['ayarkaydet'])) {

#isset değer var mı anladında boş gelip gelmediğini kontrol eder.
$baslik=$_POST['baslik'];
$aciklama=$_POST['aciklama'];
$key=$_POST['key'];
$tel=$_POST['tel'];
$mail=$_POST['mail'];
$instagram=$_POST['instagram'];
$facebook=$_POST['facebook'];
# gelen değerleri yakalama işlemleri tamam

#select listelemek demektir.
#insert yüklemek demektir.
#update güncellemek demektir.
#delete silme demektir

$yukle=$baglan->prepare("UPDATE ayarlar SET
#veritabanındaki değerleri buraya yazdık.
ayar_baslik=?,
ayar_aciklama=?,
ayar_key=?,
ayar_telefon=?,
ayar_email=?,
ayar_facebook=?,
ayar_instagram=?
#neye göre alacağımı beliriyoruz.
WHERE ayar_id=0");

$degistir=$yukle->execute(array(

$baslik,$aciklama,$key,$tel,$mail,$facebook,$instagram

));


if ($degistir) {
Header("Location:ayarlar.php?yukleme=ok");
}
else{
  Header("Location:ayarlar.php?yukleme=no");

}
}





if (isset($_POST['hakkimizdakaydet'])) {

$baslik=$_POST['baslik'];
$aciklama=$_POST['aciklama'];


$yukle=$baglan->prepare("UPDATE hakkimizda SET
hakkimizda_baslik=?,
hakkimizda_aciklama=?

WHERE hakkimizda_id=0");

$degistir=$yukle->execute(array(

$baslik,$aciklama

));


if ($degistir) {
Header("Location:hakkimizda.php?yukleme=ok");
}
else{
  Header("Location:hakkimizda.php?yukleme=no");

}
}



if (isset($_POST['logokaydet'])) {


$yukle="resimler/";
  @$resimad =$_FILES['resim'] ["tmp_name"];
  @$isim = $_FILES['resim'] ["name"];

  $sayi1=rand(20000,30000);
  $sayi2=rand(20000,30000);
  $sayilar=$sayi1.$sayi2;
  $resimyolu=$sayilar.$isim;
  @move_uploaded_file($resimad, "$yukle/$resimyolu");

  $yukle=$baglan->prepare("UPDATE ayarlar SET

    ayar_logo=?
    WHERE ayar_id=0");
    $degistir=$yukle->execute(array(
      $resimyolu

      ));
$sil=$_POST['eskiresim'];
unlink("resimler/$sil");
      if ($degistir) {
      Header("Location:ayarlar.php?yukleme=ok");
      }
      else{
        Header("Location:ayarlar.php?yukleme=no");

      }
}








if (isset($_POST['danismanekle'])) {
$ad=htmlspecialchars($_POST['isim']);
$gorev=htmlspecialchars($_POST['gorev']);
$telefon=htmlspecialchars($_POST['tel']);
$mail=htmlspecialchars($_POST['mail']);
$sifrem=htmlspecialchars($_POST['sifre']);
$sifre=md5($sifrem);

  $yukle="resimler/";
    @$resimad =$_FILES['resim'] ["tmp_name"];
    @$isim = $_FILES['resim'] ["name"];

    $sayi1=rand(20000,30000);
    $sayi2=rand(20000,30000);
    $sayilar=$sayi1.$sayi2;
    $resimyolu=$sayilar.$isim;
    @move_uploaded_file($resimad, "$yukle/$resimyolu");



    $yukle=$baglan->prepare("INSERT into danismanlar SET

danisman_isim=?,
danisman_gorev=?,
danisman_telefon=?,
danisman_mail=?,
danisman_sifre=?,
danisman_resim=? ");

$degistir=$yukle->execute(array(


$ad,$gorev,$telefon,$mail,$sifre,$resimyolu


));
if ($degistir) {
Header("Location:danismanlar.php?yukleme=ok");
}
else{
  Header("Location:danismanlar.php?yukleme=no");

}
}


if (isset($_POST['danismanduzenle'])) {
$ad=htmlspecialchars($_POST['isim']);
$gorev=htmlspecialchars($_POST['gorev']);
$telefon=htmlspecialchars($_POST['tel']);
$mail=htmlspecialchars($_POST['mail']);

$danismanid=$_POST['danismanid'];


if ($_FILES['resim'] ["size"]>0) {

  $yukle="resimler/";
    @$resimad =$_FILES['resim'] ["tmp_name"];
    @$isim = $_FILES['resim'] ["name"];

    $sayi1=rand(20000,30000);
    $sayi2=rand(20000,30000);
    $sayilar=$sayi1.$sayi2;
    $resimyolu=$sayilar.$isim;
    @move_uploaded_file($resimad, "$yukle/$resimyolu");



    $yukle=$baglan->prepare("UPDATE danismanlar SET

danisman_isim=?,
danisman_gorev=?,
danisman_telefon=?,
danisman_mail=?,
danisman_resim=?

WHERE danisman_id=$danismanid
 ");

$degistir=$yukle->execute(array(


$ad,$gorev,$telefon,$mail,$resimyolu

));
if ($degistir) {
Header("Location:danismanlar.php?yukleme=ok");
}
else{
  Header("Location:danismanlar.php?yukleme=no");

}
}

else{

      $yukle=$baglan->prepare("UPDATE danismanlar SET

  danisman_isim=?,
  danisman_gorev=?,
  danisman_telefon=?,
  danisman_mail=?

  WHERE danisman_id=$danismanid
   ");

  $degistir=$yukle->execute(array(


  $ad,$gorev,$telefon,$mail

  ));
  if ($degistir) {
  Header("Location:danismanlar.php?yukleme=ok");
  }
  else{
    Header("Location:danismanlar.php?yukleme=no");

  }
}



}





if (isset($_POST['danismansil'])) {
$id=$_POST['danisman_id'];
$resim=$_POST['danisman_resim'];
$yukle=$baglan->prepare("DELETE from  danismanlar

WHERE danisman_id=? ");

$degistir=$yukle->execute(array($id));
$sil=$_POST['danisman_resim'];
unlink("resimler/$sil");
if ($degistir) {
Header("Location:danismanlar.php?yukleme=ok");
}
else{
  Header("Location:danismanlar.php?yukleme=no");

}

}



if (isset($_POST['kategoriekle'])) {
$baslik=htmlspecialchars($_POST['baslik']);
$sira=htmlspecialchars($_POST['sira']);

$yukle=$baglan->prepare("INSERT into kategori SET

kategori_baslik=?,
kategori_sira=?
 ");

$degistir=$yukle->execute(array(


$baslik,$sira


));
if ($degistir) {
Header("Location:kategori.php?yukleme=ok");
}
else{
  Header("Location:kategori.php?yukleme=no");

}
}





if (isset($_POST['kategoriduzenle'])) {
  $baslik=htmlspecialchars($_POST['baslik']);
  $sira=htmlspecialchars($_POST['sira']);
  $danismanid=htmlspecialchars($_POST['kategoriid']);

      $yukle=$baglan->prepare("UPDATE kategori SET

        kategori_baslik=?,
        kategori_sira=?

  WHERE kategori_id=$danismanid
   ");

  $degistir=$yukle->execute(array(


  $baslik,$sira

  ));
  if ($degistir) {
  Header("Location:kategori.php?yukleme=ok");
  }
  else{
    Header("Location:kategori.php?yukleme=no");

  }
}




if (isset($_POST['kategorisil'])) {
$id=$_POST['kategori_id'];
$yukle=$baglan->prepare("DELETE from  kategori

WHERE kategori_id=? ");

$degistir=$yukle->execute(array($id));

if ($degistir) {
Header("Location:kategori.php?yukleme=ok");
}
else{
  Header("Location:kategori.php?yukleme=no");

}

}







if (isset($_POST['altkategoriekle'])) {
$baslik=htmlspecialchars($_POST['baslik']);
$sira=htmlspecialchars($_POST['sira']);
$katid=$_POST['katid'];

$yukle=$baglan->prepare("INSERT into altkategori SET

alt_baslik=?,
alt_sira=?,
kategori_id=?
 ");

$degistir=$yukle->execute(array(


$baslik,$sira,$katid


));
if ($degistir) {
Header("Location:altkategori.php?yukleme=ok&id=$katid");
}
else{
  Header("Location:altkategori.php?yukleme=no&id=$katid");

}
}



if (isset($_POST['altkategoriduzenle'])) {
  $baslik=htmlspecialchars($_POST['baslik']);
  $sira=htmlspecialchars($_POST['sira']);
  $kategoriid=htmlspecialchars($_POST['kategoriid']);
  $id=htmlspecialchars($_POST['id']);
      $yukle=$baglan->prepare("UPDATE altkategori SET

        alt_baslik=?,
        alt_sira=?,
        kategori_id=?

  WHERE altkat_id=$id
   ");

  $degistir=$yukle->execute(array(


  $baslik,$sira,$kategoriid

  ));
  if ($degistir) {
  Header("Location:altkategori.php?yukleme=ok&id=$kategoriid");
  }
  else{
    Header("Location:altkategori.php?yukleme=no&id=$kategoriid");

  }
}



if (isset($_POST['altkategorisil'])) {
$id=$_POST['altkatid'];
$kategoriid=$_POST['katid'];
$yukle=$baglan->prepare("DELETE from  altkategori

WHERE altkat_id=? ");

$degistir=$yukle->execute(array($id));
if ($degistir) {
Header("Location:altkategori.php?yukleme=ok&id=$kategoriid");
}
else{
  Header("Location:altkategori.php?yukleme=no&id=$kategoriid");

}

}







#ilanları eklemeye başlıyoruz.

if (isset($_POST['ilanekle'])) {

$id=htmlspecialchars($_POST['id']);
$katid=htmlspecialchars($_POST['katid']);

$danisman_id = htmlspecialchars($_POST['danisman_id']);

$baslik=htmlspecialchars($_POST['baslik']);

$aciklama=$_POST['aciklama'];

$sira=htmlspecialchars($_POST['sira']);

$anahtarkelime=htmlspecialchars($_POST['anahtarkelime']);

$metre=htmlspecialchars($_POST['metre']);

$oda=htmlspecialchars($_POST['oda']);

$binayas=htmlspecialchars($_POST['binayas']);

$bkat=htmlspecialchars($_POST['bkat']);

$isitma=htmlspecialchars($_POST['isitma']);

$takas=htmlspecialchars($_POST['takas']);

$aidat=htmlspecialchars($_POST['aidat']);

$adres=htmlspecialchars($_POST['adres']);

$fiyat=htmlspecialchars($_POST['fiyat']);





  $yukle="resimler/ilanlar/";
    @$resimad =$_FILES['resim'] ["tmp_name"];
    @$isim = $_FILES['resim'] ["name"];

    $sayi1=rand(20000,30000);
    $sayi2=rand(20000,30000);
    $sayilar=$sayi1.$sayi2;
    $resimyolu=$sayilar.$isim;
    @move_uploaded_file($resimad, "$yukle/$resimyolu");



  $yukle=$baglan->prepare("INSERT into ilanlar SET

altkategori_id=?,
kategori_id=?,
danisman_id=?,
ilan_baslik=?,
ilan_aciklama=?,
ilan_sira=?,
ilan_anahtarkelime=?,
ilan_metrekare=?,
ilan_odasayisi=?,
ilan_binayas=?,
ilan_bkat=?,
ilan_isitma=?,
ilan_takas=?,
ilan_aidat=?,
ilan_adres=?,
ilan_fiyat=?,
ilan_resim=?
 ");
$degistir=$yukle->execute(array(
$id,$katid,$danisman_id,$baslik,$aciklama,$sira,$anahtarkelime,$metre,$oda,$binayas,$bkat,$isitma,$takas,$aidat,$adres,$fiyat,$resimyolu

));
if ($degistir) {
Header("Location:ilanlar.php?yukleme=ok&id=$id&katid=$katid");
}
else{
  Header("Location:ilanlar.php?yukleme=no&id=$id&katid=$katid");

}
}







if (isset($_POST['ilanduzenle'])) {

  $id=htmlspecialchars($_POST['id']);
  $katid=htmlspecialchars($_POST['katid']);

  $danisman_id = htmlspecialchars($_POST['danisman_id']);

  $altkatid=$_POST['altkatid'];

  $baslik=htmlspecialchars($_POST['baslik']);

  $aciklama=$_POST['aciklama'];

  $sira=htmlspecialchars($_POST['sira']);

  $anahtarkelime=htmlspecialchars($_POST['anahtarkelime']);

  $metre=htmlspecialchars($_POST['metre']);

  $oda=htmlspecialchars($_POST['oda']);

  $binayas=htmlspecialchars($_POST['binayas']);

  $bkat=htmlspecialchars($_POST['bkat']);

  $isitma=htmlspecialchars($_POST['isitma']);

  $takas=htmlspecialchars($_POST['takas']);

  $aidat=htmlspecialchars($_POST['aidat']);

  $adres=htmlspecialchars($_POST['adres']);

  $fiyat=htmlspecialchars($_POST['fiyat']);


if ($_FILES['resim'] ["size"]>0) {

  $yukle="resimler/ilanlar/";
    @$resimad =$_FILES['resim'] ["tmp_name"];
    @$isim = $_FILES['resim'] ["name"];

    $sayi1=rand(20000,30000);
    $sayi2=rand(20000,30000);
    $sayilar=$sayi1.$sayi2;
    $resimyolu=$sayilar.$isim;
    @move_uploaded_file($resimad, "$yukle/$resimyolu");



    $yukle=$baglan->prepare("UPDATE ilanlar SET

      altkategori_id=?,
      kategori_id=?,
      danisman_id=?,
      ilan_baslik=?,
      ilan_aciklama=?,
      ilan_sira=?,
      ilan_anahtarkelime=?,
      ilan_metrekare=?,
      ilan_odasayisi=?,
      ilan_binayas=?,
      ilan_bkat=?,
      ilan_isitma=?,
      ilan_takas=?,
      ilan_aidat=?,
      ilan_adres=?,
      ilan_fiyat=?,
      ilan_resim=?

WHERE ilan_id=$id
 ");

$degistir=$yukle->execute(array(


  $altkatid,$katid,$danisman_id,$baslik,$aciklama,$sira,$anahtarkelime,$metre,$oda,$binayas,$bkat,$isitma,$takas,$aidat,$adres,$fiyat,$resimyolu


));
$sil=$_POST['eskiresim'];
unlink("resimler/ilanlar/$sil");
if ($degistir) {
Header("Location:ilanlar.php?yukleme=ok&id=$altkatid&katid=$katid");
}
else{
  Header("Location:ilanlar.php?yukleme=no&id=$altkatid&katid=$katid");

}
}

else{

      $yukle=$baglan->prepare("UPDATE ilanlar SET

        altkategori_id=?,
        kategori_id=?,
        danisman_id=?,
        ilan_baslik=?,
        ilan_aciklama=?,
        ilan_sira=?,
        ilan_anahtarkelime=?,
        ilan_metrekare=?,
        ilan_odasayisi=?,
        ilan_binayas=?,
        ilan_bkat=?,
        ilan_isitma=?,
        ilan_takas=?,
        ilan_aidat=?,
        ilan_adres=?,
        ilan_fiyat=?

  WHERE ilan_id=$id
   ");

  $degistir=$yukle->execute(array(


    $altkatid,$katid,$danisman_id,$baslik,$aciklama,$sira,$anahtarkelime,$metre,$oda,$binayas,$bkat,$isitma,$takas,$aidat,$adres,$fiyat

  ));
  if ($degistir) {
  Header("Location:ilanlar.php?yukleme=ok&id=$altkatid&katid=$katid");
  }
  else{
    Header("Location:ilanlar.php?yukleme=no&id=$altkatid&katid=$katid");

  }
}



}




if (isset($_POST['ilansil'])) {
$id=$_POST['id'];
$altkatid=$_POST['altkatid'];
$kategoriid=$_POST['kategori_id'];

$yukle=$baglan->prepare("DELETE from  ilanlar

WHERE ilan_id=? ");

$degistir=$yukle->execute(array($id));
$sil=$_POST['eskiresim'];
unlink("resimler/ilanlar/$sil");
if ($degistir) {
Header("Location:ilanlar.php?yukleme=ok&id=$altkatid&katid=$kategoriid");
}
else{
  Header("Location:ilanlar.php?yukleme=no&id=$altkatid&katid=$kategoriid");

}

}






if (isset($_POST['cokluresimsil'])) {
$id=$_POST['id'];
$ilan_id=$_POST['ilan_id'];
$resim=$_POST['eskiresim'];
$yukle=$baglan->prepare("DELETE from  cokluresim

WHERE cokluresim_id=? ");

$degistir=$yukle->execute(array($id));

unlink("resimler/cokluresim/$resim");
if ($degistir) {
Header("Location:cokluresim.php?yukleme=ok&id=$ilan_id");
}
else{
  Header("Location:cokluresim.php?yukleme=no&id=$ilan_id");

}

}


 ?>
