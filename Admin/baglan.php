<?php

$user="root";
$pass="";
try {
        // MySQL veritabanına PDO ile bağlantı kuruyor
    $baglan = new PDO('mysql:host=localhost;dbname=emlak', $user, $pass);
    // echo "bağlantı başarılı"; // Bağlantı başarılı olduğunda mesaj göstermek için kullanılabilir

} catch (PDOException $e) {
        // Bağlantı hatası durumunda hata mesajını ekrana yazdırır ve scripti durdurur.
    print "Hata!: " . $e->getMessage() . "<br/>";
    die();
}
?>
