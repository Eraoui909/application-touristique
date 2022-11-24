<?php

  include_once "../connect.php"

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin Panel</title>
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
********** grid sustem content ***********
****************************************** 
-->

  <?php
  
  $sql = $connect->prepare("SELECT count(*) FROM users");
  $sql->execute();
  $users = $sql->fetch();
  
  ?>

  <div class="ha-admin-container">
    <div class="conatiner">

      <div class="row">

        <div class="col-3">
          <div class="statistic stat-users">
            <div class="row">
              <div class="col-4"><img src="../svgs/png/039-user.png" width="56px" height="55px"></div>
              <div class="col-8">
                <p>users</p>
                <span><?php echo $users[0];  ?></span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-3">
          <div class="statistic stat-artice">
            <div class="row">
              <div class="col-4"><img src="../svgs/png/010-contacts.png" width="56px" height="55px"></div>
              <div class="col-8">
                <p>Article active</p>
                <span>
                  <?php 
                    $query = $connect->prepare("SELECT count(*) FROM news WHERE approve=1");
                    $query->execute();
                    $result = $query->fetch();
                    echo $result[0];
                  ?>
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-3">
          <div class="statistic stat-article-process">
            <div class="row">
              <div class="col-4"><img src="../svgs/png/004-folder.png" width="56px" height="55px"></div>
              <div class="col-8">
                <p>Article en attente</p>
                <span>
                <?php 
                    $query = $connect->prepare("SELECT count(*) FROM news WHERE approve=0");
                    $query->execute();
                    $result = $query->fetch();
                    echo $result[0];
                  ?>
                </span>
              </div>
            </div>
          </div>
        </div>

        <?php
  
          $sql = $connect->prepare("SELECT count(*) FROM comments");
          $sql->execute();
          $cmnts = $sql->fetch();
          
        ?>

        <div class="col-3">
          <div class="statistic stat-cmnt">
            <div class="row">
              <div class="col-4"><img src="../svgs/mysvgs/comments.png" width="56px" height="55px"></div>
              <div class="col-8">
                <p>commentaire</p>
                <span><?php echo $cmnts[0];  ?></span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- 
    **************************************
    **** ADD ARTICLE
    ************************************** 
    -->


    <div class="container add-articl">
      <div class="add-btn">
        <button class="btn btn-primary"><a href="newarticle.php">ADD Article +</a></button>
      </div>
      <div class="latest-article">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 

            $query = $connect->prepare("SELECT * FROM news order by date_pub DESC");
            $query->execute();
            $result = $query->fetchAll();
            $j = $query->rowCount();
            $i = 0;
            foreach($result as $row){
              if($i == 2 ){ break; } 
            ?>
              <tr>
                <th scope="row"><?php echo $row['news_id']; ?></th>
                <td style="width:200px"><?php echo $row['titre']; ?></td>
                <td style="width:330px"><?php echo $row['description']; ?></td>
                <td><?php echo $row['date_pub']; ?></td>
                <td>
                  <form method="get" action="action.php">
                    <input type="hidden"  name="news_id" value="<?php echo $row['news_id']; ?>">
                    <input type="submit" class="btn btn-success" name="edit" value="Edit">
                    <input type="submit" class="btn btn-danger delete-confirm" name="delete" value="Delete">
                    <?php if($row['approve'] == 0) {echo '<input type="submit" class="btn btn-primary" name="approve" value="Approve">'; } ?>
                  </form>
                </td>
              </tr>
            <?php $i++; }
            
              
            
            ?>
          </tbody>
        </table>
        <?php if($j > 2){
          echo "<a href='allarticles.php'>show all articles...</a>";
        } ?>
      </div>
    </div>


<!-- 
**************************************
**** Sent email to users
************************************** 
-->

<div class="container ha-sent-email" >

        <span class="alert alert-info"> Envoyer la dernier article aux membres de <strong>newsLetter</strong></span>
        <button class="btn btn-info">
          <a href="sentNews.php" style="color: white;">Sent Now</a>
        </button>

</div>

<!-- 
**************************************
**** show users
************************************** 
-->

    <?php
      $sql = $connect->prepare("SELECT * FROM users");
      $sql->execute();
      $users = $sql->fetchAll();    
    ?>

    <div class="container showing-users">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <?php foreach($users as $user){ ?>
          <tbody>
            <tr>
              <td><?php echo $user['user_name']; ?></td>
              <td><?php echo $user['user_name']; ?></td>
              <td><?php echo $user['user_inscri_date']; ?></td>
              <th>
                <button class="btn btn-success">Edit</button>
                <button class="btn btn-danger">Delete</button>
              </th>
            </tr>
          </tbody>
          <?php } ?>
      </table>
      
    
    </div>


  </div>


  <script src="../js/jquery.comjquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="dashboard.js"></script>
</body>

</html>