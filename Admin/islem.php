<?php
require_once 'baglan.php'; //vt baglantısı
session_start(); //yenı bir oturum baslatır



if (isset($_POST['girisyap'])) {
// Eğer formdan 'girisyap' adlı bir POST isteği gönderildiyse, aşağıdaki kod bloğu çalışır.
$mail=htmlspecialchars($_POST['mail']);
$sifre=htmlspecialchars($_POST['sifre']);
$md5sifre=md5($sifre);//hashleme 

    // Eğer hem e-posta hem de hash'lenmiş şifre mevcutsa, aşağıdaki kod bloğu çalışır.
if ($mail && $md5sifre) {
   // Veritabanında 'danismanlar' tablosunda, gönderilen e-posta ve şifre ile eşleşen kayıtları seçmek için hazırlanan SQL sorgusu.
$danismansor=$baglan->prepare("SELECT * from danismanlar where danisman_mail=? and danisman_sifre=? ");
$danismansor->execute(array( // Hazırlanan SQL sorgusunu, e-posta ve hash'lenmiş şifre ile çalıştırır.

$mail,$md5sifre

));

$say=$danismansor->rowCount(); // Sorgu sonucu dönen kayıt sayısını alır.


if ($say > 0) {//kayıt varsa
  $_SESSION['danisman']=$mail;
  Header("Location:index.php"); //index.ph sayfasına don
}
else{
  Header("Location:giris.php?durum=no"); //yoksa aynı sayfada kal urlye no yaz.
}
}


}

 ?>
