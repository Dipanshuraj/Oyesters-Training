<?php



$para=$_GET['source'];


echo "<br>";

// Create connection
$con = mysqli_connect('localhost','username','password');

// Check connection
if (!$con)
    echo ":(";
else


mysqli_select_db($con,'oyesters_db');




$q="select column_names from keyword_table where keyword="."'$para'"."";

$columns =trim (mysqli_fetch_assoc(mysqli_query($con,$q))['column_names'],"[]");





$q="select table_ from keyword_table where keyword="."'$para'"."";
$table=mysqli_fetch_assoc(mysqli_query($con,$q))['table_'];


$q="select"." ".$columns." "."from"." ".$table." "."  ";   ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table align="center" border="1px" style="width: 900px; line-height: 30px;" id="myTable">
	

	
	<t>
		<th> <?php echo substr($columns,0,7)?> </th>
		<th> <?php echo substr($columns,9,14)?> </th>
		</t>
		<?php
		$result =mysqli_query($con,$q);
		 if ($result->num_rows > 0) {
     // output data of each row
           while($row = $result->fetch_assoc()) { ?>

		                              
		    
		 	<tr align="center">
		 	<td><?php echo $row[substr($columns,0,7)]."  "; ?></td>
			<td><?php echo $row[substr($columns,9,14)]."  "; ?></td>
			
		 </tr>
		 <?php }} else {
    echo "0 results";
} ?>
</table>
</body>
</html>

<?php 
$conn->close(); ?>
















?>