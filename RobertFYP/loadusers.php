<?php
  // Database connection details
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "petrol_station_link";
  
  // Create connection
  try {
    $connect = new PDO("mysql:host=localhost;dbname=petrol_station_link", "root", "");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<script>alert('Database connection failed: " . $e->getMessage() . "');</script>";
    exit;
}
  
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  // SQL query to select all records from the users table
  $sql = "SELECT * FROM users";
  $result = $conn->query($sql);
  
  // Check if there are any records
  if ($result->num_rows > 0) {
      // Output data in an HTML table
      echo "<table class='table'>";
      echo "<thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead>";
      echo "<tbody>";
      
      // Output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["id"] . "</td>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "</tr>";
      }
      
      echo "</tbody>";
      echo "</table>";
  } else {
      echo "No users found.";
  }
  
  // Close the database connection
  $conn->close();
  ?>