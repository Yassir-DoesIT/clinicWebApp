<?php $title='Profile'?>
<?php require('Partials/header.php')?>
<style>
          td:not(#image_td){padding-top: 20px}
      </style>
      
        <div class="w3-sidebar w3-pale-blue w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
                <button class="w3-bar-item w3-button w3-large"
                onclick="w3_close()">Close &times;</button>
                <form action="search" method="get">
                    <input class="w3-input" type="text" placeholder="Search.." name="search">
                    <button class="w3-button" type="submit"><i class="fa fa-search"></i></button>
                  </form>
                <a href="<?= $_SESSION['role']?>" class="w3-bar-item w3-button">Mes Informations</a>
                <a href="mesConsultations" class="w3-bar-item w3-button">Mes Consultations</a>
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
            <img class="w3-modal-content" src="<?="UsersCache/photoProfile/".$profile[0]['PHOTOPROFILE']?>" style="width: 500px; height: 500px">
          </div>

    <div id="mainDiv">

            <div class="w3-row-padding w3-center w3-section">

                    <div class="w3-card w3-container w3-teal w3-center w3-round-large" id="#home">
                               
                               <div class="w3-section">
           
                                       <div class="w3-container w3-margin w3-padding-large w3-round-large">
           
                                           <h3>Couldn't think of anything to put here</h3>
                                           <div class="w3-card w3-margin w3-round-large w3-border-red w3-pale-blue" >
           
                                               <div class="w3-container" style="font-size: 20px; font-weight: 200; font-family: 'Open Sans Condensed';">
                                                
                                                   <table  style=" margin-left: 350px" class="w3-table w3-margin-top">

                                                    <tr>
                                                        <td id="image_td" style="width: 300px" rowspan="4">
                                                                <img src="<?="UsersCache/photoProfile/".$profile[0]['PHOTOPROFILE']?>" onclick="document.getElementById('modal01').style.display='block'" class="w3-circle" alt="profile_picture" style="width: 200px; height: 200px; cursor: pointer;"> 
                                                        </td>
                                                    </tr>

                                                           <tr>
                                                               <td><?= $profile[0]['NOM']?></td>
                                                           </tr>
                                                           <tr>
                                                               <td>Speciality</td>
                                                           </tr>
                                                           <tr>
                                                               <td>Workplace</td>
                                                               
                                                           </tr>

                                                           <tr><td colspan="2" style="padding-left: 315px"><button class="w3-button w3-border w3-hover-teal w3-white w3-round-xlarge">Hey</button> <button class="w3-button w3-border w3-hover-teal w3-white w3-round-xlarge" style="margin-left: 10px">Hello</button></td></tr>
                                                        
                                                   </table>
                                                   
                                               </div>
           
                                               
                               </div>
           
               </div>

    </div>
</div>
</div>
</div>
    <?php require('Partials/footer.php')?>