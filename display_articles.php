<!DOCTYPE html>
<html>
<head>
  <title>Health News</title>
  <link rel="stylesheet" href="App\css\article.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
	<link rel="stylesheet" href="App/css/header.css">
	<script type = "text/javascript" src="App/js/header.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
</head>
<body>
<?php require_once "header.php"?>
	<h1>Health News</h1>
  <!-- Seach Bar that will be implemented after i do the ast finishing touches for the articles page -->
  <!-- <form>
    <input type="text" id="search-input" placeholder="Search...">
    <button type="submit">Search</button>
  </form>   -->
	<div id ="articles"></div>
  <script defer src = "App\js\article.js"></script>
  <?php require_once "footer.php"?>
</body>
</html>

