<?php

      include_once "../connect.php";

      
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Article</title>
  <link rel="icon" href="http://localhost/mini%20projet/svgs/mysvgs/log2.png">

  <link rel="stylesheet" href="../css/bootstrap4.css">
  <link rel="stylesheet" href="dashboard.css">
</head>

<body>


  <!-- 
********************************
********* NavBar ***************
******************************** 
-->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ha-navbar">
    <a class="navbar-brand" href="http://localhost/mini projet/">Rinho</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="http://localhost/mini projet/">Home <span class="sr-only">(Rinho)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/mini projet/newsletter.php">News Letter</a>
        </li>
      </ul>

    </div>
  </nav>

  <!-- 
********************************
********* SlideLeft ************
******************************** 
-->

<div class="ha-container-slide">

<div class="slideLeft">
  <ul>
    <li><img src="../svgs/png/001-system.png" width="25px" height="25px"><a href="dashboard.php">Dashboard</a></li>
    <li><img src="../svgs/png/023-sign form.png" width="25px" height="25px"><a href="newarticle.php">New Article</a></li>
    <li><img src="../svgs/png/010-contacts.png" width="25px" height="25px"><a href="allarticles.php">All Articles</a></li>
  </ul>
</div>
</div>

  <!-- 
******************************************
**********      content        ***********
****************************************** 
-->

  <div class="ha-admin-container">
    
      <!-- 
        ******************************************
        ********** grid sustem content ***********
        ****************************************** 
      -->

      <?php

        if(isset($_POST['title'])){
            $title      = $_POST['title'];
            $category   = $_POST['category'];
            $desc       = $_POST['desc'];
            $content    = $_POST['content'];

            $imgName    = $_FILES['image']['name'];
            $imgSize    = $_FILES['image']['size'];
            $imgTmp     = $_FILES['image']['tmp_name'];
            $imgType    = $_FILES['image']['type'];


            $imageFullDir = rand(100,1000000)."_".$imgName;

            move_uploaded_file($imgTmp,"../uploaded/article//".$imageFullDir);

            if($imgSize < 1000000 && !empty($imgName)){
            
            $sql = $connect->prepare("INSERT INTO `news`(`titre`, `description`, `content`, `date_pub`, `category`,`image`) 
                                        VALUES(:titre,:descr,:content,now(),:categ,:img) ");
            $sql->bindParam("titre",$title);
            $sql->bindParam("descr",$desc);
            $sql->bindParam("content",$content);
            $sql->bindParam("categ",$category);
            $sql->bindParam("img",$imageFullDir);

            $sql->execute();

            if($sql->rowCount() > 0){
                echo "<div class=' alert alert-success'>Article added with success</div>";
                header('Refresh: 2; URL=dashboard.php');

            }else{
                echo "<div class=' alert alert-danger'>There is some problem in your information</div>";
            }

            }else{
                echo "<div class=' alert alert-danger'>la taille maximal est <strong>4mb</strong></div>";
            }

        }
      
      ?>

      <div class="new-articl">
            <center><h2>New Article</h2></center>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">

                <div class="new-articl-form">

                    <label for="title">Title</label>
                    <input type="text" id="title" name="title"></input>

                    <label for="desc" >Description</label>
                    <input type="text"  id="desc" name="desc"></input>

                    <label for="content">Content</label>
                    <textarea rows="5"  id="content" name="content"></textarea>

                    <label for="category">Category</label>
                    <select id="category" name="category">
                        <option>Sport</option>
                        <option>Economie</option>
                        <option>Histoire</option>
                        <option >Politique</option>
                        <option >Art</option>
                        <option >Culture</option>
                        <option >Technologie</option>
                        <option >E-commerce</option>
                        <option >E-sport</option>
                        <option >E-learning</option>
                    </select>

                    <label for="image">Image</label>
                    <input id="image" name="image" type="file"></input>

                    <input class="btn btn-primary newarticle-btn" type="submit" value="ADD News">
                </div>
                
            </form>

      </div>

  </div>





  <script src="../js/jquery.comjquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="dashboard.js"></script>
</body>

</html>