<link rel="stylesheet" href="stylin.css">
<?php 
require_once "utilities.php";
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    header("Location: home.php");
}

if(isset($_POST) && !empty($_POST)) {
    if (!empty($_POST['DJ_Name']) && !empty($_POST['password'])) {
        $db = get_connection();
        $stmt = $db->prepare("SELECT * FROM User WHERE DJ_Name = ?");
        $stmt->bind_param("s", $DJ_Name);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        echo $row['name'];
        if ($_POST['password'] == $row['password']) {
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['fname'] = $row['fname'];
          $_SESSION['lname'] = $row['lname'];
          $_SESSION['active'] = true;
          $_SESSION['logged_in'] = true;
          header("Location: home.php");
        } else {
          echo "Invalid username or password. Try again.";
          echo $_POST['password'];
        }
      }
    }

?>
<head>
    <?php include "nav.php"; ?><br/>
    <?php if(!$_SESSION['active']) {?>    
</head>
<body>
  <br/><br/><br/><br/><br/><br/>
<h1> Log In!</h1>
 <div><h4><form action= "login.php" method="POST" style="margin-top: 100px; margin-left: 100px;">
    DJ Name: <input type="text" name="DJ_Name" required autofocus/> <br>
    Password: <input type="password" name="password" required /> <br>
    <input type="submit" value="Login" name="Login" />
</form></h4></div> 
<?php } else { ?>
<h1> Already logged in. </h1> <?php } ?>
</body>