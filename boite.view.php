<?php $title='Boite de Réception'?>
<?php require 'partials/header.php'?>
<script>
window.onload = getRecievedMessages();
</script>
<style>

#myGrid{
display: grid;
grid-template-columns: repeat(1, 100%);

}

</style>
<div class="w3-sidebar w3-pale-blue w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
<button class="w3-bar-item w3-button w3-large"
onclick="w3_close()">Close &times;</button>
<?php if ($_SESSION['role']=='doctor'): ?>
  <a href="<?= $_SESSION['role']?>" class="w3-bar-item w3-button">Mes Informations</a>
<a href="consultationsDoctor" class="w3-bar-item w3-button">Mes Consultations</a>
<a href="received" class="w3-bar-item w3-button">Boite de Réception</a>
<a href="demande" class="w3-bar-item w3-button"><span>Demandes de Consultation</span>
  <?php if ($rows>0) : ?>
   <span style="padding: 5px; position: relative; left: 50px;background: red;color: white;"><?=$rows?></span>

  <?php endif ?>
  </a>
  <?php else: ?>
    <form action="search" method="get">
<input class="w3-input" type="text" placeholder="Search.." name="search">
<button class="w3-button" type="submit"><i class="fa fa-search"></i></button>
</form>
<a href="<?= $_SESSION['role']?>" class="w3-bar-item w3-button">Mes Informations</a>
<a href="consultationsPatient" class="w3-bar-item w3-button">Mes Consultations</a>
<<<<<<< HEAD
<a href="boiteReception" class="w3-bar-item w3-button">Boite de Réception</a>
=======
<a href="boite" class="w3-bar-item w3-button">Boite de Réception</a>
>>>>>>> 5aa14a2c9b7f9557194082f3c3fb56ce41113bcd

<?php endif ?>

</div>

<div class="w3-display-container w3-teal">

<div class="w3-container w3-padding-64">

<img src="Images/Logo.png" class="w3-display-left" style="max-height: 150px; max-width: 150px">

</div>
</div>

<div class="w3-bar w3-teal w3-right-align">

<button id="openNav" style="float: left" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
<button class="w3-button w3-teal w3-hover-gray" onclick="goToEtab()">Consulter Les Etablissments de Santé</button>
<button class="w3-button w3-teal w3-hover-gray" onclick="goToLogOut()">Se Déconnecter</button>


</div>

<div id="sentModal" class="w3-modal">
<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:800px">


<form class="w3-container" action="placeHolder" method="POST">
<div class="w3-section">
<label id="sentOrRecievedLabel"><b>Envoyé par</b></label><input id="sentOrRecievedButton" class="w3-input w3-border w3-margin-bottom" type="text" value="Some Douchebag" name="sent" readonly required>

<textarea id="messageContent" readonly class="w3-input w3-border" name="password" required>Douchebag Message</textarea>
</div>


<div id="buttonsDiv" class="w3-container w3-border-top w3-padding-16">
<button id="closeButton" onclick="closeSentModal()" type="button" class="w3-button w3-red">Fermer</button>
<button id="replyButton" type="button" onclick="rendreModalEditable()" type="button" class="w3-button w3-green">Répondre</button>
</div>
</form>

</div>
</div>

<div id="mainDiv">

<div class="w3-row-padding w3-center w3-section">

<div class="w3-card w3-container w3-teal w3-center w3-round-large" id="#home">
   
   <div class="w3-section">

           <div class="w3-container w3-margin w3-padding-large w3-round-large">

               <h3>Resultats de Recherche:</h3>
               <div class="w3-card w3-margin w3-round-large w3-border-red w3-pale-blue" >
                    <span class="w3-bar w3-left-align">

                            
<<<<<<< HEAD
                            <form action="received"  style="display: inline" method="post">
                              <button type="button" class="w3-button w3-hover-gray" name="received" onclick="getRecievedMessages()">Messages Reçu</button>
                            </form>
                            <form action="sent"  style="display: inline" method="post">
                            <button type="button" class="w3-button w3-hover-gray" name="sent" onclick="getSentMessages()">Messages Envoyés</button>
                            </form>
=======
                            
                              <button type="button" class="w3-button w3-hover-gray" name="received" onclick="getRecieved()">Messages Reçu</button>
                            
                            <button class="w3-button w3-hover-gray" name="sent" onclick="getSent()">Messages Envoyés</button>

>>>>>>> 5aa14a2c9b7f9557194082f3c3fb56ce41113bcd
                            
                
                    </span>

                   <div id="myGrid"  style="font-size: 20px; font-weight: 200; font-family: 'Open Sans Condensed'; padding: 10px">
                       
                            <div class="w3-card w3-row w3-round-xlarge" onclick="openSentModal()" style="border: 2px solid teal">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem sunt, consequatur dolorum optio nihil necessitatibus nemo cupiditate, ea amet debitis saepe nulla expedita...
                            </div>
                           
                       
                   </div>
                </div>   
        </div>
                   
   </div>
</div>        
</div>

</div>
<?php require 'partials/footer.php'?>
