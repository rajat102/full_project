<!DOCTYPE html>


<?php
session_start();
$con=mysqli_connect("localhost","root","","sabji khazana");
?>



<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Feedback Form</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="form.css" >
        <script src="form.js"></script>
		
    </head>
    <body>
​

<div class="container">
            <div class="imagebg"></div>
            <div class="row " style="margin-top: 50px">
                <div class="col-md-6 col-md-offset-3 form-container">
                    <h2>Form</h2> 
                    
    <form method="post"  action="feedback.php">
        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>How do you rate your overall experience?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="bad" >
                                        Bad 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="average" >
                                        Average 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="good" >
                                        Good 
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="comments"> Comments:</label>
                                <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name"> Username:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email"> Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        
	<input type="submit" class="form-control" style="background-color:#43a047;color:white;" name="submit" value="Post"><br>
</form>
                    </div>
            </div>
        </div>
		
		</body>

	
	
</html>
<?php
				
				
			     if(isset($_POST['submit']))
				 {
					 $c_rating=$_POST['experience'];
					 $c_username=$_POST['name'];
					 $c_email=$_POST['email'];
					 $c_comment=$_POST['comments'];
					
					 echo $insert_c ="insert into feedback(c_username,rating,c_mail,comment) 
					 	values('$c_username','$c_rating','$c_email','$c_comment');";	
					 $run_c=mysqli_query($con,$insert_c );
					echo "<script>alert('Feedback is sent');";
						echo "window.location.href='home.php';</script>";
				 if($run_c)
					 {
						
					 }
				}
				else
				{
					echo "No";
				}
   ?>

 

