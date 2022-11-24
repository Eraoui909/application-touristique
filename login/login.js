


$(function(){

    let c =false;
    $(".ha-switch-btn").click(function(){
        console.log("switched");
        $(".ha-form-sign").toggleClass("active");
        if(c){
            $(".ha-switch").text("Sign in");
            c=false;
        }else{
            $(".ha-switch").text("Sign Up");
            c=true;
        }
    })

});