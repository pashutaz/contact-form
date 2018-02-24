<?php  
    $error = "";
    if($_POST){
        
        if(!$_POST["email"]){
            $error .= "<p>An email address is required.</p>";
        }
        if(!$_POST["subject"]){
            $error .= "<p>The subject field is required.</p>";
        }
        if(!$_POST["content"]){
            $error .= "<p>The content is required.</p>";
        }
        
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error .= "<p>The email is invalid.</p>";
        }
        
        if ($error != ""){
            $error = "<div class='alert alert-danger' role='alert'>".$error."</div>";
        }else{
            $emailTo = "pazaytsev@gmail.com";
            $subject = $_POST['subject'];
            $content = $_POST['content'];
            $headers = "From: ".$_POST['email'];
            
            if(mail($emailTo, $subject, $content, $headers)){
                $successMessage = "<div class='alert alert-success' role='alert'>Your message was sent, thanks for feedback!</div>";
            }else{
                $error = "<div class='alert alert-danger' role='alert'>We coundn't sent your message - please try again later.</div>";
            }
        }
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Contact form</title>
  </head>
  <body>
    <div class="container">
        <h1>Get in touch!</h1>
        
        <div id="error"><?php echo $error.$successMessage;?></div>
        
        <form method="post">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="">
            <small class="form-text text-muted" id="emailHelp" >We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject">
          </div>
          <div class="form-group">
              <label for="content">What would you like to ask?</label>
              <textarea class="form-control" id="content" name="content" cols="" rows="3"></textarea> 
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        $("form").submit(function (event){
            event.preventDefault();
            var error = '';
            if ($("#email").val() == ""){
               error += "<p>The email field is required.</p>";
            }
            if ($("#subject").val() == ""){
               error += "<p>The subject field is required.</p>";
            }
            if($("#content").val() == ""){
                error += "<p>The content field is required.</p>"
            }

            if(error !== ''){
                error = "<div class='alert alert-danger' role='alert'>"+error+"</div>";
                $("#error").html(error);
            }else{
                $("form").unbind("submit").submit();
            }
        });
    </script>
  </body>
</html>
