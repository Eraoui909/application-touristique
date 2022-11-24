<?php 


function errorMsg($msg){

    echo "
    <div class='container' style='margin-top: 10px ;'>    
        <div class='alert alert-danger'><center>".$msg."</center>
        </div>
    </div>
    ";

}
function successMsg($msg){
    echo "
    <div class='container' style='margin-top: 10px ;'>    
        <div class='alert alert-success'><center>".$msg."</center></div>
    </div>
    ";
}


?>