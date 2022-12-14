
<?php 
    include_once "../connect.php";
    session_start();
    global $chemin ;
    $chemin = "../";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monuments</title>
    <link rel="icon" href="http://localhost/mini%20projet/svgs/mysvgs/log2.png">
    <link rel="stylesheet" href="../css/bootstrap4.css">
    <link rel="stylesheet" href="../css/style.css">

    <style>
        body{
            height: 1000px;
            background-color: #EEE;
        }
        .ha-nav-background{
            background-color: #333;
        }

        .ha-monument{
            padding: 15px;
            
            
        }

        .ha-monument .monument{
            margin: 20px auto;
            position: relative;
            background-color: #fff;
            width: 90%;
            display: flex;
        }

        .ha-monument .monument .ha-show{
            width: 70%;
            padding: 10px;
        }
        .ha-monument .monument .ha-show .ha-mon-title{
            padding: 15px;
        }
        .ha-monument .monument .ha-show .ha-mon-date{
            margin-top: 7px;
            padding: 3px 10px;
            width: fit-content;
            border-radius: 3px;
            background-color: #AF001E;
        }
        .ha-monument .monument .ha-show .ha-mon-content{
            width: 90%;
            padding: 15px;
            background-color: #F5F5F5;
            margin: 10px 1px;
        }
        .ha-monument .monument .ha-show .ha-mon-auther{
            padding: 15px;
        }

        .ha-monument .monument .ha-next{
            width: 30%;
            padding: 10px;
            border-left: 1px solid #dedede;
            margin: 5px 0px;
            text-align: center; 
            
        }
        .ha-monument .monument .ha-next .ha-title{
            padding: 15px 8px;
            font-size: 15px;
        }

        .ha-monument .monument .ha-next .ha-slide-card{
            position: relative;
            padding: 10px;
            width: 230px;
        }
        .ha-monument .monument .ha-next .ha-card{
            position: relative;
            background-color: #F5F5F5;
            box-shadow: 0px 0px 4px 4px #EEE;
            height: 400px;
            padding: 10px;
            cursor: pointer;
            width: 120%;
        }
        .showing{
            display: none;
        }
        .ha-monument .monument .ha-next .ha-card .ha-card-title{
            padding: 15px;
        }
        .ha-monument .monument .ha-next .ha-card .ha-card-date{
            margin-top: 7px;
            padding: 1px 4px;
            width: fit-content;
            border-radius: 3px;
            background-color: #AF001E; 
        }
        .ha-monument .monument .ha-next .ha-card .ha-card-subtitle{
            padding: 15px;
            white-space: pre-wrap;
        }

        .ha-myslide{
            width: 100%;
            display: flex;
            justify-content: space-around;
        }
        .ha-myslide .ha-myslide-circle{
            content: " ";
            width: 10px;
            height: 10px;
            border-radius: 50%;
            border: 1px solid #AF001E;
            position: relative;
            top: 21px;
            cursor: pointer;
        }
        .ha-myslide .clicked{
            background-color:#AF001E ;
        }
        .ha-myslide .ha-myslide-left, .ha-myslide .ha-myslide-right{
            background-color: transparent;
            border: none;
            position: relative;
            top: 12px;
            color: #AF001E;
        }
        .ha-myslide .ha-myslide-left:hover, .ha-myslide .ha-myslide-right:hover{
            transform: scale(1.5);
            transition-duration: 0.3s;
        }

    </style>
</head>

