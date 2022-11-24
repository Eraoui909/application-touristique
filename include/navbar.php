

<!--   
  *********************************
  ******* Navbar & Slider *********
  *********************************
   -->
   

<!-- this is navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light ha-navbar">
  <a class="navbar-brand ha-navbar-title" href="http://localhost/mini%20projet/index.php"> <span style="color: #000;">R</span> inho<strong>.</strong> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end ha-right-list" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/mini%20projet/index.php">Accueil</a>
      </li>
      <li class="nav-item" >
        <a class="nav-link" href="http://localhost/mini%20projet/moi.php">Qui somme-nous ? </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#ha-footer">Plan de site</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ha-scroll-to-contact" href="#">Contact</a>
      </li>
      <li class="nav-item">
        
                <?php if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){ ?>
                    <a class="nav-link" href="http://localhost/mini%20projet/login/logout.php">Log Out</a>
                <?php }else{ ?>
                    <a class="nav-link" href="http://localhost/mini%20projet/login/login.php">Log in</a>
                <?php } ?>
                
        
      </li>
      <li class="nav-item ha-join">
        
            <?php if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
                  echo '<a class="nav-link " style="texte-align:center;overflow:hidden;" href="#" tabindex="-1" aria-disabled="true">'.$_SESSION['user_name'].'</a>';
              }else{
                  echo '<a class="nav-link " href="http://localhost/mini%20projet/login/login.php" tabindex="-1" aria-disabled="true">Join</a>';
              }
            ?>
      </li>
    </ul>
  </div>
</nav>