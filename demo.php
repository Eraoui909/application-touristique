<?php 


if (isset($_POST['rate'])) {
    $rate=$_POST['rate'];
   // echo$rate;
    echo'<input type="hidden" name="rate" value="'.$rate.'">';
}

?>