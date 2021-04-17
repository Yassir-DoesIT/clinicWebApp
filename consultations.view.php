<?php $title="Mes Consultations"?>
<?php require('Partials/header.php')?>
<?php 
// if (isset($_SESSION['prenom']) && isset($_SESSION['nom'])) {
//  echo "Hello ". $_SESSION['prenom'] . " " . $_SESSION['nom'] . ", your id is " . $_SESSION['user_id'];}
// var_dump($_POST);
?>

        <script type="text/javascript">
        window.onload = function()
         {
          showErrorOrSuccess();
          }
        
        </script>

<div class='w3-modal' id='errorModal'>
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" id='errorChild' style="max-width:600px">  
        <?php if(isset($result['errorMessage'])) : ?>
        <div class="w3-center"><br>
         <span onclick="closeErrorModal()" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Fermer">&times;</span>
       
       </div>
       <div class="w3-container"><?=$result["errorMessage"]?></div>;
       
       <?php  elseif(isset($result['successMessage'])) : ?>
          
          <div class="w3-center"><br>
         <span onclick="closeErrorModal()" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Fermer">&times;</span>
       </div>
       <div class="w3-container"><?=$result['successMessage']?></div>;
        
        <?php endif;?>
     </div>   
</div> 
<div class="w3-sidebar w3-pale-blue w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
<button class="w3-bar-item w3-button w3-large"
onclick="w3_close()">Close &times;</button>
<form action="/action_page.php">
<input class="w3-input" type="text" placeholder="Search.." name="search">
<button class="w3-button" type="submit"><i class="fa fa-search"></i></button>
</form>
<a href=<?= $_SESSION['role']?> class="w3-bar-item w3-button">Mes Informations</a>
<a href="MesConsultations" class="w3-bar-item w3-button">Mes Consultations</a>
<a href="#" class="w3-bar-item w3-button">Boite de Réception</a>
</div>

<div class="w3-display-container w3-teal">

<div class="w3-container w3-padding-64">

<img src="Images/Logo.png" class="w3-display-left" style="max-height: 150px; max-width: 150px"></img>

</div>
</div>

<div class="w3-bar w3-teal w3-right-align">

<button id="openNav" style="float: left" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
<button class="w3-button w3-teal w3-hover-gray" onclick="goToEtab()">Consulter Les Etablissments de Santé</button>
<button class="w3-button w3-teal w3-hover-gray" onclick="goToLogOut()">Se Déconnecter</button>


</div>

<div id="modal01" class="w3-modal w3-animate-zoom w3-center" onclick="this.style.display='none'">
<img class="w3-modal-content" src=<?="UsersCache/photoProfile/".$_SESSION['photoProfile']?> style="width: 500px; height: 500px">

</div>

<div id="mainDiv">

<div class="w3-row-padding w3-center w3-section">

<div class="w3-card w3-container w3-teal w3-center w3-round-large" id="#home">

<div class="w3-section">

<div class="w3-container w3-margin w3-padding-large w3-round-large">

<h3>Mes Consultations</h3>
<div class="w3-card w3-margin w3-round-large w3-border-red w3-pale-blue consultations" >
  <?php for ($i=0; $i <6 ; $i++) : ?>
   <div class="box1 w3-teal"><h1>hi</h1></div>
   
  <?php endfor;?>




</div>

   
</div>

</div>

</div>


<?php require('Partials/footer.php')?>