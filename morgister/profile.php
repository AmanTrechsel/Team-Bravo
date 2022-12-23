<?php include_once('header.php'); ?>
<main>
	
	<?php 		
		switch($g_role){
			case 0:
				$l_role = "Ouder"; 
				$l_search = "Parent";
				break;
			case 1:
				$l_role = "Docent";   
				$l_search = "Teachers";   
				break; 
			case 2:
				$l_role = "Administratie";   
				break;
			default:
				$g_current = 0; 
		}
	

		$l_statement = $g_dbHandler->prepare("SELECT * FROM `{$l_search}` WHERE `account_id` = {$g_userId};");
		try {
			$l_statement->execute();
			$l_statement->bindColumn("name", $l_firstName); 
			$l_statement->bindColumn("surname", $l_lastName); 
			$l_statement->bindColumn("adress", $l_adress); 
			$l_statement->bindColumn("email", $l_email); 
			if ($g_role == 1){
				$l_statement->bindColumn("grade", $l_grade); 
			}
			$l_statement->fetch();
		} catch (Exception $l_exception) {
			echo $l_exception;
		}

	?>	

	<div class="profileInfo">
		<span>Naam</span>
		<span><?php echo $l_firstName.' '.$l_lastName;?></span>
	</div>
	<div class="profileInfo">
		<span>Email-adres</span>
		<span><?php echo $l_email;?></span>
	</div>
	<div class="profileInfo">
		<span>Adres</span>
		<span><?php echo $l_adress;?></span>
	</div>
	<?php
		if ($g_role == 1){
			echo "<div class='profileInfo'>
					<span>Klas</span>
					<span>{$l_grade}</span>
				</div>";
		}
	?>

	<div class="profileInfo">
		<span>Rol</span>
		<span><?= $l_role;?></span>
	</div>


</main>
<?php require('footer.php'); ?>
	