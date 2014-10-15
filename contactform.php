<?php 

	$error = false; 

	if (isset($_POST["send"])) {


		if (!$_POST['name']) {

			$error="<br />Please enter your name";
		}

		if (!$_POST['email']) {

			$error.="<br />Please enter your email address";
		}

		if (!$_POST['comment']) {

			$error.="<br />Please enter a comment";
		}

		if ($_POST["email"]!="" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { 

		    $error.="<br />Please enter a valid email address";

		}

		if ($error) {

			$result='<div class="alert alert-danger"><strong>There were error(s) in your form:</strong>'.$error.'</div>';

		}
		else {

			if (mail("aerial.encore@gmail.com", "Comment from website", "Name: ".$_POST['name']."

			Email:".$_POST['email']."

			Comment: ".$_POST['comment'])) {

				$result='<div class="alert alert-success"><strong>Thank you</strong>I\'ll be in touch.</div>';
			}

			else {

				$result='<div class="alert alert-danger">Sorry, there was an error sending your message. Please try again later.</div>';
			}


		}


	}





?>



<!DOCTYPE html>
<html lang="en">

	<head>
		
		<title>Contact Form</title>

		<meta charset="UTF=8" />
		<meta http-equiv="Content-type" content="text.html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

				<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

		<style type="text/css">

		.emailForm {
			border: 1px solid black;
			border-radius: 10px;
			margin-top: 10px;
			padding: 10px auto;
		}
		#head {
			text-align: center;
		}

		.formgroup {
			margin: 10px auto;
		}

		textarea.form-control {
			height: 150px;
		}

		.lead {
			text-align: center;
		}

		</style>



	</head>

	<body>
		

		
			<?php

			/*

				$emailTo="aerial.encore@gmail.com";
				$subject="I hope this works!";
				$body="Learnt PHP forms at last!";
				$headers="From: faisal.hassanx@gmail.com";

				if (mail($emailTo, $subject, $body, $headers)) {

					echo "Mail Sent!";
				}

				else {

					echo "Mail not sent.";
				}


			*/

			?>

			<div class="container">
				
				<div class="row">
					
					<div class="col-md-6 col-md-offset-3 emailForm">
						
					<h1 id="head">My Email Form</h1>

					<?php echo $result; ?>

					<p class="lead">Please get in touch - I'll get back to as soon as I can! Thank you!</p>

					<form method="post">
						
						<div class="formgroup">
							
							<label for="name">Your Name:</label>

							<input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo $_POST['name']; ?>" />

						</div>

						<div class="formgroup">
							
							<label for="email">Your Email:</label>

							<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $_POST['email']; ?>" />

						</div>

						<div class="formgroup">

							<label for="comment">Comments:</label>

							<textarea class="form-control" name="comment" placeholder="Type here"><?php echo $_POST['comment']; ?></textarea>

						</div>

						<input type="submit" name="send" class="btn btn-success btn-lg formgroup" value="Submit" />




					</form>




					</div>




				</div>






			</div>
			

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


	</body>


</html>