<?php 
	include "config.php";

	if(isset($_POST['send'])){
		$matricule = $_POST['matricule'];
		$nom = $_POST['nom'];
		$prénom = $_POST['prénom'];
		$date = $_POST['date'];
		$département = $_POST['département'];
		$salaire = $_POST['salaire'];
		$fonction = $_POST['fonction'];
		$photo = $_POST['photo'];
		
	$sql = "INSERT INTO employé(matricule,nom,prénom,date,département,salaire,fonction,photo) VALUES ('$matricule','$nom','$prénom','$date','$département','$salaire','$fonction','$photo') ;";

	mysqli_query($conn,$sql);

	header("location: ../form.php?signup=success");
	};

// 	if(isset($_POST['update'])){
// 		$id = $_POST['update'];
// 		echo $id;
// 		$matricule = $id;
// 		$nom = $_POST['nom'];
// 		$prénom = $_POST['prénom'];
// 		$date = $_POST['date'];
// 		$département = $_POST['département'];
// 		$salaire = $_POST['salaire'];
// 		$fonction = $_POST['fonction'];
// 		$photo = $_POST['photo'];

// 	$upd = "UPDATE employé SET nom='$nom', prénom='$prénom' $date ='$date' département = '$département' salaire = '$salaire' fonction ='$fonction' photo= '$photo' WHERE matricule='$id';";
// 	mysqli_query($conn,$upd);
// };
	
?>
	