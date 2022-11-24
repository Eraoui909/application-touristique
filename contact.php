
<?php 


include_once "connect.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'php mailer/vendor/autoload.php';

$mail = new PHPMailer(true);

if(isset($_POST['name']) && !empty($_POST['name'])){
    try {
        
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'hamzaeraoui2000@gmail.com';            // SMTP username
        $mail->Password   = 'hamza123456789';                       // SMTP password
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($_POST['email'], $_POST['name'] . " " . $_POST['surname']);
        $mail->addAddress($_POST['email'], $_POST['name'] . " " . $_POST['surname']);     // Add a recipient


        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $_POST['need'];
        $mail->Body    = "<div style='margin:10px 20px;color:black;padding:15px;background-color:#EEE;width:80%;'>"
                        . $_POST['message'] .
                        "</div>";

        $mail->send();
        //header("location:dashboard.php");
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div></br>";
    }
}



?>





<!-- this is need to activate him  -->
<div class="container ha-contact-us-container" >

        <div class="row">

            <div class="col-xl-8 offset-xl-2 py-5">

                <h1>Contact US
                   
                </h1>

               

                <form id="contact-form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" role="form">

                    <div class="messages"></div>

                    <div class="controls">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Firstname </label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">Lastname </label>
                                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_email">Email </label>
                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_need">Please specify your need </label>
                                    <select id="form_need" name="need" class="form-control" required="required" data-error="Please specify your need.">
                                        <option value=""></option>
                                        <option value="Inscription in NewsLetter">Inscription in NewsLetter</option>
                                        <option value="Request to start posting in our NewsLetter">Request to start posting in our NewsLetter</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Message </label>
                                    <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success btn-send" value="Send message">
                            </div>
                        </div>
                      
                    </div>

                </form>

            </div>
            <!-- /.8 -->

        </div>
        <!-- /.row-->

    </div>
    <!-- /.container-->
