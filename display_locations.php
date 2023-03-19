<?php
// connect to the database
$conn = mysqli_connect("localhost", "username", "password", "database_name");

// retrieve data from the database
$sql = "SELECT id, name FROM options";
$result = mysqli_query($conn, $sql);

// format the data as an array
$options = array();
while ($row = mysqli_fetch_assoc($result)) {
    $options[$row['id']] = $row['name'];
}

// create the drop-down list
echo '<select name="option">';
foreach ($options as $id => $name) {
    echo '<option value="' . $id . '">' . $name . '</option>';
}
echo '</select>';

// close the database connection
mysqli_close($conn);
?>
