<?php

include_once "connect.php";
include_once "include/header.php";


?><div style="border-bottom: 1px solid gray; box-shadow:0px 0px 5px 2px #E1E1E1"><?php
include_once "include/navbar.php";
?></div>


<?php 


if(isset($_GET['news_id']) && !empty($_GET['news_id']))
{
    $ref = getenv("HTTP_REFERER");
    $id = $_GET['news_id'];
    $article = $connect->prepare("SELECT * FROM news WHERE news_id = :id");
    $article->bindParam(":id",$id);
    $article->execute();
    $result = $article->fetch();
    if($article->rowCount() > 0){ ?>


        <div class="container ha-article-cotainer">

            <div class="ha-article-title"><h3><?php echo $result['titre'] ?></h3></div>

            <div class="ha-article-image"><img width="100%" height="400px" src="uploaded/article/<?php echo $result['image'] ?>"></img></div>

            <div class="ha-article-date-category"><small><?php echo $result['date_pub'] ?></small>    &ThinSpace;&ThinSpace;    <span class=" badge-success"><?php echo $result['category'] ?></span></div>

            <div class="ha-article-content"><p><?php echo $result['content'] ?></p></div>

        </div>

        <div class="ha-article-return"><a href="<?php echo $ref ?>">Retour a la page precedent ...</a></div>


    <?php }else{
        header("location:newsletter.php");
    }
    
    
}else{
    $ref = getenv("HTTP_REFERER");
    header("location:$ref");
}



 ?>









<?php
include_once "include/footer.php";
?>

<script src="js/jquery.comjquery-3.5.1.min.js"></script>
<script src="js/bootstrap.js"></script>