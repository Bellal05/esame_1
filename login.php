<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['id'])) {
    header("Location: area-riservata.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <title>Accesso - EduTech </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css" />
  <link rel="stylesheet" href="assets/css/templatemo-scholar.css" />
  <link rel="stylesheet" href="assets/css/owl.css" />
  <link rel="stylesheet" href="assets/css/animate.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <style>
    /* LOGIN PAGE CUSTOM STYLE */
#login {
  display: flex;
  align-items: center;
  min-height: 100vh;
  background: linear-gradient(135deg, #6b73ff 0%, #5d61b1 100%);
  color: #fff;
  padding: 60px 0;
}




#login .contact-us-content {
  background: #ffffff;
  padding: 40px;
  border-radius: 16px;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
  color: #333;
}

#login .contact-us-content input,
#login .contact-us-content button {
  width: 100%;
  padding: 12px 15px;
  font-size: 16px;
  margin-bottom: 20px;
  border-radius: 8px;
  border: 1px solid #ddd;
}

#login .contact-us-content input:focus {
  border-color: #6b73ff;
  box-shadow: 0 0 0 2px rgba(107, 115, 255, 0.2);
  outline: none;
}

#login .contact-us-content button {
  background-color: #6b73ff;
  border: none;
  color: #fff;
  font-weight: 600;
  transition: all 0.3s ease;
}

#login .contact-us-content button:hover {
  background-color: #4e55df;
}

#login .contact-us-content a {
  color: #6b73ff;
  text-decoration: none;
}

#login .contact-us-content a:hover {
  text-decoration: underline;
}

#login .text-center p {
  font-size: 14px;
  color: #666;
}
.icon-input {
  position: absolute;
  top: 50%;
  left: 15px;
  transform: translateY(-50%);
  color: #6b73ff;
  font-size: 18px;
  z-index: 2;
}

.contact-us-content input.form-control {
  padding-left: 45px;
  background-color: #f8f9fa;
  border: 1px solid #ccc;
  transition: border-color 0.3s;
}

.contact-us-content input.form-control:focus {
  border-color: #6b73ff;
  box-shadow: 0 0 0 3px rgba(107, 115, 255, 0.2);
}

.btn-primary {
  background-color: #6b73ff;
  border: none;
  transition: background-color 0.3s ease;
}

.btn-primary:hover {
  background-color: #4e55df;
}
#login .section-heading {
  text-align: left;
  color: #fff;
  padding: 40px;
}

#login .section-heading h6 {
  color: #ddd;
  font-weight: 500;
  font-size: 18px;
  letter-spacing: 1px;
  text-transform: uppercase;
}

#login .section-heading h2 {
  font-size: 42px;
  font-weight: 800;
  line-height: 1.2;
  margin-bottom: 20px;
}

#login .section-heading p {
  font-size: 18px;
  color: #eaeaea;
  max-width: 480px;
  line-height: 1.5;
}



  </style>
</head>

<body>
  <div id="login">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center mb-5">
        <div class="section-heading">
          <h6 class="text-light">Area Riservata</h6>
          <h2 class="text-white fw-bold">Accedi al tuo account</h2>
          <p class="text-light">Inserisci le tue credenziali per accedere alla piattaforma formativa di EduTech .</p>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="contact-us-content">
          <form id="login-form" action="splash.php" method="post">
            <h5 class="text-danger text-center mb-3">
              <?php
                
                if (isset($_SESSION['login_status'])) {
                    echo htmlspecialchars($_SESSION['login_status']);
                    unset($_SESSION['login_status']); 
                }
              ?>
            </h5>
            <div class="form-group mb-3 position-relative">
              <i class="fa fa-envelope icon-input"></i>
              <input type="email" class="form-control ps-5" name="email" id="email" placeholder="Email" required />
            </div>
            <div class="form-group mb-3 position-relative">
              <i class="fa fa-lock icon-input"></i>
              <input type="password" class="form-control ps-5" name="password" id="password" placeholder="Password" required />
            </div>
            <div class="form-group">
              <button type="submit" class="btn w-100 btn-primary fw-bold py-2">Accedi</button>
            </div>
            <div class="text-center mt-3">
              <p>Non hai un account? <a href="register.html">Registrati</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

</html>
