<?php
session_start();
if (!$_SESSION['ingelogd']) {
 header("Location: login.php");
}

$username = $_SESSION['user'];

$error = "";
if (isset($_POST['submit'])){
    if(!empty($_POST['title']) && !empty($_POST['summary']) && !empty($_POST['rating'])){

			require("dbconnect.php");

      function safe($invoer){
        $invoer = trim($invoer);
        $invoer = stripslashes($invoer);
        $invoer = htmlspecialchars($invoer);
        return $invoer;
      }

      $title = safe($_POST['title']);
      $title = $conn->real_escape_string($title);
      $summary = safe($_POST['summary']);
      $summary = $conn->real_escape_string($summary);
      $rating = safe($_POST['rating']);
      $rating = $conn->real_escape_string($rating);

      $sql = "INSERT INTO `games` (`id`, `title`, `summary`, `rating`)
      VALUES (NULL, '".$title."', '". $summary."', '". $rating."')";

      if ($conn->query($sql) === TRUE) {
        echo "Game Review is met succes toegevoegd";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

    }
       else {
       $error = "U moet een titel, samenvatting en rating opgeven";
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
<title>Add review - Startup</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
<body>
	<main>

	<section class="newArt rounded shadow-lg p-3 mb-5 rounded">
		<img class="mb-5" src="images/Logo.png" alt="Foto">
		<div class="progress mb-3">
			<div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
    <article class="">
      <p>You are logged in as <?php echo " ".$username;?>. <a href="logout.php">Log out</a> </p>
    </article>
    <div class="progress mb-5">
      <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <article class="containerColourArt container rounded shadow-lg p-3 mb-5 rounded">
		<table>
			<h1><?php echo $error; ?></h1>
			<form method="POST" class="form-inline mb-5">
				<div class="form-group row">
			    <label for="inputEmail3" class="col-sm-2 col-form-label">Game Title:</label>
			    <div class="col-sm-10">
			      <input name="title" type="text" class="form-control" id="inputEmail3" placeholder="Name of the Article">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputPassword3" class="col-sm-2 col-form-label">Game Summary:</label>
			    <div class="col-sm-10">
			      <textarea rows="7" cols="50" name="summary" type="text" class="form-control" id="inputPassword3" placeholder="samenvatting"></textarea>
			    </div>
			  </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-3 col-form-label">Rating tussen 1 en 10:</label>
          <div class="col-sm-9">
            <input name="rating" type="number" class="form-control" id="inputPassword3" placeholder="Voer hier een cijfer in">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Publication Date:</label>
          <div class="col-sm-10">
            <input name="username" type="date" class="form-control" id="inputEmail3" value=`${currentTime}`>
          </div>
        </div>
        <article class="list-group list-group-horizontal container">
					<div class="col-sm-5"></div>
          <div class="col-sm-5">
						<button type="submit" class="btn btn-danger btn-lg active rounded shadow-lg rounded">Add article</button>
					</div>
        </article>
			</form>
		</table>
	</article>
	<div class="progress mb-5">
		<div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
		<p class="">Christiaan © 2019. All rights reserved.</p>
	</section>

	</main>
</body>
</html>
