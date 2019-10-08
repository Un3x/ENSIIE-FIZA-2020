<?php
  function shouldShowHeaders(String $view): bool {
    return $view !== 'index' && $view !== 'subscribe';
  }
  function generateView($view = 'index', $data = []) {
?>

<html>

<head>
  <title>IInstagrame</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/f32575f1ef.js" crossorigin="anonymous"></script>

</head>

<body>
  
  <?php 
  if (shouldShowHeaders($view)) {
    include_once '../src/view/layout/header.php'; 
  }
  ?>
  <div class="pageContainer">
    <?php include_once '../src/view/'.$view.'.php' ?>
  </div>
  <?php
  if (shouldShowHeaders($view)) {
    include_once '../src/view/layout/footer.php';
  }
  ?>
</html>
<?php
}
?>

