<?php $title='Profile de '. $_SESSION['prenom'] . " " . $_SESSION['nom'] ?>
<?php require('Partials/header.php')?>


<div class="w3-display-container w3-teal">

<div class="w3-container w3-padding-64">

<img src="Images/Logo.png" class="w3-display-left" style="max-height: 150px; max-width: 150px"></img>

<h1 class="w3-display-middle" style="font-family: 'Tangerine', serif;">Bienvenue placeholder!</h1>

</div>
</div>

<div class="w3-bar w3-teal w3-right-align">

<button class="w3-button w3-teal w3-hover-gray" onclick="goToEtab()">Consulter Les Etablissments de Santé</button>
<button class="w3-button w3-teal w3-hover-gray" onclick="goToLogOut()">Se Déconnecter</button>


</div>

<div class="w3-sidebar w3-bar-block w3-left-align w3-margin" style="width:25%">

<button class="w3-bar-item w3-button w3-center">Link 0</button>

<div class="w3-border w3-margin-top w3-round-large w3-pale-blue">

<button class="w3-bar-item w3-button w3-center">Link 1</button>
<button class="w3-bar-item w3-button w3-center">Link 2</button>
<button class="w3-bar-item w3-button w3-center">Link 3</button>

</div>

</div>

<div class="w3-row-padding w3-center w3-section" style="margin-left:27%">

<div class="w3-card w3-container w3-teal w3-center w3-round-large" id="#home">

<div class="w3-section" style="padding-left: 25px; height : auto">

<div class="w3-container w3-margin w3-padding-large w3-round-large">

<h3>Choisissez une ville pour accéder à la liste des établissments de santé par quartier.</h3>
<div class="w3-card w3-margin w3-round-large w3-border-red w3-pale-blue" >

    <div class="w3-display-container" style="font-size: 20px; font-weight: 200; font-family: 'Open Sans Condensed';">
        <img src="placeHolder.jpg" class="w3-circle w3-display-topleft" alt="profile_picture" style="width: 60px; height: 60px;margin-left: 20px; margin-top: 10px"> 
        <h3 style="padding-top: 15px"><?="Hello ". $_SESSION['prenom'] . " " . $_SESSION['nom'];?></h3>
        <span><?=ucfirst($_SESSION['role']) ." number " . $_SESSION['user_id']?></span>
        <form style="padding-left: 10px; padding-bottom: 10px;">
            <label for="first_name"><b>Prénom</b></label>
            <input type="text" name="first_name" class="w3-input w3-margin w3-border" style="max-width: 90%"  value=<?=$_SESSION['prenom']?> readonly>

            <label for="last_name"><b>Nom</b></label>
            <input type="text" name="last_name" class="w3-input w3-margin w3-border" style="max-width: 90%" value=<?=$_SESSION['nom']?> readonly>

            <label for="mail"><b>Email</b></label>
            <input type="text" name="mail" class="w3-input w3-margin w3-border" readonly style="max-width: 90%" value=<?=$_SESSION['email']?>>

            <label for="adr"><b>password</b></label>
            <input type="text" name="adr" style="max-width: 90%" class="w3-input w3-margin w3-border" readonly>
        </form>
    </div>

    
</div>

</div>

<?php require('Partials/footer.php')?>