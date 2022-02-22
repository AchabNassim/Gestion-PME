<?php
	include "includes/bootstrap.php";
	include "includes/config.php";
	$update = false;
	$matricule = "";
	$nom = "";
	$prénom = "";
	$date = "";
	$département = "";
	$salaire = "";
	$fonction = "";
	$photo = "";

	if(isset($_GET['edit'])){
		$update = true;
		$id = $_GET['edit'];
		$get_sql = "SELECT * FROM employé WHERE matricule=$id";
		$record = mysqli_query($conn, $get_sql);
		$row = mysqli_fetch_assoc($record);

		$matricule = $row['matricule'];
		$nom = $row['nom'];
		$prénom = $row['prénom'];
		$date = $row['date'];
		$département = $row['département'];
		$salaire = $row['salaire'];
		$fonction = $row['fonction'];
		$photo = $row['photo'];
	};
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Formulaire </title>
	<link rel="stylesheet" href="includes/style.css">
</head>
<body>
	<div id="form" class="container-sm">
		<form action="includes/dataInf.php" method="POST" enctype="multipart/form-data">
		  <div class="form-group">
		  	<?php
		  	if($update === true): ?>
		  		<label for="matricule">Matricule</label>
		    	<input type="text" value="<?php echo $matricule;?>" class="form-control" id="matricule" name="matricule" readonly >
		  	<?php else: ?> 
		  		<label for="matricule">Matricule</label>
		    	<input type="text" value="<?php echo $matricule;?>" class="form-control" id="matricule" name="matricule">
		  	<?php endif ?>
		  </div>
		  <div class="form-group">
		    <label for="nom">Nom</label>
		    <input type="text" value="<?php echo $nom;?>" class="form-control" id="nom" name="nom">
		  </div>
		  <div class="form-group">
		    <label for="prénom">Prénom</label>
		    <input type="text" value="<?php echo $prénom;?>" class="form-control" id="prénom" name="prénom">
		  </div>
		  <div class="form-group">
		  	<label for="date">Date</label>
		    <input type="date" value="<?php echo $date;?>" class="form-control" id="date" name="date">
		  </div>
		  <div class="form-group">
		    <label for="département">département</label>
		    <input type="text" value="<?php echo $département;?>" class="form-control" id="département" name="département">
		  </div>
		  <div class="form-group">
		    <label for="salaire">salaire</label>
		    <input type="text" value="<?php echo $salaire;?>" class="form-control" id="salaire" name="salaire">
		  </div>
		  <div class="form-group">
		    <label for="fonction">fonction</label>
		    <input type="text" value="<?php echo $fonction;?>" class="form-control" id="fonction" name="fonction">
		  </div>
		  <div class="form-group">
		    <label for="photo">image</label>
		    <input type="text" value="<?php echo $photo;?>" class="form-control" id="photo" name="photo">
		  </div>
		  <div class="form-group">
		  <?php if ($update == true): ?>
				<button class="btn btn-success" type="submit" name="update" >update</button>
			<?php else: ?>
				<button class="btn btn-primary"  type="submit" name="send" >send</button>	
			<?php endif ?>
		</div>
	</form>
</div>
</body>
</html>


