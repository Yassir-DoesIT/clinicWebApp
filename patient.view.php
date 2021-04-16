<?php $title='Profile de '. $_SESSION['prenom'] . " " . $_SESSION['nom'] ?>
<?php require('Partials/header.php')?>
<?php 
// if (isset($_SESSION['prenom']) && isset($_SESSION['nom'])) {
// 	echo "Hello ". $_SESSION['prenom'] . " " . $_SESSION['nom'] . ", your id is " . $_SESSION['user_id'];}
// var_dump($_SESSION);
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
<a href="#" class="w3-bar-item w3-button">Mes Informations</a>
<a href="#" class="w3-bar-item w3-button">Mes Consultations</a>
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

<h3>Mes Informations</h3>
<div class="w3-card w3-margin w3-round-large w3-border-red w3-pale-blue" >

   <div class="w3-display-container" style="font-size: 20px; font-weight: 200; font-family: 'Open Sans Condensed';">
       <img src=<?="UsersCache/photoProfile/".$_SESSION['photoProfile']?> onclick="document.getElementById('modal01').style.display='block'" class="w3-circle w3-display-topleft" alt="profile_picture" style="width: 100px; height: 100px;margin-left: 20px; margin-top: 10px; cursor: pointer;"> 
       <h3 style="padding-top: 15px"><?= 'Bienvenu '.$_SESSION['prenom'].' '.$_SESSION['nom']?></h3>
       <span><?='Patient num ' . $_SESSION['user_id'] ?></span><br>
       
        <form action="patient" method="post" enctype="multipart/form-data">
        <label  style="float:left; margin-top: 25px; text-decoration: underline;" for="photoProfile">Charger une nouvelle image</label>
        
        <input  class="w3-button w3-margin-top" type="file" id="photoProfile" name="photoProfile" style="display: none">
        <input class="w3-button w3-margin-top" type="submit" name="submitPhoto" value="submit"
        style="float:left">
       </form>

       <table class="w3-table w3-margin-top" style="margin-left: 100px">

           <form action="patient" method="post" enctype="multipart/form-data">
               <tr>
                   <td ><b>Prénom</b></td>
                   <td><input style="width: 70%" type="text" name="prenom" class="w3-input w3-border"  readonly value=<?=$_SESSION['prenom'] ?>></td>
               </tr>
               <tr>
                   <td><b>Nom</b></td>
                   <td><input style="width: 70%" type="text" name="nom" class="w3-input w3-border" value=<?=$_SESSION['nom'] ?> readonly></td>
               </tr>
               <tr>
                   <td><b>Email</b></td>
                   <td><input style="width: 70%" type="text" name="email" class="w3-input w3-border" readonly value=<?=$_SESSION['email'] ?>></b></td>
               </tr>
               <tr>
                   <td><b>Date de Naissance</b></td>
                   <td><input style="width: 70%" type="date" name="dateNaissance" class="w3-input w3-border" value= <?=date("Y-m-d", strtotime($_SESSION['dateNaissance']));?> readonly></td>
               </tr>
               <tr>
                   <td><b>CIN</b></td>
                   <td><input style="width: 70%" type="text" name="cin" class="w3-input w3-border" readonly value= <?=$_SESSION['cin']?> ></td>
                   <input style="width: 70%" type="hidden" name="role" class="w3-input w3-border" readonly value="p" >

               </tr>
               <tr>
                      <?php if($_SESSION['sexe']=='m') : ?>
                       <td><b>Sexe</b></td>
                       <td><input id="maleRadio" class="w3-radio" type="radio" name="sexe" value="m" disabled checked>
                           <label>Male</label>
                       <input id="femaleRadio" class="w3-radio" type="radio" name="sexe" value="f" style="margin-left: 50px" disabled>
                           <label>Female</label>
                       </td>
                     <?php else :?>
                      <td><b>Sexe</b></td>
                       <td><input id="maleRadio" class="w3-radio" type="radio" name="sexe" value="m" disabled >
                           <label>Male</label>
                       <input id="femaleRadio" class="w3-radio" type="radio" name="sexe" value="f" style="margin-left: 50px" disabled checked="">
                           <label>Female</label>
                       </td>
                     <?php endif;?>

               </tr>
               <tr  id="password" style="display: none">

                       <td><b>Mot de Passe</b></td>
                       <td><input style="width: 70%" type="password" name="password" class="w3-input w3-border" readonly>
                       </td>

               </tr>
               <tr>


                    <td>
                            <button type="button" onclick="renderEditable()" class="w3-button">Modifier</button>
                            
                    </td>
                    <td>
                            <button class="w3-button" type="button" id="goBack" onclick="back()" style="display: none">Retour</button>
                    </td>

                    <td>
                            <button class="w3-button" type="submit" id="submitInput" style="display: none">Envoyer</button>
                    </td>

               </tr>
           </form>
       </table>
       
   </div>

   
</div>

</div>

</div>


<?php require('Partials/footer.php')?>