<?php
  include '../php/navbar.php'
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="index.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css"
    />
    <title>Contact-Us</title>
  </head>
  <body>
    <div class="contact-section">
      <div class="container">
        <div class="aside">
          <div class="social-logo">
            <span>logo</span>
          </div>
          <div class="social-desc">
            <p>
              13, Pratiksha Row Houses, Near Saffrony Apartment, Opp. Govt. Tube
              Well, Bopal, Ahmedabad, Gujarat, 380058, India
            </p>
          </div>
          <div class="social-icons">
            <div class="icon-box">
              <i class="ri-twitter-x-fill"></i>
            </div>
            <div class="icon-box">
              <i class="ri-linkedin-fill"></i>
            </div>
            <div class="icon-box">
              <i class="ri-instagram-fill"></i>
            </div>
            <div class="icon-box">
              <i class="ri-facebook-fill"></i>
            </div>
          </div>
        </div>
        <div class="main">
          <div class="contact-text">
            <h2>Get in Touch</h2>
            <p>24/7 we will answer your question and problems</p>
          </div>
          <form action="" method="post">
            <div class="form-section">
              <div class="row row-50">
                <input type="text" id="name" name="name" placeholder="Name" />
                <label for="name">Name</label>
              </div>
              <div class="row row-50">
                <input type="email" id="email" name="email" placeholder="Email" />
                <label for="email">Email</label>
              </div>
              <div class="row row-100">
                <input type="text" id="phone" name="mobile" placeholder="Phone-No." />
                <label for="phone">Mobile</label>
              </div>
              <div class="row row-100">
                <textarea
                  name="message"
                  id="message"
                  placeholder="message"
                ></textarea>
                <label for="message" class="message">Message</label>
              </div>
              <div class="row row-100">
                <input type="submit" name="send" value="Send" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      function showSidebar() {
        const sidebar = document.querySelector('.sidebar');
        sidebar.style.display = 'flex';
      }
      function hideSidebar() {
        const sidebar = document.querySelector('.sidebar');
        sidebar.style.display = 'none';
      }
    </script>
  </body>
</html>

<?php
  error_reporting(0);
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

if(isset($_POST['send']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $message = $_POST['message'];

  //Load Composer's autoloader
  require 'PHPMailer/Exception.php';
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';

  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'shubhamsumant7@gmail.com';                     //SMTP username
      $mail->Password   = 'oeea wcll ifpu kxiw';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('shubhamsumant7@gmail.com', 'Contact Form');
      $mail->addAddress($email, 'hamari web');     //Add a recipient

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Contact Form';
      $mail->Body    = 'This is the  message sent through Shubham Impex <br>Thanks to submit your response <br><b>You will get your login credentials </b>';

      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

if(isset($_POST['send']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $message = $_POST['message'];

  //Load Composer's autoloader
  require 'PHPMailer/Exception.php';
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';

  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'shubhamsumant7@gmail.com';                     //SMTP username
      $mail->Password   = 'oeea wcll ifpu kxiw';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('shubhamsumant7@gmail.com', 'Contact Form');
      $mail->addAddress('ravis72@gmail.com', 'hamari web');     //Add a recipient

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Contact Form';
      if($message==" " OR $message=="  " OR $message==null){
        $mail->Body    = `This is $email <br><b>i want to contact you</b>`;
      }
      else{
        $mail->Body    = `This is $email <br><b>$message</b>`;
      }

      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
?>