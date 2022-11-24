
$(document).ready(function(){
    

    console.log("jquery");
    $(".delete-confirm").on("click",function(){

        console.log("delete button");
        confirm("are you shir?");
    });

});