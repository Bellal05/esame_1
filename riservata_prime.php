<?php
require 'db_conn.php';
session_start();
if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit;
}
$sql = "SELECT 
    *
FROM 
    lezioni 
";
$result = $conn->query($sql);
?>
<?php include 'header.php'; ?>

<style>
  @media (max-width: 992px) {
    .main-banner {
        padding-top: 0px; 
    }
}
.welcome-banner {
  border-bottom: 5px solid #fff;
}
</style>
<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <h1>EduTech </h1>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Serach Start ***** -->
            <div class="search-input">
              <form id="search" action="#">
                <input type="text" placeholder="Cerca..." id='searchText' name="searchKeyword" onkeypress="handle" />
                <i class="fa fa-search"></i>
              </form>
            </div>
            <!-- ***** Serach Start ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="logout.php" class="active"> ⤷ Logout</a></li>
              </li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner" id="top" style=" background: linear-gradient(135deg, #471166ff, #5d61b1); padding: 0px 0px 120px;}">
  </div>

 <div class="welcome-banner text-center py-5">
  <div class="container">
    <h1 class="display-5 text-purple">Benvenuto, <span class="text-warning"><?php echo htmlspecialchars($_SESSION['nome']); ?></span></h1>
    <p class="lead text-dark mt-2">Accedi alla tua area riservata e gestisci i tuoi contenuti</p>
  </div>
</div>
  <div class="contact-us section" id="contact">

    <div class="container">
      <div class="row">
        <div class="col-lg-6  align-self-center">
          <div class="section-heading">
            <h6>Contact Us</h6>
            <h2>Feel free to contact us anytime</h2>
            <p>Thank you for choosing our templates. We provide you best CSS templates at absolutely 100% free of
              charge. You may support us by sharing our website to your friends.</p>
            <div class="special-offer">
              <span class="offer">off<br><em>50%</em></span>
              <h6>Valide: <em>24 April 2036</em></h6>
              <h4>Special Offer <em>50%</em> OFF!</h4>
              <a href="#"><i class="fa fa-angle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-us-content">
            <form id="contact-form" action="ai.php" method="post">
              <div class="row">
                <div class="col-lg-12">
                  <fieldset>
                    <input type="text" name="nome" id="name" placeholder="Nome..." required>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <input type="text" name="materia" id="materia" placeholder="Fisica, Matematica, etc..."
                      required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <input type="text" name="lezione" id="lezione" placeholder="Gravità, pressione etc..."
                      required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="orange-button">Genere lezione</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid" style="padding-top:30px">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color: purple;">Tabella Domande</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Materia</th>
                                            <th>Lezione</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['nome'] . "</td>";
                                                echo "<td>" . $row['materia'] . "</td>";
                                                echo "<td>" . $row['lezione'] . "</td>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='7'>Nessun lezione registrara</td></tr>";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
<?php include 'footer.php'; ?>
