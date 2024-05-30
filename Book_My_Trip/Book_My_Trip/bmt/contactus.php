<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit1']))
{
$fname=$_POST['fname'];
$email=$_POST['email'];	
$mobile=$_POST['mobileno'];
$subject=$_POST['subject'];	
$description=$_POST['description'];
$sql="INSERT INTO  tblenquiry(FullName,EmailId,MobileNumber,Subject,Description) VALUES(:fname,:email,:mobile,:subject,:description)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
mail($email,$subject,$description); 

if($lastInsertId)
{
$msg="Enquiry  Successfully submited";
header("Location: /Book_My_Trip/bmt/index.php");
}
else 
{
$error="Something went wrong. Please try again";
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="css/pstyle.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#email').blur(function() {
        var email = $('#email').val();
        if (validateEmail(email)) {
          $('#email-error').text('');
        } else {
          $('#email-error').text('Please enter a valid email address.');
        }
      });
    });
    
    function validateEmail(email) {
      var re = /\S+@\S+\.\S+/;
      return re.test(email);
    }
  </script>
</head>
<body>
  <div class="container">
    <form name="enquiry" method="post">
      <h3>GET IN TOUCH</h3>
      <input type="text" name="fname" id="fname" placeholder="Name " required>
      <input type="email" name="email" id="email" placeholder="Email ID" required>
      <input type="text" name="mobileno" id="mobileno" placeholder="Phone no." required>
      <input type="text" name="subject" id="subject" class="form-control" id="subject"  placeholder="Subject" required="">
      <textarea name="description" id="description" rows="4" placeholder="How we can help you" required></textarea>
      <button type="submit" name="submit1">Submit</button> 
      <a href="index.php" target="_self" class="btn btn-facebook btn-block">Back To Home</a>
    </form>
  </div>

</body>
</html>
