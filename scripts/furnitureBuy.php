<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Buy Furniture</title>
<link rel='stylesheet' type='text/css' href='stylesheet.css'>
</head>

<body>
<?php
	//establish connection info
$server = "localhost";// your server
$userid = "uyewoqgtdalpm"; // your user id
$pw = "whereismydatabase"; // your pw
$db= "dbg2jfj7rbnxzu"; // your database
		
// Create connection
$conn = new mysqli($server, $userid, $pw );

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
	
//select the database
$conn->select_db($db);

	//run a query
$sql = "SELECT * FROM FurnitureInfo";
$result = $conn->query($sql);

//get results
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) 
   {
        //make each item
        echo "<div class = 'item'>";

        echo("<img src='".$row['src']."' alt='".$row['id']."'>");

        echo"<div class='name'>".$row['description']."</div>";
        echo"<div class='price'>".$row['price']."</div>";
        echo"<div class='desc'>".$row['contact']."</div>";
        //jquery: when the button clicked, toggle class to "added"; will give all divs with class "added" to next page
        echo"<div class='add' class='notAdded' id='".$row['id'],"'>Add to Cart</div>"; 
        //for 2 below: hide initially, show when add to cart button clicked
        echo"<div class='remove' id ='".$row['id'],"00'>Remove from Cart</div>";
        echo"<div class='gotoCart' id ='".$row['id'],"go'>Go To Cart</div>";

        echo "</div>";
   }

} else {
  echo "";
}
//close the connection	
$conn->close();

	
?>

<!--jQuery section: keep track of items added to cart, go to cart.php if go to cart is clicked-->
<script>
    $(document).ready(function(){
    $(".add").click(function(){
        console.log("added is clicked");
        //$(this).text(player);
        //cell = $(this).attr('id');    //attribute change to added
        //$(this).off("click");         //hide add, show remove/go to cart

    })
    $(".remove").click(function(){
        //$(".reset").hide();           //attribute change to notAdded
                                        //hide remove/go to cart, show add
    })
    $(".gotoCart").click(function(){
        //get all add buttons with added class, send to cart.php
    }
    )
});

</script>
</body>
</html> 