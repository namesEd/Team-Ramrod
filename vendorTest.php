<?php
 require_once "header.php";
 require_once "connect.php";
 if (isset($_SESSION["userID"])) {
    $userID = $_SESSION['userID'];
} else {
    header("Location: user_login.php?error=notallowed");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Vendor</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
    <link rel="stylesheet" href="App/css/header.css">
    <script type = "text/javascript" src="App/js/header.js"></script>


    <link rel="stylesheet" href="App/css/vendor_reg.css">
</head>
<body>


    <div>
        <?php
            // Display message if there is one
            if (!empty($message)) {
                echo "<p>$message</p>";
            }
        ?>
        <form id="vendForm" action="add_vendor.php" method="post">
          <label for="name">Name of Vendor:</label>
          <input type="text" id="name" name="vendor" required>

            <?php
              // retrieve data from the database
              $sql = "SELECT locID, location_name FROM location";
              $result = mysqli_query($conn, $sql);

              // create the drop-down list
              echo '<label for="location">Select a Location:</label>';
              echo '<select name="location" id="location">';
              while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="' . $row['locID'] . '">' . $row['location_name'] . '</option>';
              }
              echo '</select>';

              // close the database connection
              mysqli_close($conn);
            ?>
            <br> </br>
          <input type="submit" name="submit" value="Add">
        </form>
    </div>
    <p> Add a vendor to an existing location</p>


</body>
</html>