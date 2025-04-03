<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Cache-Busting Links for CSS and JS -->
  <link rel="stylesheet" href="style.css?v=2">
  <script src="script.js?v=2"></script>

  <style>
    /* Footer section styles */
    *, *:before, *:after {
      box-sizing: border-box;
    }

    .footer {
      display: flex;
      flex-flow: row wrap;
      padding: 50px;
      color: #fff;
      background-color: #036271;
      margin-top: 100px;
    }

    .footer > * {
      flex: 1 100%;
    }

    .footer-left {
      margin-right: 1.25rem;
      margin-bottom: 2rem;
    }

    .footer-left p {
      font-size: 18px;
    }

    .footer-left img {
      background: white;
      margin-bottom: 15px;
      width: 100px;
    }

    h2 {
      font-weight: 600;
      font-size: 17px;
    }

    .footer ul {
      list-style: none;
      padding-left: 0;
    }

    .footer li {
      line-height: 2rem;
    }

    .footer a {
      text-decoration: none;
    }

    .footer-right {
      display: flex;
      flex-flow: row wrap;
    }

    .footer-right > * {
      flex: 1 50%;
      margin-right: 1.25rem;
    }

    .footer-right h2 {
      font-size: 20px;
      margin-bottom: 25px;
    }

    .footer-right .box {
      font-size: 18px;
    }

    .box a {
      color: #c4c4c4;
    }

    .box a:hover {
      color: #fff0f0;
      font-weight: bold;
      font-size: 16px;
    }

    .footer-bottom {
      text-align: center;
      color: #f1f1f1;
      padding-top: 50px;
    }

    .footer-left p {
      padding-right: 20%;
      color: #e2e1e1;
      margin: 15px 0;
    }

    .socials a {
      background: #002a5d;
      width: 40px;
      height: 40px;
      display: inline-block;
      margin-right: 10px;
    }

    .socials a:hover {
      background: #3b4757;
    }

    .socials a i {
      color: #fff;
      padding: 10px 12px;
      font-size: 20px;
    }

    @media screen and (min-width: 600px) {
      .footer-right > * {
        flex: 1;
      }
      .footer-left {
        flex: 1 0px;
      }
      .footer-right {
        flex: 2 0px;
      }
    }

    @media (max-width: 600px) {
      .footer {
        padding: 15px;
      }
      main {
        font-size: 55px;
      }
    }
  </style>

</head>
<body>

  <!-- Footer Section -->
  <footer class="footer">
    <div class="footer-left">
      <a href="index.php">
        <img src="images/logo.jpg?v=2" alt="Logo"> <!-- Cache-Busted Logo -->
      </a>
      <p>MyWedding is the most suitable place to find the best options for your special occasions.</p>

      <div class="socials">
        <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
        <a href="#"><i class="fa-brands fa-youtube"></i></a>
      </div>
    </div>

    <ul class="footer-right">
      <li>
        <h2>SERVICES</h2>
        <ul class="box">
          <li><a href="#">24/7 Support and Monitoring</a></li>
          <li><a href="#">Best Items</a></li>
          <li><a href="#">Most Applicable</a></li>
        </ul>
      </li>
      <li class="features">
        <h2>Useful Links</h2>
        <ul class="box">
          <li><a href="index.php">Home</a></li>
          <li><a href="display_all.php">Products</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="termscon.php">Terms & Conditions</a></li>
          <li><a href="publish.php">Publish Your Ad</a></li>
        </ul>
      </li>
      <li>
        <h2>CONTACT US</h2>
        <ul class="box">
          <li><a href="#">+94 xx xxx xxxx</a></li>
          <li><a href="#">mywedding@gmail.com</a></li>
        </ul>
      </li>
    </ul>

    <div class="footer-bottom">
      <p>All Rights Reserved by &copy; MyWedding.com</p>
    </div>
  </footer>

</body>
</html>
