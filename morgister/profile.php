<?php include_once('header.php'); ?>
<main>
	
	<?php 
		$userID = $_SESSION['user'];
		$role = $_SESSION['role'];

		$stmt = $g_DBhandeler->prepare("SELECT * FROM `Teachers` WHERE `account_id` = {$userID};");
		try {
			$stmt->execute();
			$stmt->bindColumn("name", $fname); 
			$stmt->bindColumn("surname", $lname); 
			$stmt->bindColumn("date_of_birth", $dob); 
			$stmt->bindColumn("adress", $adress); 
			$stmt->bindColumn("email", $email); 
			$stmt->bindColumn("gender", $gender); 
			$stmt->bindColumn("grade", $grade); 
			$stmt->fetch();
		} catch (Exception $e) {
			echo $e;
		}

	?>	

	<div class="profileInfo">
		<span>Naam</span>
		<span><?php echo $fname.' '.$lname;?></span>
	</div>
	<div class="profileInfo">
		<span>Email-adres</span>
		<span><?php echo $email;?></span>
	</div>
	<div class="profileInfo">
		<span>Adres</span>
		<span><?php echo $adress;?></span>
	</div>
	<div class="profileInfo">
		<span>Rol</span>
		<span>
			<?php 
				switch($role){
					case 0:
						echo "Ouder";   
						break;
					case 1:
						echo "Docent";   
						break; 
					case 2:
						echo "Administratie";   
						break;
					default:
						$current = 0; 
				}
			?>
		</span>
	</div>


</main>
<?php require('footer.php'); ?>
	