

$(function(){
    $(".slidePoint").on("click" , function(){

        if($(".ha-slide-left").css("left") == "0px"){
            $(".ha-slide-left").css("left","-205px");
            $(this).css("opacity" , "0.5");
        }else{
            $(".ha-slide-left").css("left","0px");
            $(this).css("opacity" , "1");
        }
    
    });
});




//monument slide

$(function(){

    var pos = 1;
    $(".ha-myslide-circle").on("click",function(){
        $(this).addClass("clicked");
        $(this).siblings().removeClass("clicked");
        pos = $(this).data("circle");
        $(`.ha-card`).addClass("showing");
        $(`.car${pos}`).removeClass("showing");
    });

    $(".ha-myslide-left").on("click" , function(){
        if(pos > 1){
            $(".ha-myslide-circle").removeClass("clicked");
            $(`.circle${pos-1}`).addClass("clicked");
            pos -=1;
        }
        $(`.ha-card`).addClass("showing");
        $(`.car${pos}`).removeClass("showing");
    });

    $(".ha-myslide-right").on("click" , function(){
        if(pos < 4){
            $(".ha-myslide-circle").removeClass("clicked");
            $(`.circle${pos+1}`).addClass("clicked");
            pos +=1;
        }
        
        $(`.ha-card`).addClass("showing");
        $(`.car${pos}`).removeClass("showing");
    });

});

//click in card to show content
$(function(){

    var clas = "";
    let i = 1;
    $(".ha-card").on("click" , function(){
        clas = $(this).data("card");
        console.log(clas );
        $(".ha-show").addClass("showing");
        $(`.${clas}`).removeClass("showing");

        

        if(i<4){
            $(".ha-myslide-right").click();
            i++;
        }else if(i == 4){
            $(".ha-myslide-left").click();
        }else if(i==6){
            i--;
        }

    });

});
