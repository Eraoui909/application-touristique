<?php

include_once "connect.php";
include_once "include/header.php";


?><div style="border-bottom: 1px solid gray; box-shadow:0px 0px 5px 2px #E1E1E1"><?php
include_once "include/navbar.php";
?></div><?php
$slide = $connect->prepare("SELECT * FROM news WHERE approve=1 order by date_pub DESC limit 3");
$slide->execute();
$results = $slide->fetchAll();

$popular = $connect->prepare("SELECT * FROM news WHERE approve=1 order by date_pub DESC limit 4");
$popular->execute();
$populars = $popular->fetchAll();


?>


<div class="container ha-news-l-container">

    <div class="ha-news-slide">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="position: relative;">
                    <img src="uploaded/article/<?php echo $results[0]['image']; ?>" height="400px" class="d-block w-100" alt="...">
                    <h4 class="ha-news-slide-title"><?php echo $results[0]['titre']; ?></4>
                    <span class=" badge-primary ha-news-slide-cat"><?php echo $results[0]['category']; ?></span>
                    <span class=" badge-danger ha-news-slide-breaking">BREAKING NEWS</span>
                </div>
                <div class="carousel-item" style="position: relative;">
                    <img src="uploaded/article/<?php echo $results[1]['image']; ?>" height="400px"  class="d-block w-100" alt="...">
                    <h4 class="ha-news-slide-title"><?php echo $results[1]['titre']; ?></4>
                    <span class=" badge-primary ha-news-slide-cat"><?php echo $results[1]['category']; ?></span>
                    <span class=" badge-danger ha-news-slide-breaking">BREAKING NEWS</span>
                </div>
                <div class="carousel-item" style="position: relative;">
                    <img src="uploaded/article/<?php echo $results[2]['image']; ?>" height="400px"  class="d-block w-100" alt="...">
                    <h4 class="ha-news-slide-title"><?php echo $results[2]['titre']; ?></4>
                    <span class=" badge-primary ha-news-slide-cat"><?php echo $results[2]['category']; ?></span>
                    <span class=" badge-danger ha-news-slide-breaking">BREAKING NEWS</span>
                </div>
            </div>
        </div>
    </div>

    <hr>
        <div>
            <center><h5><strong>Popular</strong></h5></center>
        </div>
    <hr>

    <div class="ha-news-populer">

        <div class="ha-news-populer-article article1">
            <div class="article-popular-img">
                <img src="uploaded/article/<?php echo $populars[0]['image']; ?>" width="230px" height="150px" alt="img popular"></img>
                <span class="badge badge-success article-popular-badge"><?php echo $populars[0]['category']; ?></span>
            </div>
            <div class="article-popular-title">
                <span> <?php echo $populars[0]['titre']; ?> </span>
            </div>
            <small class="article-popular-date"><?php echo $populars[0]['date_pub']; ?></small>
            <div class="article-popular-readmore">
                <center>
                <form method="get" action="news.php">
                    <input type="hidden" name="news_id" value="<?php echo $populars[1]['news_id']; ?>">
                    <input type="submit" class="btn btn-outline-success" value="READ MORE"></input>
                </form>
                </center>
            </div>
        </div>

        <div class="ha-news-populer-article article2">
            <div class="article-popular-img">
                <img src="uploaded/article/<?php echo $populars[1]['image']; ?>" width="230px" height="150px" alt="img popular"></img>
                <span class="badge badge-success article-popular-badge"><?php echo $populars[1]['category']; ?></span>
            </div>
            <div class="article-popular-title">
                <span> <?php echo $populars[1]['titre']; ?> </span>
            </div>
            <small class="article-popular-date"><?php echo $populars[0]['date_pub']; ?></small>
            <div class="article-popular-readmore">
                <center>
                <form method="get" action="news.php">
                    <input type="hidden" name="news_id" value="<?php echo $populars[1]['news_id']; ?>">
                    <input type="submit" class="btn btn-outline-success" value="READ MORE"></input>
                </form>
                </center>
            </div>
        </div>

        <div class="ha-news-populer-article article3">
            <div class="article-popular-img">
                <img src="uploaded/article/<?php echo $populars[2]['image']; ?>" width="230px" height="150px" alt="img popular"></img>
                <span class="badge badge-success article-popular-badge"><?php echo $populars[2]['category']; ?></span>
            </div>
            <div class="article-popular-title">
                <span> <?php echo $populars[2]['titre']; ?> </span>
            </div>
            <small class="article-popular-date"><?php echo $populars[2]['date_pub']; ?></small>
            <div class="article-popular-readmore">
                <center>
                <form method="get" action="news.php">
                    <input type="hidden" name="news_id" value="<?php echo $populars[2]['news_id']; ?>">
                    <input type="submit" class="btn btn-outline-success" value="READ MORE"></input>
                </form>
                </center>
            </div>
        </div>

        <div class="ha-news-populer-article article4">
            <div class="article-popular-img">
                <img src="uploaded/article/<?php echo $populars[3]['image']; ?>" width="230px" height="150px" alt="img popular"></img>
                <span class="badge badge-success article-popular-badge"><?php echo $populars[3]['category']; ?></span>
            </div>
            <div class="article-popular-title">
                <span> <?php echo $populars[3]['titre']; ?> </span>
            </div>
            <small class="article-popular-date"><?php echo $populars[3]['date_pub']; ?></small>
            <div class="article-popular-readmore">
                <center>
                <form method="get" action="news.php">
                    <input type="hidden" name="news_id" value="<?php echo $populars[3]['news_id']; ?>">
                    <input type="submit" class="btn btn-outline-success" value="READ MORE"></input>
                </form>
                </center>
            </div>
        </div>

    </div>


    <!-- showing all article -->

    <hr>
        <div>
            <center><h5><strong>All</strong></h5></center>
        </div>
    <hr>

    <div class="article-all-container">

    <?php
    
    $query = $connect->prepare("SELECT * FROM news WHERE approve=1 order by news_id DESC ");
    $query->execute();
    $resultes = $query->fetchAll();
    
    foreach($resultes as $result){
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

    </div>



</div>


<?php
include_once "include/footer.php";
?>

<script src="js/jquery.comjquery-3.5.1.min.js"></script>
<script src="js/bootstrap.js"></script>

<script>

        fetch("http://newsapi.org/v2/top-headlines?country=ma&apiKey=b417db34c81f4ac88b31550c30f1d404").then(response=>response.json()).then(data=>{
            // console.log(data);
            // document.write(data);
        });

</script>