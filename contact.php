<?php
include('dbconnection.php');

$successMessage = '';
$failureMessage='';

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $date = date( 'Y-m-d' );

  // Check if the email exists in the user_account table
  $checkEmailStmt = $conn->prepare("SELECT email FROM user_account WHERE email = ?");
  $checkEmailStmt->bind_param("s", $email);
  $checkEmailStmt->execute();
  $checkEmailStmt->store_result();

  // $stmt = $conn->prepare("INSERT INTO feedback (name, email, subject, message, date) VALUES( ?, ?, ?, ?, ?)");
  // $stmt->bind_param("sssss",$name,$email,$subject,$message, $date);
  // $stmt->execute();

  // $stmt->close();
  // $conn->close();
  if ($checkEmailStmt->num_rows > 0) {
    // Email exists, proceed with feedback submission
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, subject, message, date) VALUES(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $subject, $message, $date);
    $stmt->execute();

    $stmt->close();
    $successMessage = "<p>Feedback submitted successfully.</p>";
  } else {
    // Email does not exist, show an error message
    $failureMessage = "<p>Email  does not exist.  Please create an account</p>";
  }

  $checkEmailStmt->close();
  $conn->close();

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>

  <?php
    include('header.php');
  ?>


<div class="cbox">
    <div class="contact-us">
      <div class="c-heading">
        <h1>Contact us</h1>
      </div>
      <div class="flex info">
        <div class="address">
        <i class="fa-solid fa-location-dot" style= "font-size:40px; margin-bottom:10px;"></i>
          <h2>ADDRESS</h2>
          <h4>Garmur, Jorhat, No.2 Bamun Gaon, Assam 785007</h4>
        </div>
        <div class="ph-number">
        <i class="fa-solid fa-phone" style= "font-size:40px; margin-bottom:10px;"></i>
          <h2>PHONE NUMBER</h2>
          <h4>8638462513</h4>
          <h4>7086333513</h4>
        </div>
        <div class="email">
        <i class="fa-solid fa-envelope"style= "font-size:40px; margin-bottom:10px;"></i>
          <h2>Email</h2>
          <h4>thenewsnest02@gmail.com</h4>
        </div>
      </div>
    </div>

    <style>
      .successMessage{
        color: green;
        text-align:center;
        font-size:2rem;
      }

      .failureMessage{
        color:red;
        
        text-align:center;
        font-size:2rem;
      }
    </style>

    <div class="form">
    <div class="failureMessage">

<?php echo $failureMessage; ?>
</div>
    <div class="successMessage">

<?php echo $successMessage; ?>
</div>
      <form action="" method = "post">
        <div class="flex ne">
          <div class="name">
            <input type="text" placeholder="Your Name" name = "name" required/>
          </div>
          <div class="f-email">
            <input type="text" placeholder="Your Email" name="email" requied/>
          </div>
        </div>
        <div class="subject">
          <input type="text" placeholder="subject" name="subject" required/>
        </div>
        <div class="message" >
          <textarea
            name="message"
            id="message"
            cols=""
            rows=""
            placeholder="Message"
          required></textarea>
        </di>
        <div class="submit">
          <input type="submit" value="Send message"/>
        </div>
      </form>
    </div>
    </div>


    <?php
      include('main_footer.php');
      include('sub_footer.php');
    ?>

  </body>

  <style>

    .cbox{
      margin-top: 150px;
    }
    .flex {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .contact-us {
      margin: 0;
    }

    .c-heading h1{
      text-align: center;
      font-size: 60px;
      margin-bottom: 80px;
    }

    .address,
    .ph-number,
    .email {
      text-align: center;
      width: 33%;
    }

    .ph-number {
      border-left: 1px solid rgba(41, 40, 40, 0.422);
      border-right: 1px solid rgba(41, 40, 40, 0.422);
    }

    .address h2,
    .ph-number h2,
    .email h2 {
      color: rgb(54, 53, 53);
      font-size: large;
    }

    .c-heading h1 {
      font-weight: 400;
      lletter-spacing: 30px;
    }

    .info {
      width: 60vw;
      height: auto;
      margin: 0 auto;
    }

    .form {
      width: 80vw;
      margin: 80px auto;
      padding: 25px 25px 35px;
      box-shadow: 15px 8px 16px 1px rgba(0, 0, 0, 0.2);
    }

    .form .ne {
      width: 100%;
    }

    .name input,
    .f-email input {
      width: 38vw;
      height: 40px;
      margin-bottom: 20px;
    }

    .message textarea,
    .subject input {
      width: 99.5%;
      height: 40px;
      margin-bottom: 20px;
    }

    .message textarea {
      height: 150px;
    }

    .submit {
      text-align: center;
    }

    .submit input {
      width: 120px;
      height: 40px;
      background-color: black;
      color: white;
    }
  </style>
</html>
