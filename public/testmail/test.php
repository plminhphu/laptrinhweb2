<?php
include("class.phpmailer.php");
include("class.smtp.php");
$mail = new PHPMailer();
$body = '<strong>Xác nhận phản hồi</strong><br />';
$body .= '<strong>Họ tên: </strong>' . @$_POST['name'] . ' <br />';
$body .= '<strong>Email: </strong>' . @$_POST['mail'] . ' <br />';
$body .= '<strong>Tiêu đề: </strong>' . @$_POST['title'] . ' <br />';
$body .= '<strong>Nội dung: </strong>' . @$_POST['content'] . ' <br />';
$body = @eregi_replace("[\]", '', $body);
$mail->IsSMTP();
$mail->SMTPAuth = true; 
$mail->SMTPSecure = "ssl"; 
$mail->Host = "smtp.gmail.com";  
$mail->Port = 465;  
$mail->Username = "plmp.mptech@gmail.com";
$mail->Password = "plmp@292905"; 
$mail->From = "plmp.mptech@gmail.com";
$mail->FromName = "Xac Nhan Thong Tin";
$mail->Subject = "Xac Nhan Thong Tin";
$mail->AltBody = "Xac Nhan Thong Tin";
$mail->WordWrap = 50;
$mail->MsgHTML($body);
$mail->AddAddress(@$_POST['mail'], @$_POST['name']);
$mail->AddReplyTo("plmp.mptech@gmail.com", "Reply");
$mail->IsHTML(true);
if (!$mail->Send()) {
    header("Location: " . $_POST['url']);
} else {
    header("Location: " . $_POST['url']);
}
