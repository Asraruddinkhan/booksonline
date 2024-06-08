<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookstore</title>
  <link rel="stylesheet" href="CSS/styles.css">
<script src="JS/scripts1.js"></script>
</head>
<body>
 <?php
if(isset($_REQUEST["submit"]))
{
$stockid=$_REQUEST["stockid"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booksshopping";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT image FROM stock WHERE stockid=".$stockid;
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$image=$row["image"];	
$deletefile=unlink("uploads/".$image);
$sql = "update stock set image=null where stockid=".$stockid;
$conn->query($sql);
$conn->close();
echo("<script>alert('image deleted');</script>");
header("location:managestock.php");

}

?>


 <header>




    <h1>Asrar Bookstore</h1>
    <nav>
      <ul>
        <li style="acolor:white"><a href="index.html">Home</a></li>
 
      </ul>
    </nav>
  </header>
    <div class="signup-container">
    <h2>Delete Image</h2>
    <form id="signupForm" method="post" action="deletestockimage.php">
      <label for="stockid">Stock:</label>
      <input type="text" id="stockid" name="stockid" required>
	
		<br><br><br>
      <button type="submit" name="submit" value="submit">Delete image</button>
    </form>
  </div>

<br>
<br>
<br>
  <footer>
    <p>&copy; 2024 Bookstore. All rights reserved.</p>
  </footer>

  <script src="JS/scripts.js"></script>
</body>
</html>