<body>

    
    <div class="ha-nav-background"><?php include "../include/navbar.php"; ?></div>

    <div class="hedar-img">
        <img src="../svgs/morocco/archive.png" width="100%" height="150px">
    </div>

    <div class="container ha-monument">


            <div class="container monument">
                <!-- -----------------show monument information------------------- -->
                <div class="ha-show card4"> 
                    <div class="ha-mon-title"> <h2>Marche verte au Maroc</h2> </div>
                    <div class="ha-mon-img"> <img src="../svgs/morocco/La-Marche-verte.jpg" width="90%" height="300px"> </div>
                    <div class="ha-mon-date badge-primary">7 novembre 1975</div>
                    <div class="ha-mon-content">
                            <p>Le Sahara occidental devient une colonie espagnole d??s la fin du 19e si??cle. C'est un territoire d??sertique de deux cents soixante-six mille kilom??tres carr??s, peupl?? par des tribus nomades, qui a des fronti??res communes avec le Maroc, l'Alg??rie et la Mauritanie. Il a toujours ??t?? revendiqu?? par le Maroc. Le 16 octobre 1975, la Cour internationale de justice de La Haye reconna??t les liens juridiques d'all??geance du Sahara occidental avec le Maroc et la Mauritanie.</p>
                            <p>Le roi Hassan II du Maroc d??cide alors de passer ?? l'action et demande au peuple marocain de "marcher comme un seul homme" vers les provinces du Sud pour les lib??rer. Cet appel d??clenche une immense ferveur populaire et c'est plus de cinq cents mille Marocains qui affluent ?? Tarfaya pr??s de la fronti??re du Sahara occidental. Un syst??me de tirage au sort d??signera alors trois cents cinquante mille civils pour organiser une Marche verte pacifique et franchir la fronti??re des territoires occup??s. Les volontaires brandissent le drapeau marocain et le Coran pour marquer leur revendication territoriale. L'??v??nement marque les esprits, on parle d'un coup de g??nie politique de la part du roi Hassan II.<p>
                            <p>L'Espagne signe les accords de Madrid et le territoire est partag?? entre le Maroc et la Mauritanie. Le retrait des troupes espagnoles a lieu entre 1975 et 1976.</p>
                            <p>Mais la m??me ann??e, le Front Polisario, qui lutte pour l'ind??pendance du Sahara, proclame la R??publique arabe sahraoui d??mocratique (RASD), avec le soutien de l'Alg??rie. C'est le d??but de la longue guerre du Sahra occidental.</p>
                    </div>
                    <div class="ha-mon-auther"> <strong>Journaliste </strong>Pierre-Pascal Rossi</div>
                </div>

                <div class="ha-show card1 showing"> 
                    <div class="ha-mon-title"> <h2>Le roi du Maroc</h2> </div>
                    <div class="ha-mon-img"> <img src="../svgs/morocco/roi.jpg" width="90%" height="300px"> </div>
                    <div class="ha-mon-date badge-primary">26 mars 1961</div>
                    <div class="ha-mon-content">
                            <p>Mars 1961, le roi Hassan II du Maroc succ??de ?? son p??re, Mohammed V qui l'avait initi?? au pouvoir d??s 1956. Continents sans visa suit la premi??re sortie du roi et dresse un tableau contrast?? de ce pays confront?? ?? la modernit??.</p>
                            <p>En d??cembre 1962, Hassan II fera adopter une constitution sur mesure, mal accept??e par les partis politiques. S'en suivra une vague de r??pression dont le paroxysme sera, le 29 octobre 1965, l'enl??vement et la myst??rieuse disparition ?? Paris de Mehdi Ben Barka, chef charismatique de la gauche.<p>
                            <p>Fil a??n?? du sultan Mohammed V, Hassan II, n?? en 1929, lui succ??de en 1961. Le contr??le de l'opposition et la question du Sahara occidental, territoire annex?? par le Maroc ?? l'issue de ??la Marche verte?? de 1975, lui permit de renforcer le concensus autour du tr??ne. Mais cette annexion envenima les relations avec l'Alg??rie.</p>
                            <p>Proche alli?? de l'Occident et comptant parmi les dirigeants mod??r??s du monde arabe, Hassan II a jou?? un r??le actif en faveur des efforts de paix entre Isra??liens et Arabes au Proche-Orient. Il meurt le 23 juillet 1999.</p>
                    </div>
                    <div class="ha-mon-auther"> <strong>Journaliste </strong>Georges Kleinmann</div>
                </div>

                <div class="ha-show card2 showing"> 
                    <div class="ha-mon-title"> <h2>Guerre en Mauritanie</h2> </div>
                    <div class="ha-mon-img"> <img src="../svgs/morocco/guerremoritania.jpg" width="90%" height="300px"> </div>
                    <div class="ha-mon-date badge-primary">24 novembre 1977</div>
                    <div class="ha-mon-content">
                            <p>En 1977, une ann??e apr??s le d??but des combats qui opposent le Maroc et la Mauritanie aux rebelles du Front Polisario, l'arm??e mauritanienne s'organise pour prot??ger les mines de fer. Un reportage de l'??mission Un jour une heure rend compte de la r??alit?? du terrain.</p>
                    </div>
                    <div class="ha-mon-auther"> <strong>Journaliste </strong>Daniel Pasche</div>
                </div>

                <div class="ha-show card3 showing"> 
                    <div class="ha-mon-title"> <h2>Mourir pour Tindouf</h2> </div>
                    <div class="ha-mon-img"> <img src="../svgs/morocco/tindouf.jpg" width="90%" height="300px"> </div>
                    <div class="ha-mon-date badge-primary">31 octobre 1963</div>
                    <div class="ha-mon-content">
                            <p>Mars 1961, le roi Hassan II du Maroc succ??de ?? son p??re, Mohammed V qui l'avait initi?? au pouvoir d??s 1956. Continents sans visa suit la premi??re sortie du roi et dresse un tableau contrast?? de ce pays confront?? ?? la modernit??.</p>
                            <p>En d??cembre 1962, Hassan II fera adopter une constitution sur mesure, mal accept??e par les partis politiques. S'en suivra une vague de r??pression dont le paroxysme sera, le 29 octobre 1965, l'enl??vement et la myst??rieuse disparition ?? Paris de Mehdi Ben Barka, chef charismatique de la gauche.<p>
                            <p>Fil a??n?? du sultan Mohammed V, Hassan II, n?? en 1929, lui succ??de en 1961. Le contr??le de l'opposition et la question du Sahara occidental, territoire annex?? par le Maroc ?? l'issue de ??la Marche verte?? de 1975, lui permit de renforcer le concensus autour du tr??ne. Mais cette annexion envenima les relations avec l'Alg??rie.</p>
                            <p>Proche alli?? de l'Occident et comptant parmi les dirigeants mod??r??s du monde arabe, Hassan II a jou?? un r??le actif en faveur des efforts de paix entre Isra??liens et Arabes au Proche-Orient. Il meurt le 23 juillet 1999.</p>
                    </div>
                    <div class="ha-mon-auther"> <strong>Journaliste </strong>Georges Kleinmann</div>
                </div>

                <!-- -----------------show next monument information------------------- -->
                <div class="ha-next">
                    <div class="ha-title "><h4>?? consulter ??galement</h4></div>

                    <div class="ha-slide-card">

                        <div class="ha-card car1 " data-card="card1">
                            <img src="../svgs/morocco/roi.jpg" width="100%" height="150px">
                            <div class="ha-card-title"> <h4>Le roi du Maroc</h4></div>
                            <div class="ha-card-date badge-primary"><small>7 novembre 1975</small></div>
                            <div class="ha-card-subtitle ">Premi??re sortie officielle pour le jeune roi Hassan II du Maroc.</div>
                        </div>

                        <div class="ha-card car2  showing" data-card="card2">
                            <img src="../svgs/morocco/guerremoritania.jpg" width="100%" height="150px">
                            <div class="ha-card-title"> <h4>Guerre en Mauritanie</h4></div>
                            <div class="ha-card-date badge-primary"><small>24 novembre 1977</small></div>
                            <div class="ha-card-subtitle ">La protection des minerais de fer passe par l'arm??e mauritanienne.</div>
                        </div>

                        <div class="ha-card car3 showing" data-card="card3">
                            <img src="../svgs/morocco/tindouf.jpg" width="100%" height="150px">
                            <div class="ha-card-title"> <h4>Mourir pour Tindouf</h4></div>
                            <div class="ha-card-date badge-primary"><small>31 octobre 1963</small></div>
                            <div class="ha-card-subtitle ">Le pr??sident alg??rien s'exprime suite au conflit avec le Maroc.</div>
                        </div>

                        <div class="ha-card car4 showing" data-card="card4">
                            <img src="../svgs/morocco/La-Marche-verte.jpg" width="100%" height="150px">
                            <div class="ha-card-title"> <h4>Marche verte au Maroc</h4></div>
                            <div class="ha-card-date badge-primary"><small>7 novembre 1975</small></div>
                            <div class="ha-card-subtitle ">le roi du Maroc Hassan II prononce un discours historique au marocaines.</div>
                        </div>

                    </div>

                    <div class="ha-myslide">
                        <button class="ha-myslide-left" data-dir="-1">&#10094;</button>
                            <span class="ha-myslide-circle circle1 clicked" data-circle="1"></span>
                            <span class="ha-myslide-circle circle2 " data-circle="2"></span>
                            <span class="ha-myslide-circle circle3 " data-circle="3"></span>
                            <span class="ha-myslide-circle circle4 " data-circle="4"></span>
                        <button class="ha-myslide-right " data-dir="1">&#10095;</button>
                    </div>
                    
                </div>
            
            </div>
            
    </div>


    
   <?php 
        include_once "../include/footer.php" 
   ?>


    <script src="../js/jquery.comjquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/style.js"></script>
    <script src="slideLeft.js"></script>
</body>
</html>



