<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <style>
    .footer {
      background-color: #2C3531;
      padding: 20px 0;
      text-align: center;
    }

    .footer-content {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .footer p {
      margin: 0;
      font-size: 14px;
      color: #888888;
    }

    .footer-links {
      list-style: none;
      padding: 0;
      margin: 10px 0 0;
    }

    .footer-links li {
      display: inline;
    }

    .footer-links li:not(:last-child) {
      margin-right: 10px;
    }

    .footer-links a {
      color: #888888;
      text-decoration: none;
      font-size: 14px;
    }

    .footer-links a:hover {
      color: #ffffff;
    }

    .company-logo {
      max-width: 100px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <!-- Your website content here -->
  
  <footer class="footer">
    <div class="containerr">
      <div class="footer-content">
        <img class="company-logo" src="../assets/img/sfa-logo.png" alt="FarmEase Logo">
        
        <ul class="footer-links">
          <li><a href="fprofile.php">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="../contact.php">Contact</a></li>
        </ul>
        <p>SMART FARMING ADVISOR</p>
      </div>
    </div>
  </footer>
</body>
</html>