<?php
	include "includes/config.php";
	include "includes/bootstrap.php";

	if(isset($_POST['search'])){
		$searchV = $_POST['searchV'];
		$sql = "SELECT * FROM employé WHERE CONCAT(`matricule`,`nom`,`prénom`,`date`,`département`, `salaire`, `fonction`,`photo`) LIKE '%$searchV%';";
		$result = mysqli_query($conn,$sql);
	} else {
		$sql = "SELECT * FROM employé";
		$result = mysqli_query($conn,$sql);
	};
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>document</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="searchContainer">
		<form action="index.php" method="POST">
			<input type="text" name="searchV" class="searchV" >
			<input type="submit" name="search" value="search" class="btn btn-primary">
			<a href="form.php" class="btn btn-primary">Ajouter un employé</a>
		</form>
	</div>
<div id="table" class="container-sm">
	<table class="table table-hover table-bordered">
		<thead >
			<tr>
				<th>Matricule</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Date</th>
				<th>Département</th>
				<th>Salaire</th>
				<th>Fonction</th>
				<th>Photo</th>
				<th>modifier</th>
			</tr>
		</thead>
		<tbody>

		<?php while ($row = mysqli_fetch_assoc($result)): ?>

	 		<tr>
				<td><?php echo $row["matricule"]?></td>
				<td><?php echo $row["nom"]?></td>
				<td><?php echo $row["prénom"]?></td>
				<td><?php echo $row["date"]?></td>
				<td><?php echo $row["département"]?></td>
				<td><?php echo $row["salaire"]?></td>
				<td><?php echo $row["fonction"]?></td>
				<td><img src="<?php echo $row["photo"];?>" width="60"></td>
				<td>
					<a href="form.php?edit=<?php echo $row['matricule']?>" class="btn btn-outline-primary">Modifier</a>
					<a href="index.php?delete=<?php echo $row['matricule'];?>"class="btn btn-outline-danger">Supprimer</a>
				</td>
			</tr>
<?php
	endwhile;
?>
		</tbody>
	</table>
</div>
</body>
</html>


<?php 
	if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		mysqli_query($conn, "DELETE FROM employé WHERE matricule=$id");
		header('location: index.php');
	};

?>