<?php include('header.php'); ?>

<div id="item2"></div>
<div id="herobanner">
    <img id="herobannerimg" src="./images/herobanner.png" alt="herobannerhome">
</div>
<main>
    <h1>Contact</h1>
    <form action="#" method="post">
        <label>Naam:</label>
        <input type="text" id="naam"  name="naam" placeholder="Vul uw naam in..." required><br>
        <label>Email:</label>
        <input type="email" id="email"  name="email" placeholder="Vul uw mailadres in..." required><br>
        <label>Telefoonnummer:</label>
        <input type="tel" id="telefoon"  name="telefoon" placeholder="Vul uw telefoonnummer in..."><br>
        <label>Bericht:</label>
    </form>
</main>

<?php include('footer.php'); ?>