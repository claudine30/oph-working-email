
<?php

/*
$to      = 'tinecastro.0916@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: johnenosp@gmail.com' . '\r\n' .
   'Reply-To: johnenosp@gmail.com' . '\r\n' .
   'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

echo 'Email Sent.'; */
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception; 
 
// Include library files 
require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php'; 
 
// Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer; 
 
// Server settings 
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
/*$mail->isSMTP();            
$mail->Mailer = 'smtp';                // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;                     // Enable SMTP authentication 
$mail->Username = 'castroclaudine30@gmail.com';       // SMTP username 
$mail->Password = '063001cjpc';         // SMTP password dfwmflgoqgousepa (claudine gmail) // sojkkquqdqxqzfjh (upay gmail)
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;                          // TCP port to connect to 
 */
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;
$mail->Host       = 'smtp.gmail.com';
$mail->Username   = 'upayonline.uphsdlp@gmail.com';
$mail->Password   = 'sojkkquqdqxqzfjh';
/*// Sender info 
$mail->setFrom('castroclaudine30@gmail.com', 'SenderName'); 
//$mail->addReplyTo('reply@example.com', 'SenderName'); 
 
// Add a recipient 
$mail->addAddress('tinecastro.0916@gmail.com'); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'Email from Localhost by CodexWorld'; 
 
// Mail body content 
$bodyContent = '<h1>How to Send Email from Localhost using PHP by CodexWorld</h1>'; 
$bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>CodexWorld</b></p>'; 
$mail->Body    = $bodyContent; 
 */
$email_template = "mail_template.html";

$recipient_mail = $_POST['email_value'];
$recipient_name = $_POST['firstname_value'];
$studID = $_POST['studID_value'];
$tracking_code = $_POST['tracking_code_value'];
$payment_for_display = $_POST['payment_for_display'];
$amount_to_pay  = $_POST['amount_to_pay'];
$semester  = $_POST['semester'];
$school_year = $_POST[' school_year'];


$mail->IsHTML(true);
$mail->AddAddress($recipient_mail, $recipient_name);
$mail->SetFrom('upayonline.uphsdlp@gmail.com', 'UPay: UPHSD Online Payment');
////$mail->AddReplyTo('reply-to-email@domain', 'reply-to-name');
$mail->AddCC('lpacctng.sample@gmail.com', 'Accounting Office UPHSD-LP');
$mail->Subject = 'Hello '. $recipient_name .', Payment Received by UPAY';

/*$content = file_get_contents($email_template);
$content = str_replace('%recipient_name%', $recipient_name, $content);
$content = str_replace('%tracking_code%', $tracking_code, $content); */

//$content = "Your payment has been received. Tracking code : " . $studID;

$content = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office' style='width:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0'>
 <head>
  <meta charset='UTF-8'>
  <meta content='width=device-width, initial-scale=1' name='viewport'>
  <meta name='x-apple-disable-message-reformatting'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta content='telephone=no' name='format-detection'>
  <title>New email template 2022-11-29</title><!--[if (mso 16)]>
    <style type='text/css'>
    a {text-decoration: none;}
    </style>
    <![endif]--><!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--><!--[if gte mso 9]>
<xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG></o:AllowPNG>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
</xml>
<![endif]-->
  <style type='text/css'>
