<?php
include('includes/config.php');
require 'phpmailer/PHPMailerAutoload.php';
require 'phpmailer/credential.php';
if(isset($_REQUEST['iid']))
{

           
           $iid = intval($_GET['iid']);
            $sql = "SELECT * from tblinvoice where iid=:iid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':iid', $iid, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
                foreach ($results as $result) {
                    $cemail = $result->Email;


$mail = new PHPMailer;

$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                  // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'Book My Trip');
$mail->addAddress($cemail);     // Name is optional
$mail->addReplyTo(EMAIL);


$mail->Subject = 'Confirmation ';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    
  header("Location: /Book_My_Trip/bmt/tour_history.php");
}
                }
            }
}
?>