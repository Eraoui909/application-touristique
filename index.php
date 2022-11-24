<?php 

require_once "include/functions.php";
require_once "connect.php";
session_start();

global $errors;
global $stars;
if(isset($_POST['star'])){
    $stars =  $_POST['star'];
}else{
  // echo "there is no post";
}




  if(isset($_POST['comment']) && !empty($_POST['comment'])){

    $cmnt = filter_var($_POST['comment'] , FILTER_SANITIZE_STRING);
    $stars = $_POST['rate'];


    $stmt = $connect->prepare("INSERT INTO `comments`(`cmnt_content`, `cmnt_date`, `cmnt_time`, `cmnt_star`, `cmnt_user_id`) 
    VALUES (:cmnt,CURRENT_DATE(),CURRENT_TIME(),:star,:user)");
    $stmt->bindParam(":cmnt" , $cmnt);
    $stmt->bindParam(":user" , $_SESSION['user_id']);
    $stmt->bindParam(":star" , $stars);

    $stmt->execute();

  }

  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rinho</title>
    <link rel="icon" href="http://localhost/mini%20projet/svgs/mysvgs/log2.png">
    <link rel="stylesheet" href="css/bootstrap4.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="slideLeft/slideLeft.css">
    
    

</head>
<body class="body">

  <!--   
  *********************************
  ******* Global popUps   *********
  *********************************
   -->
<?php if(isset($_SESSION['user_id'])){ ?>
  <div class="ha-rating-popup active">
    <span class="close" >X</span>
    <div class="pop-up-container">
      <img src="svgs/mysvgs/success.png" width="90px" height="90px" alt="">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <p >thank you for your trust</p>
          <textarea name="comment"  cols="30" rows="10" placeholder="Set your opinion about our service..."></textarea>
          <div id="rate"></div>
          <input type="submit" <?php  ?> style="display: block;" class="btn btn-primary"  value="Add Your Opinion">
        </form>
    </div>
  </div> 
<?php }else{ 

   $cmnt_star_error = '<div class="alert alert-danger">You need to <a href="login/login.php" style="color: #3f51b5;">Sign in</a> for set your comment</div>';

} ?>

  <!--   
  *********************************
  *******    Slide Left   *********
  *********************************
   -->

   <?php include "slideLeft/slideLeft.php" ?>
  <!--   
  *********************************
  ******* Navbar & Slider *********
  *********************************
   -->
  <div class="ha-slider-container">

    <!-- this is navbar -->
     <?php include "include/navbar.php"; ?> 

    <!-- this is slider -->

    <?php
    
    if(isset($_POST['email_inter']) && !empty($_POST["email_inter"]))
    {
      if(isset($_SESSION['user_id'])){

        $user_id = $_SESSION['user_id'];
        $users = $connect->prepare("SELECT * FROM users WHERE user_id=:user_id");
        $users->bindParam("user_id" , $user_id);
        $users->execute();
        $user = $users->fetch();

        $email_int = filter_var($_POST['email_inter'] , FILTER_SANITIZE_EMAIL);

        $query = $connect->prepare("INSERT INTO `internaute`(`nom_inter`, `prenom_inter`, `email_inter`)
                  VALUES(:nom,:prenom,:email)");
        $name = $user['user_name'];
        $query->bindParam(":nom" , $name);
        $query->bindParam(":prenom" , $name);
        $query->bindParam(":email" , $email_int);

        $query->execute();

        if($query->rowCount() > 0){
          successMsg("Votre inscription a été éfectué");
        }else{
          errorMsg("there is a promblem in your email");
        }



      }else{
        errorMsg("You need to Sign in first");
      }
    }
    
    ?>

    <div class="ha-slider-form">

      <h1>Inscrivez  Vous Maintenant Dans La NewsLetter</h1>

      <form class="ha-form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

        <div class="row">
          <div class="col-8">
            <input type="email" name="email_inter" style="width: 100%; line-height:33px;" autocomplete="on" placeholder="Votre Addresse &quot;Email&quot;">
          </div>
          <div class="col-4">
            <input type="submit" class="btn btn-success" style="background-color: #3dd676;transform: scale(1.4);font-size:15px;" width="100px" value="Submit Now"></input>
          </div>
        </div>
      </form>
      

      <article>Popular : 
        <span>  Monument</span>
        <span> Nouvelles</span>
        <span> Festivales</span>
        <span> Music</span>
      </article>

      
    </div>
    <div class="ha-slider-popup"></div>

    

  </div>
   <!--   
  *********************************
  ********* Partners ************
  *********************************
   -->

  <div class="ha-partner">
    <ul>
      <li><a href="#">#</a></li>
      <li><a href="#">#</a></li>
      <li><a href="#">#</a></li>
    </ul>
  </div>

    <!--   
  *********************************
  ********* News Letter***********
  *********************************
   -->

   
   <div class="newsletter">

    <div class="ha-newsletter-title"> <h1>À la une</h1> </div>

    <?php
    
    $query = $connect->prepare("SELECT * FROM news WHERE approve=1 order by news_id DESC limit 3");
    $query->execute();
    $results = $query->fetchAll();
    
    foreach($results as $result){
    ?>

    <div class="container ha-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-3">
            <div class="ha-news-img">
              <img src="uploaded/article/<?php echo $result['image'] ?>" width="200px" height="200px"></img>
              <span class="badge-success ha-news-badge" ><?php echo $result['category'] ?></span>
            </div>
          </div>
          <div class="col-9">
            <div class="ha-news-title"> <h4><?php echo $result['titre'] ?></h4> </div>
            <div class="ha-news-date"><?php echo $result['date_pub'] ?></div>
            <div class="ha-news-desc">
              <p><?php echo $result['description'] ?></p>
            </div>
            <form method="get" action="news.php">
                    <input type="hidden" name="news_id" value="<?php echo $result['news_id']; ?>">
                    <input type="submit" class="ha-news-read-more" value="READ MORE"></input>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>

    <div class="ha-news-all"><a href="newsletter.php" style="color: #2196F3;">Toutes les news...</a></div>
  </div>


    <hr>

  <!--   
  *********************************
  ********* Le maroc   r***********
  *********************************
   -->

   <div class=" container ha-maroc">

   <div class="ha-def">
    
    <h1>Présentation du pays</h1>

    <h5>
      <p>Nom officiel : Royaume du Maroc</p>
      <p>Nature du régime : Monarchie constitutionnelle</p>
      <p>Chef de l’Etat : le Roi Mohammed VI (intronisé le 30 juillet 1999)</p>
      <p>Chef de gouvernement : M. Saad Eddine El Othmani (nommé depuis le 5 avril 2017)</p>
    </h5>
    <p>Superficie : 710 850 km²</p>
    <p>Capitale : Rabat</p>
    <p>Population : plus de 40 millions d’habitants</p>

</p>
  </div>
   <div class="ha-video">
     <video src="svgs/morocco/morocco.mp4"  autoplay loop controls muted width="110%"></video>
   </div>

   </div>



  <!--   
  *********************************
  ********* Contact Us ************
  *********************************
   -->


      <?php include_once "contact.php"; ?>


   <!--   
  *********************************
  *********    Rating  ************
  *********************************
   -->

   <div class="ha-rating">

    
    <div class="ha-rating-title">Reviews</div>

    <div class="ha-rating-start"> 
      <img src="svgs/mysvgs/star--v1.png" onclick="datastar('1')" class="ha-sta" width="60px" height="60px" data-star="1">
      <img src="svgs/mysvgs/star--v1.png" onclick="datastar('2')" class="ha-sta" width="60px" height="60px" data-star="2">
      <img src="svgs/mysvgs/star--v1.png" onclick="datastar('3')" class="ha-sta" width="60px" height="60px" data-star="3">
      <img src="svgs/mysvgs/star--v1.png" onclick="datastar('4')" class="ha-sta" width="60px" height="60px" data-star="4">
      <img src="svgs/mysvgs/star--v1.png" onclick="datastar('5')" class="ha-sta" width="60px" height="60px" data-star="5">
    </div>
    <?php if(!empty($cmnt_star_error)){
        echo $cmnt_star_error;
    }; ?>
<hr>
    <div class="ha-rating-comnt-container">

    <?php
        $sql = $connect->prepare("SELECT DISTINCT * FROM comments c, users u WHERE u.user_id = c.cmnt_user_id ORDER BY c.cmnt_date DESC,c.cmnt_time DESC");
        $sql->execute();
        $cmnts = $sql->fetchAll();
        if($sql->rowCount()> 0){

          $empty_stars = "svgs/mysvgs/star--v1.png";
          $gold_stars = "svgs/mysvgs/pngegg.png";

          foreach($cmnts as $cmnt)
          {
            ?>
            <div class="ha-rating-comments">
                <div class="pop-up-cmnt"></div>
                <div class="ha-rating-user">
                  <img src="svgs/mysvgs/user-img.png" height="50px" width="50px" style="border-radius: 50%;" class="user-img">
                  <span class="user-name"><?php echo $cmnt['user_name']; ?></span>
                </div>

                <div class="ha-rating-stars-date">
                  <div class="ha-rating-start">
                    <?php
                      for($i=0;$i<$cmnt['cmnt_star'];$i++){
                        echo '<img src="svgs/mysvgs/pngegg.png" class="ha-sta" width="15px" height="15px" alt="">';
                      };
                      for($i=0;$i<5-$cmnt['cmnt_star'];$i++){
                        echo '<img src="svgs/mysvgs/star--v1.png" class="ha-sta" width="15px" height="15px" alt="">';
                      };
                    ?>
                    
                    
                    
                  </div>
                  <span class="ha-rating-date"><?php echo $cmnt['cmnt_date'] . " ". $cmnt['cmnt_time']; ?></span>
                </div>

                <div class="ha-rating-content">
                  <p><?php echo $cmnt['cmnt_content']; ?></p>
                </div>
            </div>


          <?php 
          }

        }

    ?>

        
    
    </div>

<hr>

   <!--   
  *********************************
  *********    Footer  ************
  *********************************
   -->

   <?php include_once "include/footer.php" ?>

    <script src="js/jquery.comjquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/style.js"></script>
    <script src="slideLeft/slideLeft.js"></script>
    <script>
        function datastar(stars){
                      var hr = new XMLHttpRequest();
                      var url = "demo.php";
                      //var site=document.getElementById('site').value;
        
                        var vars = "rate="+stars;
                        hr.open("POST", url, true);
                        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                hr.onreadystatechange = function() {
                  console.log(hr);

                  if(hr.readyState == 4 && hr.status == 200) {
                      
                      var return_data = '';
                      return_data = hr.responseText;
                      document.getElementById("rate").innerHTML = return_data;
      
                        }
                }
              // Send the data to PHP now... and wait for response to update the status div
              hr.send(vars); // Actually execute the request
              document.getElementById("rate").innerHTML = "";
      }

</script>
</body>
</html>