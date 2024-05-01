
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"  lang="en">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<link rel="stylesheet" type="text/css" href="galleryprod.css">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<title></title>
</head>
<body>
	<div class="contain">
		<div class="header">
			<h2>product descripton</h2>
		</div>
		<form action="" method="GET"  >
		<div class="input-group mb-3">
			<input type="text" class="form-control" name="search"  value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>"placeholder="search here">
			<button type="submit" class="searchbtn">Search</button>
			
		</div>
		</form>
        <div class="style-table">
		<table id="data"> 
<tr  class="t-heading">
  <td >id</td>
  <td>name</td>
  <td>description</td>
    <td>weight</td>
    <td>pack</td>
    <td>price</td>
  <td>dimension</td>

             </tr>
						<tr  class="active-row">
							<?php  
require_once('config/db.php');

if(isset($_GET['search']))
	{ 
		$filterdata=$_GET['search'];
		$query ="SELECT * FROM  proinfo WHERE CONCAT(id,name,description,pack,weight,price)  LIKE '%$filterdata%'";
$result = mysqli_query( $conn, $query);
if(mysqli_num_rows($result)>0){

while($row = mysqli_fetch_assoc($result))
                            {
                          ?>
     <td data-label="id" id="proid" class="active-row"><?php  echo $row["id"]; ?></td>  
     <td data-label="name" class="active-row"><?php echo $row['name']; ?></td>  
     <td  data-label="description" class="active-row"><?php   echo $row['description']; ?> </td>
     <td data-label="pack" class="active-row"><?php  echo $row['pack'];   ?></td>
     <td data-label="weight" class="active-row"><?php  echo $row['weight'];  ?></td>   
     <td  data-label="price" class="active-row"> <?php echo $row['price'];  ?></td>
     <td data-label="dimension"  class="active-row"> <?php echo $row['dimension'];  ?></td>

                                 </tr>
  
                             <?php  
	                            }}
	                            else 
	                            {
	                            	?>
	                            	<tr>
	                            	<td colspan="7">No Data Found </td>
	                            	</tr>
	                            	<?php
	                            }}
	                            
?>
	                            	

	                            		

  </table>

  <button class="printbtn" onclick="window.print();">print</button>		
</div>
</div>

</body>
</html>


