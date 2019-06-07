<?php
$error = "";
if (isset($_POST['submit'])){ // Checkt of er op de login knop gedrukt is
    if(!empty($_POST['username']) && !empty($_POST['password'])) { // Checkt of er een username en wachtwoord is ingevuld

      require("dbconnect.php");

			function safe($input){
        $input = trim($input); // Haalt de spaties weg
        $input = stripslashes($input); // Haalt de slashes weg
        $input = htmlspecialchars($input); // Zorgt ervoor dat er door middel van javascript of andere script talen niet de website kunnen slopen
        return $input;
      }

      $username = safe($_POST['username']); // Voert de functie safe uit die dient tegen XSS
      $username = $conn->real_escape_string($username); // Maakt de SQL injectie niet schadelijk
      $password = safe($_POST['password']); // Voert de functie safe uit die dient tegen XSS
      $password = $conn->real_escape_string($password); // Maakt de SQL injectie niet schadelijk

      $sql = "SELECT * FROM gebruikers WHERE username = '".$username."' AND password = '".$password."'";
      if($result = $conn->query($sql)){
        $aantal = $result->num_rows;
        if($aantal == 1){
          $user = $result->fetch_row();
          session_start();
          $_SESSION['user'] = $user[1];
          $_SESSION['ingelogd'] = true;
          header("Location: gamereview.php");
        }

    } else {
       $error = "Incorrect username or password. Please try again.";
    }
  } else {
		 $error = "Vul een gebruikersnaam en wachtwoord in.";
	}
}
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="langauge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Description" content="News">
	<meta name="author" content="Christiaan van Haasteren">
	<meta name="Keywords" content="News, games, review, PHP">
<title>Undefined Login - Startup</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<main>

	<section class="login rounded shadow-lg p-3 mb-5 bg-dark rounded">
		<img class="mb-5" src="images/logo.png" alt="Foto">
		<div class="progress mb-5">
			<div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
		<article class="containerColour container rounded shadow-lg p-3 mb-5 rounded">
		<table>
			<form class="form-inline mb-5" method="POST">
				<div class="form-group row">
					<div class="col-sm-10">
						<?php echo $error; ?>
					</div>
				</div>

				<div class="form-group row">
			    <label for="inputEmail3" class="col-sm-2 col-form-label">Username:</label>
			    <div class="col-sm-10">
			      <input name="username" type="text" class="form-control" id="inputEmail3" placeholder="Username">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="inputPassword3" class="col-sm-2 col-form-label">Password:</label>
			    <div class="col-sm-10">
			      <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
			    </div>
			  </div>

				<article class="list-group list-group-horizontal">
					<div class="col-sm-5"></div>
					<div class="col-sm-10">
						<button name="submit" type="submit" class="btn btn-danger btn-lg active">Login</button>
					</div>
				</article>

			</form>
		</table>
	</article>
	<div class="progress mb-4">
		<div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
		<p class="">Christiaan © 2019. All rights reserved.</p>
	</section>

	</main>
</body>
</html>
