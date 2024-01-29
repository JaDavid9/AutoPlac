<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Auto-Plac | Trazi auto</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta content="Author" name="WebThemez">

  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">


  <link href="css/style.css" rel="stylesheet"> 
</head>

<body id="body"> 
 <?php include('includes/header.php');?>
 <section id="innerBanner"> 
  <div class="inner-content">
    <h2><span > <h1 style="color: #ffffff; font-size: 35px;">Pretrazeni rezultati za "<?php echo $_POST['searchdata'];?>"</h1></span><br></h2>
    <div> 
    </div>
  </div> 
</section>

<main id="main">
 
 <section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
            <?php 
              
            $searchdata=$_POST['searchdata'];
            $sql = "SELECT automobili.id from automobili join marka on marka.id=automobili.Marka where automobili.NazivVozila=:search || automobili.Gorivo=:search || marka.Brand=:search || automobili.Godiste=:search";
            $query = $dbh -> prepare($sql);
            $query -> bindParam(':search',$searchdata, PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=$query->rowCount();
            ?>
            <p><span><?php echo htmlentities($cnt);?> Pronadjeno na osnovu pretrage</span></p>
          </div>
        </div>

        <?php 
        $sql = "SELECT automobili.*,marka.Brand,marka.id as bid  from automobili join marka on marka.id=automobili.Marka where automobili.NazivVozila=:search || automobili.Gorivo=:search || marka.Brand=:search || automobili.Godiste=:search";
        $query = $dbh -> prepare($sql);
        $query -> bindParam(':search',$searchdata, PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
          foreach($results as $result)
          {  
            ?>
            <div class="product-listing-m gray-bg" >
              <div class="product-listing-img"><img src="img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="Image" style="width: 380px; height: 250px;" /> </a> 
              </div>
              <div class="product-listing-content">
                <h5><a href="car_details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->Brand);?> , <?php echo htmlentities($result->NazivVozila);?></a></h5>
                <p class="list-price">$<?php echo htmlentities($result->Cena);?> Cena</p>
                <ul>
                  <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->Sedista);?> Sedista</li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->Godiste);?> Godiste</li>
                  <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->Gorivo);?></li>
                </ul>
                <a href="car_details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn" style="background-color: #49a3ff;">Pogledaj detalje <span class="angle_arrow"><i class="fa fa-angle-right" style="color: #49a3ff; "  aria-hidden="true"></i></span></a>
              </div>
            </div>
            <?php 
          }
        } ?>
      </div>

      <aside class="col-md-3 col-md-pull-9">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-car" aria-hidden="true"></i> Skoro postavljen oglas</h5>
          </div>
          <div class="recent_addedcars">
            <ul>
              <?php $sql = "SELECT automobili.*,marka.Brand,marka.id as bid  from automobili join marka on marka.id=automobili.Marka order by id desc limit 4";
              $query = $dbh -> prepare($sql);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              $cnt=1;
              if($query->rowCount() > 0)
              {
                foreach($results as $result)
                {  
                  ?>

                  <li class="gray-bg">
                    <div class="recent_post_img"> <a href="car_details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a> </div>
                    <div class="recent_post_title"> <a href="car_details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->Brand);?> , <?php echo htmlentities($result->NazivVozila);?></a>
                      <p class="widget_price">$<?php echo htmlentities($result->Cena);?> Cena</p>
                    </div>
                  </li>
                  <?php 
                }
              } ?>

            </ul>
          </div>
        </div>
      </aside>
     
    </div>
  </div>
</section>

</main>
<?php include('includes/footer.php');?>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <?php include('includes/login.php');?>
    
    <?php include('includes/registration.php');?>

    <?php include('includes/forgotpassword.php');?>

    <!-- JavaScript  -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/superfish/hoverIntent.js"></script>
    <script src="lib/superfish/superfish.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/magnific-popup/magnific-popup.min.js"></script>
    <script src="lib/sticky/sticky.js"></script> 
    <script src="contact/jqBootstrapValidation.js"></script>
    <script src="contact/contact_me.js"></script>
    <script src="js/main.js"></script>

  </body>
  </html>