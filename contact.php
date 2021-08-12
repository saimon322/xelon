<?php
if (isset ($_POST['aModalPhone'])) {
  $to = "contact@xelon.ch,sergii.kononenko@bitcat.agency,1921082@gmail.com";
  $from = "contact@xelon.ch";
  $subject = "HR application ".$_POST['aModalPhone'];
  $message = "User Name - ".$_POST['aFullname']."\nUser Phone Number - ".$_POST['aModalPhone']."\nUser Message - ".$_POST['aModalMsg']."\n\nUrl - ".$_SERVER['HTTP_REFERER'];

  $boundary = md5(date('r', time()));
  $filesize = '';
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "From: " . $from . "\r\n";
  $headers .= "Reply-To: " . $from . "\r\n";
  $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
  $message="
Content-Type: multipart/mixed; boundary=\"$boundary\"
 
--$boundary
Content-Type: text/plain; charset=\"utf-8\"
Content-Transfer-Encoding: 7bit
 
$message";
  if(is_uploaded_file($_FILES['fileCv']['tmp_name'])) {
    $attachment = chunk_split(base64_encode(file_get_contents($_FILES['fileCv']['tmp_name'])));
    $filename = $_FILES['fileCv']['name'];
    $filetype = $_FILES['fileCv']['type'];
    $filesize = $_FILES['fileCv']['size'];
    $message.="
 
--$boundary
Content-Type: \"$filetype\"; name=\"$filename\"
Content-Transfer-Encoding: base64
Content-Disposition: attachment; filename=\"$filename\"
 
$attachment";
  }
  $message.="
--$boundary--";

  if ($filesize < 10000000) { // проверка на общий размер всех файлов. Многие почтовые сервисы не принимают вложения больше 10 МБ
    mail($to, $subject, $message, $headers);
  }
}
?>
