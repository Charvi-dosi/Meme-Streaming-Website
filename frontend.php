<?php 
  
// Username is root 
$user = 'root'; 
$password = '';  
  
// Database name is gfg 
$database = 'db';  
  
// Server is localhost with 
// port number 3308 
$servername='localhost'; 
$mysqli = new mysqli($servername, $user,  
                $password, $database); 
  
// Checking for connections 
if ($mysqli->connect_error) { 
    die('Connect Error (' .  
    $mysqli->connect_errno . ') '.  
    $mysqli->connect_error); 
} 
  
$sql = "SELECT * FROM meme WHERE id<=100 ORDER BY time DESC"; 
$result = $mysqli->query($sql); 
$mysqli->close();  
?> 
<!DOCTYPE html>
<head>
	<title>frontend_Xmeme</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style type="text/css">
		body{
			font-family: Calibri;
			font-size: 20px;
      background-image: url("image2.jpg");
		}
    h1{
      color: #4d0066;
      margin-left: 370px;
    }
    form{
      margin-left: 370px;
    }
		label{
      color: #4d0066;
			font-size: 20px;
		}
		input[type=text]{
			  width: 60%;
  			padding: 7px;
  			border-bottom: 1px solid red;
  			border-radius: 7px;
  			box-sizing: border-box;
  			margin-top: 6px;
  			margin-bottom: 10px;
  			border-color: grey;
  			resize: vertical;
  		}	
  		input[type=submit] {
        background-color: #5c0099;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 20px;
    } 
    input[type=submit]:hover {
        background-color: #c61aff;
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    }
		input[type=URL]{
			 width: 40%;
  			padding: 7px;
  			border-bottom: 1px solid #f5f5f5;
  			border-radius: 7px;
  			box-sizing: border-box;
  			margin-top: 6px;
  			margin-bottom: 16px;
  			border-color: grey;
  			resize: vertical;			
		}
    img{
      width: 200px;
      height: 150px;
      text-align: center;
    }
    .row{
      margin-left: 150px;
    }
    .row > div{
      border: 2px dashed #8600b3;
      border-radius: 5px;
      margin-left: 5px;
      margin-top: 5px;
      font-family: Bradley Hand, cursive;
    }

	</style>
</head>
<body>
	<h1 style="font-family: Bradley Hand, cursive"><b>Meme Stream</b></h1>
	<form action="backend.php" method="post">
  	<label for="Oname">Meme Owner</label><br>
  	<input type="text" id="Oname" name="Oname" placeholder="Enter your full name"><br>
  	<label for="caption">Caption</label><br>
  	<input type="text" id="caption" name="caption" placeholder="Be creative with caption"><br>
  	<label for="url">Meme URL</label><br>
  	<input type="URL" id="url" name="url" placeholder="Enter URL of your meme here">
  	<input type="submit" value="Submit Meme">
</form>
<div class="container">
      <div class="row">
<?php   
                while($rows=$result->fetch_assoc()) 
                { 
             ?>
             <div class="col-3">

                <?php $url=$rows['URL']; 
              $image = base64_encode(file_get_contents("$url"));
        ?>
                <?php echo $rows['Name'];?><br> 
                <?php echo '<img src="data:image/jpeg;base64,'.$image.'">';?><br>
                <?php echo $rows['Caption'];?> <br></div>
            <?php 
                } 
             ?> 
         </div>
  </div>
</body>
</html>