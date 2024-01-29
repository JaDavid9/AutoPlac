<header id="header">
  <div class="container">

    <div id="logo" class="pull-left">
     <h1><a href="index.php" id="body" class="scrollto"><span style="color: red;">Auto-</span>Plac</a></h1> 
   </div>
   <div class="pull-left ml-4">
    <!-- SEARCH FORMA -->
    <form class="form-inline "  action="search.php" method="post">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="text"  name="searchdata" placeholder="Trazi auto" aria-label="Search" required="true">
        <div class="input-group-append">
          <button class="btn btn-navbar" style="background-color: #49a3ff;" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </div>

  <nav id="nav-menu-container">
    <ul class="nav-menu">
      <li class="menu-active"><a href="index.php">Home</a></li>
      <li><a href="about.php">O nama</a></li>
      <li><a href="car_list.php">Oglasi</a></li>
      <?php   if(strlen($_SESSION['login'])!=0)
      { 
        ?>
        <?php 
        $email=$_SESSION['login'];
        $sql ="SELECT FullName FROM users WHERE EmailId=:email ";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0)
        {
          foreach($results as $result)
          {
            ?>
            <li class="menu-has-children"><a href=""><?php echo htmlentities($result->FullName);?></a>
              <ul>
                <li><a href="profile.php">Podesavanja profila</a></li>
                <li><a href="postavioglas.html">Postavi oglas</a></li>
                <li><a href="logout.php">Odjavi se</a></li>
              </ul>
            </li>
            <?php 
          }
        }
      } ?>
    </ul>
  </nav>
</div>
  </header>