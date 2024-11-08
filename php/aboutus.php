<?php
  include 'navbar.php'
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/aboutus.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css"
    />
    <title>About_us</title>
  </head>
  <body>
    <div class="about-us">
      <div class="container">
        <div class="row">
          <div class="flex bg">
            <img src="../image/aboutus-test/2.jpg" alt="" />
          </div>
          <div class="flex text">
            <h2>About Us</h2>
            <h3>Discover Our Story</h3>
            <p>
              Shubham Impex India, established in 2012, is redefining
              international freight management with over 30 years of expertise.
              As a dynamic, Indian-owned conglomerate, we offer tailored,
              boutique-style services that set us apart in the industry.<br />
              Our mission at Shubham Impex India is to prioritize personalized
              customer experiences. We see our clients as partners, ensuring
              every interaction is rooted in trust and excellence. By
              collaborating with like-minded global businesses, we propel our
              mutual success, making Shubham Impex India a name synonymous with
              quality and reliability.<br />
            </p>
            <div class="sign">
              <img src="../image/aboutus-test/sign.png" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div class="content">
        <div class="top">
          <div class="logo-details">
            <i class="fab"></i>
            <span class="logo_name"
              ><img class="logo" src="../image/logo.png" alt="logo"
            /></span>
          </div>
          <div class="media-icons">
            <a href="#"><i class="fab ri-twitter-x-fill"></i></a>
            <a href="#"><i class="fab ri-linkedin-fill"></i></a>
            <a href="#"><i class="fab ri-instagram-fill"></i></a>
            <a href="#"><i class="fab ri-facebook-fill"></i></a>
          </div>
        </div>
        <div class="link-boxes">
          <ul class="box">
            <li class="link_name">Company</li>
            <li><a href="../html/home.html">Home</a></li>
            <li><a href="../html/services.html">Services</a></li>
            <li><a href="../html/industries.html">Industries</a></li>
            <li><a href="../html/resources.html">Resources</a></li>
            <li><a href="../html/aboutus.html">About Us</a></li>
            <li><a href="../html/contactus.html">Contact Us</a></li>
          </ul>
          <ul class="box">
            <li class="link_name">Services</li>
            <li><a href="#">App design</a></li>
            <li><a href="#">Web design</a></li>
            <li><a href="#">Logo design</a></li>
            <li><a href="#">Banner design</a></li>
          </ul>
          <ul class="box">
            <li class="link_name">Account</li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">My account</a></li>
            <li><a href="#">Preference</a></li>
            <li><a href="#">Purchase</a></li>
          </ul>
          <ul class="box">
            <li class="link_name">Courses</li>
            <li><a href="#">HTML & CSS</a></li>
            <li><a href="#">Javascript</a></li>
            <li><a href="#">Photography</a></li>
            <li><a href="#">Photoshop</a></li>
          </ul>
          <ul class="box input-box">
            <li class="link_name">Subscribe</li>
            <li><input type="text" placeholder="Enter your email" /></li>
            <li><input type="text" value="Subscribe" /></li>
          </ul>
        </div>
      </div>
      <div class="bottom-details">
        <div class="bottom_text">
          <span class="copyright-text"
            >Copyright &#169; 2021 <a href="#">Shubham impex</a>All rights
            reserved</span
          >
          <span class="privacy-term">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & conditions</a>
          </span>
        </div>
      </div>
    </footer>
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
