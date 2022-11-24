
<div class="ha-slide-left">

    <div class="ha-slide-title"> <div class="slidePoint"> *</div> <a href="#"><span><strong>R</strong>inho<strong>.</strong></span></a> </div>
<hr>
    <div class="ha-slide-list">
        <ul>
            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_email'] == "admin@rinh.o" ){ ?>
                <li>
                    <img src="http://localhost/mini%20projet/svgs/solar-panel.svg" style="margin:0px 15px;" width="20px;height:20px;">
                    <a href="http://localhost/mini%20projet/adminPanel/dashboard.php">Admin Panel</a>
                </li>
            <?php } ?>

            <li> 
            <img src="http://localhost/mini%20projet/svgs/newspaper.svg" style="margin:0px 15px;" width="20px;height:20px;">
                <a href="http://localhost/mini%20projet/newsletter.php">News Letter</a>
            </li>
            <li> 
                <img src="http://localhost/mini%20projet/svgs/sitemap.svg" style="margin:0px 15px;" width="20px;height:20px;">
                <a href="http://localhost/mini%20projet/slideLeft/monument.php"> Sites et Monuments</a>
            </li>
            <li> 
                <img src="http://localhost/mini%20projet/svgs/city.svg" style="margin:0px 15px;" width="20px;height:20px;">
                <a href="http://localhost/mini%20projet/slideLeft/indexVilles.php"> Index des villes</a>
            </li>
            <li> 
                <img src="http://localhost/mini%20projet/svgs/map.svg" style="margin:0px 15px;" width="20px;height:20px;">
                <a href="http://localhost/mini%20projet/slideLeft/map.php">Google map</a>
            </li>
            <li> 
                <img src="http://localhost/mini%20projet/svgs/link.svg" style="margin:0px 15px;" width="20px;height:20px;">
                Liens utiles
            </li>
        </ul>
    </div>

</div>