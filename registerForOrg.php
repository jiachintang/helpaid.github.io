<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Organization Registration</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="HELPaid.ico" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
  
<body>
  <div class="wrap">
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container-fluid d-flex align-items-center justify-content-between">
  
          <div class="logo">
            <h1 class="text-light"><a href="index.html"><span>HELP Aid</span></a></h1>
          </div>
  
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto active" href="#main">Organization Registration</a></li>
              <li><a class="nav-link scrollto" href="admin.html">Representative Registration</a></li>
              <li><a class="nav-link scrollto" href="index.html">Logout</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">
      <section class="inner-page">
        <h2 class="text-center">Register Organization</h2>
        <div class="container">
          <div class="card center-form">
            <div class="card-body">

            <?php
              //create database connection
              require('dbconnect.php');

              $org_name = $_POST["name"];
	            $org_address = $_POST["address"];

              // Do not register if organization already exists
              $sqlQuery = "select name from org";
              $flag = 0;
              // Execute Query
              $ret = $con->query($sqlQuery);
              if($ret == TRUE) {
                while ( $row = $ret->fetch_assoc() )
                {
                  if($org_name == $row["name"])
                    $flag = 1; // org already exists in the database
                }

              }
              else
                echo " Query execution not successful";
              if ($flag == 1 ) {
                echo " Organisation " . $org_name . " already registered";

              } else {
              // Formulate query
                $sqlQuery = "insert into org (name,address) values ('$org_name','$org_address')";

                // Execute Query
                $ret = $con->query($sqlQuery);
                if($ret == TRUE)
                  echo " One row inserted successfully";
                else
                  echo " Query execution not successful";
              }
              
              if ($con->query($sqlQuery) === TRUE) {
                echo "New organisation inserted successfully";
              } else {
                echo "Error: " . $sqlQuery . "<br>" . $con->error;
              }
              $con->close();
              ?>
            <form method="post" id="orgForm" class="mt-4" action="registerForOrg.php" >
              <div class="row">
                <div class="col-3 form-group">
                  <label for="orgName" class="control-label">Organization Name: </label>
                </div>
                <div class="col-9">
                  <input type="text" name="orgName" class="form-control" id="name">
                </div>
              </div>
              
              <div class="row">
                <div class="col-3 form-group">
                  <label for="orgAddress" class="control-label">Address: </label>
                </div>
                <div class="col-9 form-group">
                  <textarea class="form-control" name="address" id="address" ></textarea>
                </div>
              </div>
              
              <div class="row">
                <div class="form-group mt-3 mt-md-0">
                  <input type="submit" value="Submit" class="btn btn-default float-end">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="footer-contact">
              <h3>HELP Aid</h3>
              <p>
                1 Jalan Pjs 11/15 Bandar Sunway <br>
                Petaling Jaya, Selangor 46150<br>
                Malaysia <br><br>
                <strong>Phone:</strong> +60 1134 2322<br>
                <strong>Email:</strong> helpaid@support.com<br>
              </p>
            </div>

          </div>

          <div class="row">
            <div class="social-links mt-3 text-center">
              <a href="https://www.twitter.com" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="container py-4">
        <div class="copyright">
          &copy; Copyright <strong><span>HELP Aid</span></strong>. All Rights Reserved
        </div>
      </div>
    </footer><!-- End Footer -->

  </div>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Bootstrap javascript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!--Register organization form validation-->
  <script>
    const orgForm = document.getElementById("orgForm");

    orgForm.addEventListener("submit", (e) => {
      e.preventDefault();
      if(validateOrgForm() == true){
        alert("Organization has been registered successfully!");
        orgForm.reset();
      }
    });

    function validateOrgForm(){
      let orgName = orgForm.orgName.value;
      let address = orgForm.address.value;

      if(orgName == ""){
        alert("Please fill in the organization name!");
        return false;
      }
      else if(address == ""){
        alert("Please fill in the address!");
        return false;
      }
      else{
        return true;
      }
    }
  </script>
  
</body>


</html>