<?php include_once('header.php'); ?>

<div id="herobanner">
    <img id="herobannerimg" src="./images/herobanner.png" alt="herobannerhome">
</div>
<main id="contactpage">
    <h1 id="contacttitle">Contact</h1>
    <h3 class="contacttext">Wilt u contact opnemen met de school gebruik dan onderstaand formulier. Uiteraard zijn we ook gewoon telefonisch bereikbaar of per e-mail.</h3>
    <h3 class="contacttext">Telefoon: 0384214108</h3>
    <h3 class="contacttext">Email: morgenster@vivente.nu</h3>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
      $l_errors=[];
      $g_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
      $g_email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

      if (!$g_name || strlen($g_name) < 2)
      {
        $l_errors[] = "Je naam moet tenminste twee letters bevatten.";
      }

      if (!$g_email && strlen($g_email) > 0)
      {
        $l_errors[] = "E-mail is incorrect.";
      }

      if (strlen($g_email) == 0)
      {
        $l_errors[] = "Vul a.u.b. uw e-mail adres in.";
      }

      foreach($l_errors as $l_error)
      {
        echo $l_error;
        echo "<br>";
      }

      if (count($l_errors) == 0)
      {
        echo "<div id='thankmessage'>Beste $g_name,<br>Bedankt voor het invullen van dit formulier met het volgende e-mailadres: $g_email.<br>We nemen zo snel mogelijk contact met u op.</div>
              <a id='linkback' href='index.php'>Terug naar de home pagina</a>";
      }
    }
    else
    {
      echo '<form action="#" method="post">
      <div id="form">
          <label>Voor- en achternaam*:</label>
          <input class="input" type="text" id="name"  name="name" placeholder="Vul uw voor- en achternaam hier in..." required><br>
          <label>Naam kind (indien van toepassing):</label>
          <input class="input" type="text" id="namechild"  name="namechild" placeholder="Vul de naam van uw kind hier in..."><br>
          <label>E-mail*:</label>
          <input class="input" type="email" id="email"  name="email" placeholder="Vul uw mailadres hier in..." required><br>
          <label>Telefoonnummer:</label>
          <input class="input" type="tel" id="phonenumber"  name="phonenumber" placeholder="Vul uw telefoonnummer hier in..."><br>
          <label>Bericht:</label>
          <textarea class="input" id="message" name="message" placeholder="Vul uw bericht hier in..."></textarea><br>
          <input type="submit" id="submit" value="Verzend" name="submit">
      </div>
  </form>';
    }
    ?>
    
    
</main>

<?php include('footer.php'); ?>