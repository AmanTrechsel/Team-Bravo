<?php include_once('header.php'); ?>
<main>
	
	<?php 		
		switch($role){
			case 0:
				$wRole = "Ouder"; 
				$search = "Parent";
				break;
			case 1:
				$wRole = "Docent";   
				$search = "Teachers";   
				break; 
			case 2:
				$wRole = "Administratie";   
				break;
			default:
				$current = 0; 
		}
	

		$stmt = $g_DBhandeler->prepare("SELECT * FROM `{$search}` WHERE `account_id` = {$userID};");
		try {
			$stmt->execute();
			$stmt->bindColumn("name", $fname); 
			$stmt->bindColumn("surname", $lname); 
			$stmt->bindColumn("adress", $adress); 
			$stmt->bindColumn("email", $email); 
			if ($role == 1){
				$stmt->bindColumn("grade", $grade); 
			}
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
	<?php
		if ($role == 1){
			echo "<div class='profileInfo'>
					<span>Klas</span>
					<span>{$grade}</span>
				</div>";
		}
	?>

	<div class="profileInfo">
		<span>Rol</span>
		<span><?= $wRole;?></span>
	</div>


</main>
<?php require('footer.php'); ?>
	