#outlook a {
	padding:0;
}
.ExternalClass {
	width:100%;
}
.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
	line-height:100%;
}
.es-button {
	mso-style-priority:100!important;
	text-decoration:none!important;
}
a[x-apple-data-detectors] {
	color:inherit!important;
	text-decoration:none!important;
	font-size:inherit!important;
	font-family:inherit!important;
	font-weight:inherit!important;
	line-height:inherit!important;
}
.es-desk-hidden {
	display:none;
	float:left;
	overflow:hidden;
	width:0;
	max-height:0;
	line-height:0;
	mso-hide:all;
}
.es-button-border:hover a.es-button, .es-button-border:hover button.es-button {
	background:#7f1416!important;
	border-color:#7f1416!important;
}
.es-button-border:hover {
	border-color:#9c2460 #9c2460 #9c2460 #9c2460!important;
	background:#7f1416!important;
}
td .es-button-border:hover a.es-button-1566986321426 {
	background:#2980d9!important;
	border-color:#2980d9!important;
}
td .es-button-border-1566986321449:hover {
	background:#2980d9!important;
}
[data-ogsb] .es-button {
	border-width:0!important;
	padding:10px 40px 10px 40px!important;
}
[data-ogsb] .es-button.es-button-1669720073405 {
	padding:10px 40px!important;
}
@media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120%!important } h1 { font-size:26px!important; text-align:center } h2 { font-size:24px!important; text-align:center } h3 { font-size:20px!important; text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:26px!important } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:24px!important } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-menu td a { font-size:13px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:13px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:14px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:13px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:11px!important } *[class='gmail-fix'] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button, button.es-button { font-size:14px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; max-height:inherit!important } }
</style>
 </head>
 <body data-new-gr-c-s-loaded='14.1087.0' style='width:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;padding:0;Margin:0'>
  <div class='es-wrapper-color' style='background-color:#FEF0BA'><!--[if gte mso 9]>
			<v:background xmlns:v='urn:schemas-microsoft-com:vml' fill='t'>
				<v:fill type='tile' src='uploads/cover-1635471753.png' color='#fef0ba' origin='0.5, 0' position='0.5, 0'></v:fill>
			</v:background>
		<![endif]-->
   <table class='es-wrapper' width='100%' cellspacing='0' cellpadding='0' background='uploads/cover-1635471753.png' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:no-repeat;background-position:center top;background-image:url(uploads/cover-1635471753.png);background-color:#FEF0BA'>
     <tr style='border-collapse:collapse'>
      <td valign='top' style='padding:0;Margin:0'>
       <table cellpadding='0' cellspacing='0' class='es-content' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'>
         <tr style='border-collapse:collapse'>
          <td align='center' style='padding:0;Margin:0'>
           <table bgcolor='#7f1416' class='es-content-body' align='center' cellpadding='0' cellspacing='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px'>
             <tr style='border-collapse:collapse'>
              <td align='left' style='Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px'>
               <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                 <tr style='border-collapse:collapse'>
                  <td align='center' valign='top' style='padding:0;Margin:0;width:560px'>
                   <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                     <tr style='border-collapse:collapse'>
                      <td class='es-infoblock es-m-txt-c' align='center' style='padding:0;Margin:0;line-height:13px;font-size:11px;color:#CCCCCC'></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
           </table></td>
         </tr>
       </table>
       <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'>
         <tr style='border-collapse:collapse'>
          <td align='center' style='padding:0;Margin:0'>
           <table class='es-content-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px' cellspacing='0' cellpadding='0' bgcolor='#7f1416' align='center'>
             <tr style='border-collapse:collapse'>
              <td style='padding:0;Margin:0;padding-top:25px;background-position:center top' align='left'>
               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                 <tr style='border-collapse:collapse'>
                  <td valign='top' align='center' style='padding:0;Margin:0;width:600px'>
                   <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                     <tr style='border-collapse:collapse'>
                      <td align='center' style='padding:0;Margin:0;font-size:0'><a target='_blank' href='https://viewstripo.email' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#7F1416;font-size:14px'><img class='adapt-img' src='images/75141566983582522.png' alt style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic' width='600'></a></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
             <tr style='border-collapse:collapse'>
              <td style='padding:0;Margin:0;padding-left:20px;padding-right:20px;background-color:#ffffff' bgcolor='#ffffff' align='left'>
               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                 <tr style='border-collapse:collapse'>
                  <td valign='top' align='center' style='padding:0;Margin:0;width:560px'>
                   <table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:center bottom;background-color:transparent' width='100%' cellspacing='0' cellpadding='0' bgcolor='transparent'>
                     <tr style='border-collapse:collapse'>
                      <td align='left' bgcolor='#fff2cc' style='padding:0;Margin:0;padding-bottom:5px;padding-top:10px'><h3 style='Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:'source sans pro', 'helvetica neue', helvetica, arial, sans-serif;font-size:20px;font-style:normal;font-weight:bold;color:#990000'>Dear %recipient_name% </h3></td>
                     </tr>
                     <tr style='border-collapse:collapse'>
                      <td bgcolor='transparent' align='left' style='padding:0;Margin:0;padding-top:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#7F1416;font-size:14px'>Thank you for your continued trust with University of Perpetual Help System DALTA Las Pinas Campus!</p></td>
                     </tr>
                     <tr style='border-collapse:collapse'>
                      <td bgcolor='transparent' align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#7F1416;font-size:14px'>Your payment has been successfully received by the UPAY: Online Payment System.</p></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
             <tr style='border-collapse:collapse'>
              <td style='padding:0;Margin:0;background-position:center bottom' align='left'>
               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                 <tr style='border-collapse:collapse'>
                  <td valign='top' align='center' style='padding:0;Margin:0;width:600px'>
                   <table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-position:center bottom;background-color:#ffffff;border-radius:0px 0px 5px 5px' width='100%' cellspacing='0' cellpadding='0' bgcolor='#ffffff'>
                     <tr style='border-collapse:collapse'>
                      <td height='15' align='center' style='padding:0;Margin:0'></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
             <tr style='border-collapse:collapse'>
              <td align='left' style='padding:0;Margin:0;padding-left:20px;padding-right:20px'>
               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                 <tr style='border-collapse:collapse'>
                  <td valign='top' align='center' style='padding:0;Margin:0;width:560px'>
                   <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                     <tr style='border-collapse:collapse'>
                      <td height='10' align='center' style='padding:0;Margin:0'></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
             <tr style='border-collapse:collapse'>
              <td style='padding:0;Margin:0;background-position:center bottom' align='left'>
               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                 <tr style='border-collapse:collapse'>
                  <td valign='top' align='center' style='padding:0;Margin:0;width:600px'>
                   <table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-position:center bottom;background-color:#ffffff;border-radius:5px 5px 0px 0px' width='100%' cellspacing='0' cellpadding='0' bgcolor='#ffffff'>
                     <tr style='border-collapse:collapse'>
                      <td height='16' align='center' style='padding:0;Margin:0'></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
             <tr style='border-collapse:collapse'>
              <td style='padding:0;Margin:0;padding-left:20px;padding-right:20px;background-position:center bottom;background-color:#ffffff' bgcolor='#ffffff' align='left'>
               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                 <tr style='border-collapse:collapse'>
                  <td valign='top' align='center' style='padding:0;Margin:0;width:560px'>
                   <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                     <tr style='border-collapse:collapse'>
                      <td bgcolor='transparent' align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#7F1416;font-size:16px'><b></b>PAYMENT DETAILS</p><b></p></td>
                     </tr>
                     <tr style='border-collapse:collapse'>
                      <td bgcolor='transparent' align='left' style='padding:0;Margin:0;padding-bottom:5px;padding-left:5px;padding-right:5px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:28px;color:#7F1416;font-size:14px'> Payment Code <span style='color:#2980d9'>►</span>&nbsp; %tracking_code% </p>
                        <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:28px;color:#7F1416;font-size:14px'>Student ID No. <span style='color:#2980d9'>►</span>&nbsp; %studID%</p>
                        <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:28px;color:#7F1416;font-size:14px'>Student Name. <span style='color:#2980d9'>►</span>&nbsp;for this trial period, it will be totally free for you;</p>
                        <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:28px;color:#7F1416;font-size:14px'>Payment For <span style='color:#2980d9'>►</span>&nbsp;we meet in two months for further discussions;</p>
                        <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:28px;color:#7F1416;font-size:14px'>School Year<span style='color:#2980d9'>►</span>&nbsp;in case of&nbsp;emergency, I can reach out to you over your cell phone.</p></td>
                       <!-- <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:28px;color:#7F1416;font-size:14px'>Semester<span style='color:#2980d9'>►</span>&nbsp;in case of&nbsp;emergency, I can reach out to you over your cell phone.</p></td>
                        <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:28px;color:#7F1416;font-size:14px'>Amount<span style='color:#2980d9'>►</span>&nbsp;in case of&nbsp;emergency, I can reach out to you over your cell phone.</p></td>
                       -->
                      </tr>
                     <tr style='border-collapse:collapse'>
                      <td bgcolor='transparent' align='center' style='padding:0;Margin:0;padding-bottom:5px;padding-top:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#990000;font-size:14px'><strong>The next meeting will take place on October 25.</strong></p></td>
                     </tr>
                   </table></td>
                 </tr>
                 <tr style='border-collapse:collapse'>
                  <td class='es-m-p20b' align='left' style='padding:0;Margin:0;width:560px'>
                   <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                     <tr style='border-collapse:collapse'>
                      <td align='center' style='padding:0;Margin:0;padding-top:10px;padding-bottom:10px'><span class='es-button-border' style='border-style:solid;border-color:#741B47;background:#7F1416;border-width:0px;display:inline-block;border-radius:5px;width:auto'><a href='https://viewstripo.email' class='es-button es-button-1669720073405' target='_blank' style='mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#EEE3BC;font-size:18px;border-style:solid;border-color:#7F1416;border-width:10px 40px;display:inline-block;background:#7F1416;border-radius:5px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-weight:normal;font-style:normal;line-height:22px;width:auto;text-align:center'>Add event to calendar</a></span></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
             <tr style='border-collapse:collapse'>
              <td style='padding:0;Margin:0;background-position:center bottom' align='left'>
               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                 <tr style='border-collapse:collapse'>
                  <td valign='top' align='center' style='padding:0;Margin:0;width:600px'>
                   <table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-position:center bottom;background-color:#ffffff;border-radius:0px 0px 5px 5px' width='100%' cellspacing='0' cellpadding='0' bgcolor='#ffffff'>
                     <tr style='border-collapse:collapse'>
                      <td height='32' align='center' style='padding:0;Margin:0'></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
           </table></td>
         </tr>
       </table>
       <table class='es-footer' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:#7F1416;background-repeat:repeat;background-position:center top'>
         <tr style='border-collapse:collapse'>
          <td align='center' style='padding:0;Margin:0'>
           <table class='es-footer-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' align='center'>
             <tr style='border-collapse:collapse'>
              <td style='Margin:0;padding-top:15px;padding-left:20px;padding-right:20px;padding-bottom:25px;background-position:center bottom;background-color:transparent' bgcolor='transparent' align='left'><!--[if mso]><table style='width:560px' cellpadding='0' cellspacing='0'><tr><td style='width:270px' valign='top'><![endif]-->
               <table class='es-left' cellspacing='0' cellpadding='0' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left'>
                 <tr style='border-collapse:collapse'>
                  <td valign='top' align='center' style='padding:0;Margin:0;width:270px'>
                   <table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:center top' width='100%' cellspacing='0' cellpadding='0'>
                     <tr style='border-collapse:collapse'>
                      <td class='es-m-txt-c' align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#EFEFEF;font-size:14px'>It is a long established fact that a reader will be distracted by the readable&nbsp;</p></td>
                     </tr>
                   </table></td>
                 </tr>
               </table><!--[if mso]></td><td style='width:20px'></td><td style='width:270px' valign='top'><![endif]-->
               <table class='es-right' cellspacing='0' cellpadding='0' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right'>
                 <tr style='border-collapse:collapse'>
                  <td align='left' style='padding:0;Margin:0;width:270px'>
                   <table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:center top' width='100%' cellspacing='0' cellpadding='0'>
                     <tr style='border-collapse:collapse'>
                      <td class='es-m-txt-c' align='right' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px;font-size:0'>
                       <table class='es-table-not-adapt es-social' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                         <tr style='border-collapse:collapse'>
                          <td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px'><img title='Facebook' src='images/facebook-rounded-white.png' alt='Fb' width='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></td>
                          <td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px'><img title='Twitter' src='images/twitter-rounded-white.png' alt='Tw' width='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></td>
                          <td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px'><img title='Instagram' src='images/instagram-rounded-white.png' alt='Inst' width='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></td>
                          <td valign='top' align='center' style='padding:0;Margin:0'><img title='Youtube' src='images/youtube-rounded-white.png' alt='Yt' width='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></td>
                         </tr>
                       </table></td>
                     </tr>
                   </table></td>
                 </tr>
               </table><!--[if mso]></td></tr></table><![endif]--></td>
             </tr>
           </table></td>
         </tr>
       </table>
       <table cellpadding='0' cellspacing='0' class='es-content' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'>
         <tr style='border-collapse:collapse'>
          <td align='center' style='padding:0;Margin:0'>
           <table bgcolor='#7f1416' class='es-content-body' align='center' cellpadding='0' cellspacing='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px'>
             <tr style='border-collapse:collapse'>
              <td align='left' style='Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;padding-bottom:30px;background-position:left top'>
               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                 <tr style='border-collapse:collapse'>
                  <td valign='top' align='center' style='padding:0;Margin:0;width:560px'>
                   <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                     <tr style='border-collapse:collapse'>
                      <td class='es-infoblock made_with' align='center' style='padding:0;Margin:0;line-height:120%;font-size:0;color:#CCCCCC'><img src='images/7911561025989373.png' alt width='125' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
           </table></td>
         </tr>
       </table></td>
     </tr>
   </table>
  </div>
 </body>
</html>";





// Send email 
$mail->MsgHTML($content); 
if(!$mail->send()) { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
} else { 
    echo 'Message has been sent.'; 
}
?>

