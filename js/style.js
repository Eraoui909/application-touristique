$(function(){

    $(".ha-navbar").css("position","relative");
    $(".ha-navbar").css("background-color","transparent");
    $(".ha-navbar a").css("color","white");
    $(".ha-navbar-title span").css("color","white");

$(window).scroll(function(e){

  if($(window).scrollTop() > 90)
  {
    $(".ha-navbar").css("position","fixed");
    $(".ha-navbar").css("top","0px");
    $(".ha-navbar").css("left","0px");
    $(".ha-navbar").css("background-color","#f8f9fa");
    $(".ha-navbar a").css("color","black");
    $(".ha-navbar-title span").css("color","black");
    
  }else{
    $(".ha-navbar").css("position","relative");
    $(".ha-navbar").css("background-color","transparent");
    $(".ha-navbar a").css("color","white");
    $(".ha-navbar-title span").css("color","white");
  }

  if($(window).scrollTop() > 690){
    $(".ha-navbar").css("border-bottom","1px solid black");
  }else{
    $(".ha-navbar").css("border-bottom","none");
  }

  

});

});

// Back ground image slide show

var pics = ["svgs/morocco/pic1c.jpg","svgs/morocco/pic2c.jpg","svgs/morocco/pic3c.jpg","svgs/morocco/pic4c.jpg","svgs/morocco/pic5c.png","svgs/morocco/pic6c.png"]
var colors = ["#003C1A" , "#902A08" , "#AC3F5B" , "#902B06"]

var slide = document.querySelector(".ha-slider-container");

var i=0;
setInterval(function(){

  if(i == 6 ){
    i=0;
  }
  slide.style.backgroundImage = "url("+ pics[i] +")";
  slide.style.backgroundColor = colors[i];
  i++;

},5000);



//goto head

$(function(){

  $(".go-to-head").on("click" , function(){

    $(window).scrollTop(0);

  });

});

// gold etoile effect

$(function(){

  
  let click =false;
  let pageHeight = $(document).height();
  $(".ha-rating-popup").css("height",pageHeight);
  $(".ha-rating-start img").mouseenter(function(){
    $(this).attr('src','svgs/mysvgs/pngegg.png');
    $(this).prevAll('.ha-sta').attr('src','svgs/mysvgs/pngegg.png');
  });
  $(".ha-rating-start img").mouseleave(function(){
    if(click == false){
      $(this).attr('src','svgs/mysvgs/star--v1.png');
      $(this).siblings('.ha-sta').attr('src','svgs/mysvgs/star--v1.png');
    }
  });
  $(".ha-rating-start img").on("click",function(){
    click =true;
    console.log("clicked");
    $(this).prevAll('.ha-sta').attr('src','svgs/mysvgs/pngegg.png');
    $(this).attr('src','svgs/mysvgs/pngegg.png');
  });

  $(".ha-rating-start img").on("click",function(){
    $(".ha-rating-popup").removeClass("active");
  });
  $(".ha-rating-popup .close").on("click",function(){
    $(".ha-rating-popup").addClass("active");
  });

  //send stars number to database

  $(".ha-rating-start img").on("click",function(){
      var s = $(this).data('star');
      $.ajax({
        type: "POST",
        url: "test.php",
        data: { star: `${s}`}
      }).done(function( msg ,success) {
          console.log( "Data Saved: " + success );
      });
  });

  

});

//scroll to contact us

$(document).ready(function (){
  $(".ha-scroll-to-contact").click(function (){
    console.log('clicked');
      $('html, body').animate({
          scrollTop: $(".ha-contact-us-container").offset().top
      }, 500);
  });
});