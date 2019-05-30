<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-3.3.7-dist/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-3.3.7-dist/js/bootstrap.min.js" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- main.css eina po visu kitu CSS failu !!!! -->
  <link rel="stylesheet" type="text/css" href="css/main5.css" />
  <link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
  <script src="https://github.com/jschr/textillate.git"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <title>manksta5</title>
</head>
<!-- Navigation MENU-->

<body class="  "><?php

    echo "home-content.php <br />";

    include_once('./db.php');

?>

<section>

  <?php
  $visiStraipsniai = getArticles();
      // print_r($visiStraipsniai);
        $straipsnis = mysqli_fetch_row($visiStraipsniai);
        while ($straipsnis){
        $straipsnis = mysqli_fetch_row($visiStraipsniai);
      // print_r($straipsnis);
      include('./article.php');
      // $straipsnis = mysqli_fetch_row($visiStraipsniai);
      $straipsnis = mysqli_fetch_assoc($visiStraipsniai);
    }

  ?>

</section>
    <div class="container-fluid backgroudn-img">
     <h1>mano svetaine</h1>
      <?php
          include_once('./home-content.php');
       ?>
<footer>
<h1>test</h1>
<?php
    include_once('./home-content.php');
 ?>
</footer>
    </div> <!--  end container-fluid -->
</body>

</html>
