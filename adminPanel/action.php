<?php

include_once "../connect.php";



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin Panel</title>

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
    <a class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(Rinho)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
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
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="newarticle.php">New Article</a></li>
        <li><a href="allarticles.php">All Articles</a></li>
      </ul>
    </div>
  </div>

  <!-- 
******************************************
**********      content        ***********
****************************************** 
-->

  <div class="ha-admin-container">


  <?php

include_once "../connect.php";


//update news

if(isset($_POST['title']) && !empty($_POST['title']))
    {
            $title      = $_POST['title'];
            $category   = $_POST['category'];
            $desc       = $_POST['desc'];
            $content    = $_POST['content'];
            $current_id = $_POST['news_id'];
            
            $sql = $connect->prepare("UPDATE news
                            SET titre=:titre,description=:descr,content=:content,date_pub=now(),category=:categ,approve=0
                            WHERE news_id=:idd ");
            $sql->bindParam("titre",$title);
            $sql->bindParam("descr",$desc);
            $sql->bindParam("content",$content);
            $sql->bindParam("categ",$category);
            $sql->bindParam("idd",$current_id);

            $sql->execute();

            if($sql->rowCount() > 0){
                echo "<div class=' alert alert-success'>Article updated with success</div>";
                sleep(1.5);
                header("Location:dashboard.php");  
                exit();
            }else{
                echo "<div class=' alert alert-danger'>There is some problem in your information</div>";
            }
    }

?>







<?php
if(isset($_GET['edit'])){ //Edit article
    
    $current_id = $_GET['news_id'];
    $query = $connect->prepare("SELECT * FROM news WHERE news_id=:id");
    $query->bindParam("id",$current_id);
    $query->execute();
    $rows = $query->fetch();
    
    ?>

            <center><h2>Update Article</h2></center>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">

                <div class="new-articl-form">

                    <input type="hidden" name="news_id" value="<?php echo $rows['news_id']; ?>"></input>

                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="<?php echo $rows['titre']; ?>"></input>

                    <label for="desc" >Description</label>
                    <input type="text"  id="desc" name="desc" value="<?php echo $rows['description']; ?>"></input>

                    <label for="content">Content</label>
                    <textarea rows="5"  id="content" name="content" ><?php echo $rows['content']; ?></textarea>

                    <label for="category">Category</label>
                    <select id="category" name="category">
                        <option <?php if($rows['content'] == "Sport") {echo "selected";} ?> >Sport</option>
                        <option <?php if($rows['content'] == "Economie") {echo "selected";} ?>>Economie</option>
                        <option <?php if($rows['content'] == "Histoire") {echo "selected";} ?>>Histoire</option>
                        <option <?php if($rows['content'] == "Politique") {echo "selected";} ?>>Politique</option>
                        <option <?php if($rows['content'] == "Art") {echo "selected";} ?>>Art</option>
                        <option <?php if($rows['content'] == "Culture") {echo "selected";} ?>>Culture</option>
                        <option <?php if($rows['content'] == "Technologie") {echo "selected";} ?>>Technologie</option>
                        <option <?php if($rows['content'] == "E-commerce") {echo "selected";} ?>>E-commerce</option>
                        <option <?php if($rows['content'] == "E-sport") {echo "selected";} ?>>E-sport</option>
                        <option <?php if($rows['content'] == "E-learning") {echo "selected";} ?>>E-learning</option>
                    </select>

                    <label for="image">Image</label>
                    <img src="../uploaded/article/<?php echo $rows['image']; ?>" width="200px" height="150px">

                    <input class="btn btn-primary newarticle-btn" type="submit" value="Update Article">
                </div>
                
            </form>
    
    
    <?php



  /* end of Edite article */}elseif(isset($_GET['delete'])){//Delete article


    $query = $connect->prepare("DELETE FROM news WHERE news_id=:id");
    $current_id = $_GET['news_id'];
    $query->bindParam("id",$current_id);
    if($query->execute());
    header("Location:dashboard.php");      
    exit(); 


  /* end of delete article */}elseif(isset($_GET['approve'])){ //approve article
    $query = $connect->prepare("UPDATE news SET approve=1 WHERE news_id = :id");
    $current_id = $_GET['news_id'];
    $query->bindParam("id",$current_id);
    if($query->execute())
    header("Location:dashboard.php");      
    exit(); 
    
  /* end of approve article */}

?>

</div>





<script src="../js/jquery.comjquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="dashboard.js"></script>
</body>

</html>