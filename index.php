<?php
require("dbconnect.php");

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
<title>Game review - Startup</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
<body>
	<main>

	<section class="contact rounded shadow-lg p-3 mb-5 rounded">
		<img class="mb-5" src="images/Logo.png" alt="Foto">
		<div class="progress mb-5">
			<div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
    <?php $sql = "SELECT title, summary, rating FROM games";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<article class="">'.
                    "<h1>". $row["title"]. "</h1>".
                    "<p>". $row["summary"]. "</p>".
                    "<p>". $row["rating"]. "</p>".
                  '</article>';
                }
              } else {
        echo "Geen revieuws gevonden.";
      }

    $conn->close();
    ?>
	<div class="progress mb-5">
		<div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
		<p class="">Christiaan © 2019. All rights reserved.<a href="login.php"> Site Admin</a></p>
	</section>

	</main>
</body>
</html>
