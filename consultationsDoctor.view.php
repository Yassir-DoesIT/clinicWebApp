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
<style>

#myGrid{
display: grid;
grid-template-columns: 1fr 1fr 1fr 1fr;
grid-gap: 10px;
align-items: center;

}

</style>

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
<?php if ($_SESSION['role']=='doctor'): ?>
  <?php else: ?>
    <form action="search" method="get">
<input class="w3-input" type="text" placeholder="Search.." name="search">
<button class="w3-button" type="submit"><i class="fa fa-search"></i></button>
</form>
<?php endif ?>

<a href="<?= $_SESSION['role']?>" class="w3-bar-item w3-button">Mes Informations</a>
<a href="consultationsDoctor" class="w3-bar-item w3-button">Mes Consultations</a>
<a href="boite" class="w3-bar-item w3-button">Boite de Réception</a>
<a href="demande" class="w3-bar-item w3-button"><span>Demandes de Consultation</span>
  <?php if ($rows>0) : ?>
   <span style="padding: 5px; position: relative; left: 50px;background: red;color: white;"><?=$rows?></span>

  <?php endif ?>
  </a>
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
<img class="w3-modal-content" src="placeHolder.jpg" style="width: 500px; height: 500px">
</div>

<div id="mainDiv">

<div class="w3-row-padding w3-center w3-section">

<div class="w3-card w3-container w3-teal w3-center w3-round-large" id="#home">
     
     <div class="w3-section">

     <div class="w3-container w3-margin w3-padding-large w3-round-large">

         <h3>Mes Consultations</h3>
         <div class="w3-card w3-margin w3-round-large w3-border-red w3-pale-blue" >

             <div id="myGrid"   style="font-size: 20px; font-weight: 200; font-family: 'Open Sans Condensed'; padding: 10px">
                 <?php if ($consultations_rows>0): ?>
                
                 <?php foreach ($consultations as $consultation): ?>
                  <?php $result=$patient->selectPatient($consultation->PATIENT)?>
                 
                  <div class="w3-card w3-white w3-round-xlarge" style="border: 2px solid teal">
                  <img src="<?="UsersCache/photoProfile/".$result[0]['PHOTOPROFILE']?>" class="w3-circle" style="display: inline-block; width: 100px; height: 100px" alt="placeHolder"><div>
                    <?php echo $result[0]['NOM'].' '.$result[0]['PRENOM'] ?></div>
                    <div><?php echo '<a  href="patientProfile?patientProfile='.$result[0]['ID_USER'].'" style="text-decoration: none" style="margin-right: 5px; margin-bottom: 5px" class=" w3-round-xlarge w3-button w3-hover-pale-blue  w3-border" >Profile </a>';?>
                    <button type="submit" name="contact" onclick="openSendModal()"  class=" w3-round-xlarge w3-button w3-hover-pale-blue  w3-border">Contact</button>
                    </div>
                  </div> 
                  <div id="sendModal" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:800px">
        
        
              <form class="w3-container" action="message" method="POST">
                <div class="w3-section">
                  <label id="sendLabel"><b>Envoyé À</b></label><input id="sendInput" class="w3-input w3-border w3-margin-bottom" type="text" value="<?=$result[0]['NOM'].' '.$result[0]['PRENOM'].'#'.$result[0]['ID_USER']?>" name="send" readonly>
                  
                  <textarea id="messageContent" class="w3-input w3-border" name="contenu" required></textarea>
                </div>
                <input type="hidden" name="receiver_id" value="<?=$result[0]['ID_USER']?>">
        
          
              <div id="buttonsDiv" class="w3-container w3-border-top w3-padding-16">

                <button id="closeButton" onclick="closeSendModal()" type="button" class="w3-button w3-red">Fermer</button>
                <input id="sendButton" type="submit" name="send" class="w3-button w3-green">
              </div>
              <?php $_SESSION['location']='consultationsDoctor'?>
        </form>
        
            </div>
          </div>
      
                 <?php endforeach ?>
                 <?php else: ?> 
                  <h1 style="padding-left: 490px">Pas de consultations</h1>
                 <?php endif;?>
                 
             </div>
          </div>   
  </div>
                     
     </div>
</div>        
</div>

</div>
<div id="sendModal" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:800px">
        
        
              <form class="w3-container" action="placeHolder" method="POST">
                <div class="w3-section">
                  <label id="sendLabel"><b>Envoyé À</b></label><input id="sendInput" class="w3-input w3-border w3-margin-bottom" type="text" value="Some Douchebag" name="send" required>
                  
                  <textarea id="messageContent" class="w3-input w3-border" name="contenu" required></textarea>
                </div>
        
        
              <div id="buttonsDiv" class="w3-container w3-border-top w3-padding-16">

                <button id="closeButton" onclick="closeSendModal()" type="button" class="w3-button w3-red">Fermer</button>
                <button id='sendButton' type='submit' type='button' class='w3-button w3-green'>Envoyer</button>
              </div>
        </form>
        
            </div>
          </div>


<?php require('Partials/footer.php')?>