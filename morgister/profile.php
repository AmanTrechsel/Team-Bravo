<?php
	try{
		$dbhandler = new PDO("mysql:host=mysql;dbname=Morgister;charset=utf8", "root", "qwerty");
	}catch(Exception $ex){
		echo $ex;
		die();
	}
	
	$stmt = $dbhandler->prepare("SELECT * FROM Scholar;");
	$stmt->bindColumn("scholar_id", $scholar_id);
	$stmt->bindColumn("name", $name);
	$stmt->bindColumn("surname", $surname);
	$stmt->bindColumn("date_of_birth", $date_of_birth);
	$stmt->bindColumn("gender", $gender);
	$stmt->bindColumn("grade", $grade);
	$stmt->bindColumn("address", $address);
	$stmt->bindColumn("zipcode", $zipcode);
	$stmt->bindColumn("email", $email);
	$stmt->bindColumn("phone", $phone);
	$stmt->execute();
?>
<?php require('header.php'); ?>
		<main>
			<form>
				<table>
					<tr>
						<th>naam</th>
						<th>achternaam</th>
						<th>geslacht</th>
						<th>geboortedatum</th>
						<th>address</th>
						<th>postcode</th>
						<th>email</th>
						<th>telefoon nummer</th>
						<th>groep</th>
					</tr>
					<?php
						while($stmt->fetch()){
							echo "
								<tr>
									<td>$name</td>
									<td>$surname</td>
									<td>$gender</td>
									<td>$date_of_birth</td>
									<td>$address</td>
									<td>$zipcode</td>
									<td>$email</td>
									<td>$phone</td>
									<td>$grade</td>
								</tr>
							";
						}
					?>
				</table>
			</form>
		</main>
		<?php require('footer.php'); ?>
	