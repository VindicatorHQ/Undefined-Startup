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
      $publication_date = safe($_POST['publication_date']);
      $publication_date = $conn->real_escape_string($publication_date);

      $sql = "INSERT INTO `games` (id, title, summary, rating, publication_date)
      VALUES (NULL, '".$title."', '". $summary."', '". $rating."', '". $publication_date."')";

      if ($conn->query($sql) === TRUE) {
        echo "Game Review is met succes toegevoegd";
        header("Location: index.php");
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
<title>Post Review - Startup</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
<body>
	<main>

	<section class="newReviewContainer rounded shadow-lg p-3 mb-5 rounded">
		<a href="index.php"><img class="mb-5" src="images/Logo.png" alt="Foto"></a>
		<div class="progress mb-3">
			<div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
    <article class="">
      <p>You are logged in as <?php echo " ".$username;?>. <a href="logout.php">Log out</a> </p>
    </article>
    <div class="progress mb-5">
      <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <article class="containerColourReview container rounded shadow-lg p-3 mb-5 rounded">
		<table>
			<h1><?php echo $error; ?></h1>
			<form method="POST" class="form-inline mb-5">
				<article class="form-group row">
			    <label for="GameTitle" class="col-sm-2 col-form-label">Game Title:</label>
			    <div class="col-sm-10">
			      <input name="title" type="text" class="form-control" placeholder="Titel van het spel">
			    </div>
			  </article>

			  <article class="form-group row">
			    <label for="GameSummary" class="col-sm-2 col-form-label">Game Summary:</label>
			    <div class="col-sm-10">
			      <textarea rows="7" cols="50" name="summary" type="text" class="form-control" placeholder="Samenvatting review"></textarea>
			    </div>
			  </article>

        <article class="form-group row">
          <label for="Rating" class="col-sm-2 col-form-label">Rating:</label>
          <div class="col-sm-10">
            <input type="number" name="rating" class="form-control" placeholder="Voer hier een cijfer tussen de 1 en 10 in.">
          </div>
        </article>

        <article class="form-group row">
          <label for="PublicationDate" class="col-sm-2 col-form-label">Publication Date:</label>
          <div class="col-sm-10">
            <input name="publication_date" type="date" class="form-control">
          </div>
        </article>

        <article class="list-group list-group-horizontal container">
					<div class="col-sm-5"></div>
          <div class="col-sm-5">
						<button name="submit" type="submit" class="btn btn-danger btn-lg active rounded shadow-lg rounded">Post review</button>
					</div>
        </article>

			</form>
		</table>
	</article>
	<div class="progress mb-5">
		<div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
		<p>Christiaan © 2019. All rights reserved.</p>
	</section>

	</main>
</body>
</html>
