<?php
include('includes/config.php');
if (isset($_POST['payment_btn'])) {
  $iid = intval($_GET['iid']);
  $year = $_POST['year'];
  $month = $_POST['month'];
  $name = $_POST['name'];
  $cardname = $_POST['cardname'];
  $number = $_POST['number'];
  $email = $_POST['email'];
  $cvv = $_POST['cvv'];
  $sql1 = "update tblinvoice set FullName=:name, Email=:email,CardName=:cardname,CCNumber=:number,EMonth=:month,EYear=:year,CVV=:cvv where iid=:iid";
  $query1 = $dbh->prepare($sql1);
  $query1->bindParam(':name', $name, PDO::PARAM_STR);
  $query1->bindParam(':email', $email, PDO::PARAM_STR);
  $query1->bindParam(':year', $year, PDO::PARAM_STR);
  $query1->bindParam(':month', $month, PDO::PARAM_STR);
  $query1->bindParam(':cardname', $cardname, PDO::PARAM_STR);
  $query1->bindParam(':number', $number, PDO::PARAM_STR);
  $query1->bindParam(':cvv', $cvv, PDO::PARAM_STR);
  $query1->bindParam(':iid', $iid, PDO::PARAM_STR);
  $query1->execute();
  $msg = "Package Updated Successfully";
  header("Location: /Book_My_Trip/bmt/tour_history.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/Payment.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>

<body>
  <div class="row">
    <div class="col-75">
      <div class="container">
        <div class="row">
          <div class="col-50">
            <form method="post">
              <h3>Ordering Details</h3>
              <?php
              $iid = intval($_GET['iid']);
              $sql = "SELECT * from tblinvoice where iid=:iid";
              $query = $dbh->prepare($sql);
              $query->bindParam(':iid', $iid, PDO::PARAM_STR);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = 1;
              if ($query->rowCount() > 0) {
                foreach ($results as $result) {
              ?>
                  <label for=""> Package Name</label>
                  <input type="text" id="packagename" name="packagename" value="<?php echo htmlentities($result->PackageName); ?>" disabled>
                  <label for=""> Package Price</label>
                  <input type="text" id="price" name="price" value="<?php echo htmlentities($result->BillAmount); ?>" disabled>
                  <div class="row">
                    <div class="col-50">
                      <label for="expyear">Exp Year</label>
                      <select name="year" id="year">
                        <option>2023</option>
                        <option>2024</option>
                        <option>2025</option>
                        <option>2026</option>
                        <option>2027</option>
                      </select>
                    </div>
                    <div class="col-50">
                      <label for="cvv">CVV</label>
                      <input type="number" id="cvv" name="cvv" placeholder="CVV">
                    </div>
                  </div>
          </div>
      <?php
                }
              }
      ?>

      <div class="col-50">
        <h3>Payment</h3>
        <label for="fname">Accepted Cards</label>
        <div class="icon-container">
          <i class="fa fa-cc-visa" style="color: navy"></i>
          <i class="fa fa-cc-amex" style="color: blue"></i>
          <i class="fa fa-cc-mastercard" style="color: red"></i>
          <i class="fa fa-cc-discover" style="color: orange"></i>
        </div>
        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
        <input type="text" id="name" name="name" placeholder="Enter Your FullName" required>
        <label for="email"><i class="fa fa-envelope"></i> Email</label>
        <input type="text" id="email" name="email" placeholder="Email" required>

        <label for="cname">Name on Card</label>
        <input type="text" id="cardname" name="cardname" placeholder="Card Name" required>
        <label for="ccnum">Credit card number</label>
        <input type="number" id="number" name="number" placeholder="Card Number">
        <label for="expmonth">Exp Month</label>
        <select name="month" id="month">
          <option>Jan</option>
          <option>Feb</option>
          <option>Mar</option>
          <option>Apr</option>
          <option>May</option>
          <option>Jun</option>
          <option>Jul</option>
          <option>Aug</option>
          <option>Sep</option>
          <option>Oct</option>
          <option>Nov</option>
          <option>Dec</option>
        </select>

      </div>
        </div>


        <!-- <button class="btn"><a href="giphy.gif">Continue to checkout</a></button> -->
        <a href="tour_history.php"> <input type="hidden" name="payment_id" ?>
          <button type="submit" name="payment_btn" class="btn">Pay</button></a>
      </div>
    </div>
  </div>
  </form>
  <script>
   // get the CVV input field
var cvvInput = $('#cvv');

// attach a keyup event handler to the input field
cvvInput.on('keyup', function() {
  // get the value of the input field
  var cvvValue = cvvInput.val();
  
  // check if the value is a 3 or 4 digit number
  if (/^\d{3}$/.test(cvvValue)) {
    // the CVV is valid
    cvvInput.removeClass('invalid').addClass('valid');
  } else {
    // the CVV is invalid
    cvvInput.removeClass('valid').addClass('invalid');
  }
  
  // truncate the input to 3 digits
  cvvInput.val(cvvValue.substring(0, 3));
});

// get the credit card number input field
var ccNumberInput = $('#number');

// attach a keyup event handler to the input field
ccNumberInput.on('keyup', function() {
   // get the value of the input field
   var ccNumberValue = ccNumberInput.val();
  
  // check if the value is a 3 or 4 digit number
  if (/^\d{16}$/.test(ccNumberValue)) {
    // the CVV is valid
    ccNumberInput.removeClass('invalid').addClass('valid');
  } else {
    // the CVV is invalid
    ccNumberInput.removeClass('valid').addClass('invalid');
  }
  
  // truncate the input to 3 digits
  ccNumberInput.val(ccNumberValue.substring(0, 16));
});




  </script>
  
  <script>
    // get the email input field
var emailInput = $('#email');

// attach a blur event handler to the input field
emailInput.on('keyup', function() {
  // get the value of the input field
  var emailValue = emailInput.val();

  // check if the email address is valid
  if (isValidEmail(emailValue)) {
    // the email address is valid
    emailInput.removeClass('invalid').addClass('valid');
  } else {
    // the email address is invalid
    emailInput.removeClass('valid').addClass('invalid');
  }
});

// function to check if an email address is valid
function isValidEmail(email) {
  // regular expression to check if an email address is valid
  var emailRegex = /^([a-zA-Z0-9._-]+)@([a-zA-Z0-9.-]+\.[a-zA-Z]{2,5})$/;

  return emailRegex.test(email);
}

    $(function() {
      $("#expyear").datepicker({
        dateFormat: 'yy'
      });
    });​
    var creditCardInput = $('#ccnum');

    creditCardInput.on('input', function() {
      console.log("hi");
      // get the value of the input
      var value = $(this).val();

      // use a regular expression to check that the input is a valid credit card number
      var regex = /^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/;
      if (regex.test(value)) {
        // if the input is valid, remove any error messages and update the style of the input
        creditCardInput.removeClass('error');
        creditCardInput.addClass('valid');
        console.log("valid");
      } else {
        // if the input is invalid, add an error message and update the style of the input
        creditCardInput.addClass('error');
        creditCardInput.removeClass('valid');
        console.log("invalid");
      }
    });
  </script>
  <!-- <script>
    $(document).ready(function() {
  $("#cvv").attr({
    "min" : 3,
    "max" : 3;
  });
});
  </script> -->
</body>

</html>