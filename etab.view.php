
<?php $title='Les etablissments de santé'?>
<?php require('Partials/header.php')?>
<script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVFUx9XDLvnTKVWTEeZs7GGeW4RTI7w3M&callback=initMap">
    </script>
    <div class="w3-display-container w3-teal">
        <div class="w3-container w3-padding-64">
            <img src="Images/Logo.png" class="w3-display-left" style="max-height: 150px; max-width: 150px"></img>
            <h1 class="w3-display-middle" style="font-family: 'Tangerine', serif;">Bienvenue sur HealthGeist!</h1>
          </div>
    </div>

  <div class="w3-bar w3-teal w3-right-align">
     
      <?php if(isset($_SESSION['email'])&&isset($_SESSION['user_id'])) : ?>
      <?php echo '<button class="w3-button w3-teal w3-hover-gray" onclick="goToProfile(\''.$_SESSION['role'].'\')">Profile</button>' ?>
      <button class="w3-button w3-teal w3-hover-gray" onclick="goToEtab()">Consulter Les Etablissments de Santé</button>
      <button class="w3-button w3-teal w3-hover-gray" onclick="goToLogOut()">Se Deconnecter</button>
      
      <?php else : ?>
         <button class="w3-button w3-teal w3-hover-gray" onclick="goToHome()">Page d'Acceuil</button>
      <button class="w3-button w3-teal w3-hover-gray" onclick="goToEtab()">Consulter Les Etablissments de Santé</button>
        <button class="w3-button w3-teal w3-hover-gray" onclick="loginFromEtab()">Se Connecter</button>
      <?php endif;?>
      </div>

  <div class="w3-row-padding w3-center w3-section">
    <div class="w3-card w3-container w3-teal w3-center w3-round-large" id="#home">
      <div class="w3-display-container">
          <img src="Images/Hospital.jpg" alt="HealthGeist" style="width: 100%; max-width: width 400px; max-height: 300px;" class="w3-image w3-opacity-max w3-margin-top w3-round-large"></img>
          <div class="w3-display-middle w3-xlarge" style="font-family: 'Open Sans Condensed', sans-serif; font-weight: 700;">Consultez Votre Médecin Sans Tracas!</div>
      </div>  
    <div class="w3-section" style="padding-left: 25px; height : auto">
        <div class="w3-container w3-margin w3-padding-large w3-round-large">
            <h3>Choisissez une ville pour accéder à la liste des établissments de santé par quartier.</h3>
            <div class="w3-card w3-third w3-margin w3-round-large w3-hover-green w3-hover-opaque" name='Oujda' onclick="show('Oujda')"  style="height:350px; width: 350px; cursor: pointer">
                <span style="font-size: 20px; font-weight: 200; font-family: 'Open Sans Condensed';">Oujda</span>
                <img src="Images/Oujda.jpg" alt="Oujda" class="w3-border" style="width: 95%; height: 90%">
            </div>
            <div class="w3-card w3-third w3-margin w3-round-large w3-hover-green w3-hover-opaque" name='Laayoune' onclick="show('Laayoune')"  style="height:350px; width: 350px; cursor: pointer">
                    <span style="font-size: 20px; font-weight: 200; font-family: 'Open Sans Condensed';">Laayoune</span>
                <img src="Images/Laayoune.jpg" alt="Laayoune" class="w3-border" style="width: 95%; height: 90%">
            </div>
            <div class="w3-card w3-third w3-margin w3-round-large w3-hover-green w3-hover-opaque" name='Taroudant' onclick="show('Taroudant')"  style="height:350px; width: 350px; cursor: pointer">
                    <span style="font-size: 20px; font-weight: 200; font-family: 'Open Sans Condensed';">Taroudant</span>
                <img src="Images/Taroudant.jpg" alt="Taroudant" class="w3-border" style="width: 95%; height: 90%">
            </div>
            <div id="cities"></div>
                 <div class="w3-container w3-margin-top" id="mapContainer" style="height: 550px; width: 100%; display: none;">
                       <div class ="w3-center" id="map" style="height: 80%; width: 100%;"></div>
                 </div>

    </div>
    </div>            
        </div>
       

    
<?php require('Partials/footer.php')?>

