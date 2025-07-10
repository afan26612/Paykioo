
<?php
$admin_email = "afan26612@gmail.com"; // GANTI EMAIL ADMIN KAMU

$upload_dir = "bukti/";
if (!is_dir($upload_dir)) mkdir($upload_dir);

$email_user = $_POST['email'];
$kode = $_POST['kode'];
$file_tmp = $_FILES['bukti']['tmp_name'];
$file_name = basename($_FILES['bukti']['name']);
$saved_name = $upload_dir . time() . "_" . $file_name;

if (move_uploaded_file($file_tmp, $saved_name)) {
    $link_bukti = "http://yourdomain.com/" . $saved_name;
    $subject = "🧾 Bukti Transfer Masuk tunggu admin akan memberikan akses";
    $message = "Email: $email_user\nKode: $kode\nBukti: $link_bukti\n\nKlik untuk konfirmasi: http://yourdomain.com/index.html?konfirmasi=OK";
    $headers = "From: noreply@yourdomain.com";
    mail($admin_email, $subject, $message, $headers);
    echo "<script>window.location.href = 'index.html?upload=berhasil';</script>";
} else {
    echo "Upload gagal.";
}
?>
