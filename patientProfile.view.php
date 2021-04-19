<?php $title='Profile'?>
<?php require('Partials/header.php')?>
<style>
td:not(#image_td){padding-top: 20px}
button[disabled]{background-color: gray;
color: white;}
</style>

<div class="w3-sidebar w3-pale-blue w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
<button class="w3-bar-item w3-button w3-large"
onclick="w3_close()">Close &times;</button>
<a href="<?= $_SESSION['role']?>" class="w3-bar-item w3-button">Mes Informations</a>
<a href="consultationsDoctor" class="w3-bar-item w3-button">Mes Consultations</a>
<a href="#" class="w3-bar-item w3-button">Boite de Réception</a>
<a href="demande" class="w3-bar-item w3-button"><span>Demandes de Consultation</span>
  <?php if ($rows>0) : ?>
   <span style="padding: 5px; position: relative; left: 50px;background: red;color: white;"><?=$rows?></span>

  <?php endif ?>
  </a>
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

<div id="modal01" class="w3-modal w3-animate-zoom w3-center" onclick="this.style.display='none'">
<img class="w3-modal-content" src="<?="UsersCache/photoProfile/".$profile[0]['PHOTOPROFILE']?>" style="width: 500px; height: 500px">
</div>

<div id="mainDiv">

<div class="w3-row-padding w3-center w3-section">

<div class="w3-card w3-container w3-teal w3-center w3-round-large" id="#home">

<div class="w3-section">

     <div class="w3-container w3-margin w3-padding-large w3-round-large">
        <?php if($profile[0]['SEXE']=='m') : ?>
         <h3><?= "Mr. ". ucwords($profile[0]['NOM'].' '.$profile[0]['PRENOM'])?></h3>
          <?php elseif($profile[0]['SEXE']=='f') : ?>
         <h3><?= "Mrs. ". ucwords($profile[0]['NOM'].' '.$profile[0]['PRENOM'])?></h3>
         <?php endif; ?>
         <div class="w3-card w3-margin w3-round-large w3-border-red w3-pale-blue" >
           
             <div class="w3-container" style="font-size: 20px; font-weight: 200; font-family: 'Open Sans Condensed';">
              
                 <table  style=" margin-left: 350px" class="w3-table w3-margin-top">

                  <tr>
                      <td id="image_td" style="width: 300px" rowspan="4">
                              <img src="<?="UsersCache/photoProfile/".$profile[0]['PHOTOPROFILE']?>" onclick="document.getElementById('modal01').style.display='block'" class="w3-circle" alt="profile_picture" style="width: 200px; height: 200px; cursor: pointer;"> 
                      </td>
                  </tr>

                         <tr>
                             <td><?= ucwords($profile[0]['NOM'].' '.$profile[0]['PRENOM'])?></td>
                         </tr>
                         <tr>
                             <td><?= "CIN: ". ucwords($profile[0]['CIN'])?></td>
                         </tr>
                         <tr>
                             <td><?= "Date Naissance: ".date("d-m-Y", strtotime($profile[0]['DATE_NAISSANCE']))?></td>
                             
                         </tr>

                         <tr><td colspan="2" style="padding-left: 315px" >
                          <?php if ($ifSent>0): ?>
                            <form action="patientProfile" method="post" style="display: inline">
                           <input type="hidden" name="patient_id" value="<?=$profile[0]['ID_USER']?>" > 
                            <button type="submit" name="accept" class="w3-button w3-border w3-hover-green w3-pale-blue w3-round-xlarge">Accept</button>
                            </form>
                            <form action="patientProfile" method="post" style="display: inline">
                           <input type="hidden" name="patient_id" value="<?=$profile[0]['ID_USER']?>" > 
                          <button type="submit" name="refuse" class="w3-button w3-border w3-hover-red w3-pale-blue w3-round-xlarge">Refuse</button>
                          </form>
                          <?php elseif($ifAccepted>0): ?>
                             <button type="submit" name="contact" onclick="openSendModal()" class="w3-button w3-border w3-margin w3-hover-teal w3-round-xlarge">Contact</button>
                            <form action="patientProfile" method="post" style="display: inline">
                           <input type="hidden" name="patient_id" value="<?=$profile[0]['ID_USER']?>" > 
                          <button type="submit" name="delete" class="w3-button w3-border w3-hover-red w3-pale-blue w3-round-xlarge">Delete</button>
                          </form>
                          <?php endif ?>
                            

                          
                          <!-- <button class="w3-button w3-border w3-hover-teal w3-white w3-round-xlarge" style="margin-left: 10px">Contact</button> -->
                         </td></tr>
                      
                 </table>
                 
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
              </div>
        </form>
        
            </div>
          </div>
<?php require('Partials/footer.php')?>