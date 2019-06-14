<?php
session_start();
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
<title>Homepage - Startup</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
<body>
	<main>

	<section class="homeContainer rounded shadow-lg p-3 mb-5 rounded">
		<a href="index.php"><img class="mb-5" src="images/Logo.png" alt="Foto"></a>
		<div class="progress mb-5">
			<div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Summary</th>
          <th scope="col">Rating</th>
        </tr>
      </thead>
      <?php $sql = "SELECT title, summary, rating FROM games ORDER BY rating DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo '<tbody class="">'.
                    '<tr class="table-primary">'.
                      "<td>". $row["title"]. "</td>".
                      "<td>". $row["summary"]. "</td>".
                      "<td>". $row["rating"]. "</td>".
                      '</tr>'.
                    '</tbody>';
                  }
                } else {
          echo "Geen revieuws gevonden.";
        }

      $conn->close();
      ?>
    </table>


    <a class="btn btn-primary" href="login.php" role="button">Inloggen</a>
    <a class="btn btn-primary" href="gamereview.php" role="button">Review Schrijven</a>
	<div class="progress mb-5">
		<div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
		<p>Christiaan © 2019. All rights reserved.</p>
	</section>

	</main>
</body>
</html>
