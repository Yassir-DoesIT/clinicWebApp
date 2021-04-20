<?php $title='Espace Administrateur'?>
<?php require 'partials/header.php'?>
<style>
      
      #myGrid{
              display: grid;
              grid-template-columns: repeat(4, 24.35%);
              grid-gap: 10px;

      }
    
    </style>
    <div class="w3-display-container w3-teal">
        <div class="w3-container w3-padding-64">
            <img src="Images/Logo.png" class="w3-display-left" style="max-height: 150px; max-width: 150px"></img>
            <h1 class="w3-display-middle" style="font-family: 'Open Sans Condensed', serif;">Espace Administrateur</h1>
          </div>
    </div>
    <div class="w3-bar w3-teal w3-right-align">
        <button class="w3-button w3-teal w3-hover-gray" onclick="goToAdminLogOut()">Se Déconnecter</button>
    </div>
    <div class="w3-center w3-section">
        <div class="w3-card w3-container w3-teal w3-center w3-round-large" style="padding: 0" id="#home">
            <div class="w3-row" style="width: 100%">
                
                    <div class="w3-card w3-third w3-margin w3-round-large w3-hover-green w3-hover-opaque" onclick="openInsertModal()" style="width:30% ; cursor: pointer">
                        <h3>Ajoutez des Etablissments de Santé</h3><br>
                        <i class="fas fa-plus-square w3-margin-bottom" style="font-size:120px"></i>
                        <p></p>
                        <p>Insérez des Etablissments Dans la Base de Données</p>
                        <p>Verifiez la Base de Données Aprés Tout Insertion!</p>
                        <p></p>
                    </div>
                    <div class="w3-card w3-third w3-margin w3-round-large w3-hover-green w3-hover-opaque" onclick="openEditModal()" style="width:30% ; cursor: pointer">
                        <h3>Modifier la Permanence</h3><br>
                        <i class="fas fa-edit w3-margin-bottom" style="font-size:120px"></i>
                        <p></p>
                        <p>Modifier les Données d'Un Etablissment</p>
                        <p>Mise à Jour des Pharmacies de Garde</p>
                        <p></p>
                    </div>
                    <div class="w3-card w3-third w3-margin w3-round-large w3-hover-green w3-hover-opaque" onclick="controlDoctorsAccordion()" style="width:30% ; cursor: pointer">
                        <h3>Approuvez des Docteurs</h3><br>
                        <i class="fas fa-user-plus w3-margin-bottom" style="font-size:120px"></i>
                        <p></p>
                        <p>Vérifiez l'Application des Docteurs</p>
                        <p>Attestations de Travail, Diplome de Médecin</p>
                        <p></p>
                    </div>
                
        </div>
    </div>
    
    </div>

    <div id="insertModal" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
    
          <div class="w3-center"><br>
            <span onclick="closeInsertModal()" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Fermer">&times;</span>
          </div>
    
          <form class="w3-container" action="admin" method="post" id="insertForm" name="insertForm">
            <div class="w3-section">
                  <label><b>Veuillez Selectioner la Ville</b></label>
                  <select name="cityDropDownInsert" id="cityDropDownInsert" onchange="getCityInsert(this.value)">
                  <option selected disabled value="---">---------</option>
                  <option value="Oujda">Oujda</option>
                      <option value="Laayoune">Laayoune</option>
                      <option value="Taroudant">Taroudant</option>
                      
                  </select><br>
                  <div id="quartierDiv">
                  <label><b>Veuillez Selectioner le Quartier</b></label>
                  <select style="margin-top: 5px" name="quartierDropDownInsert" id="quartierDropDownInsert"><option selected disabled>---------</option>
                  
                </select><br>
    </div>
              <label><b>Nom de l'Etablissment</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Veuillez taper le nom de l'établissment" name="nom" required>
              <div class="w3-margin-bottom">
                <label><b>Est-il Permanence?</b></label>
                <input class="w3-radio" type="radio" name="permanence" value="1" checked><label>Oui</label>
                <input class="w3-radio" type="radio" name="permanence" value="0"><label>Non</label>
              </div>

              <label><b>Latitude</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Veuillez taper la latitude" name="lat" required>
              <label><b>Longitude</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Veuillez taper la longitude" name="lng" required>
    
              </div>
              <button class="w3-button w3-block w3-green w3-section w3-padding" name="insertForm" type="submit" value="submit">Insérez</button>
              <button onclick="closeInsertModal()" type="button" class="w3-button w3-block w3-section w3-padding w3-red">Annuler</button>
            </div>
           
          </form>
    
          
    
        </div>

        <div id="editModal" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        
              <div class="w3-center"><br>
                <span onclick="closeEditModal()" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Fermer">&times;</span>
              </div>
        
              <form class="w3-container" action="admin" method="post" id="editForm" name="editForm">
                <div class="w3-section">
                  <label><b>Veuillez Selectioner la Ville</b></label>
                  <select name="cityDropDown" id="cityDropDown" onchange="getCity(this.value)">
                  <option selected disabled value="---">---------</option>
                  <option value="Oujda">Oujda</option>
                      <option value="Laayoune">Laayoune</option>
                      <option value="Taroudant">Taroudant</option>
                      
                  </select><br>
                  <div id="quartierDiv">
                  <label><b>Veuillez Selectioner le Quartier</b></label>
                  <select style="margin-top: 5px" name="quartierDropDown" onchange="getQuartier(this.value)" id="quartierDropDown"><option selected disabled>---------</option>
                  
                </select>
                  </div>
                  <div id="serviceDiv">
                  <label><b>Veuillez Selectioner l'Etablissment</b></label>
                  <select style="margin-top: 5px" name="serviceDropDown" onchange="fillForm(this.value)" id="serviceDropDown"><option selected disabled value="---">---------</option>
                </select>
                  </div>
                  <div id="hiddenDiv">
                    <div class="w3-margin-bottom" id="permanenceDiv">
                        <label><b>Est-il Permanence?</b></label>
                        <input class="w3-radio" id="radioTrue" type="radio" name="permanence" value="1"><label>Oui</label>
                        <input class="w3-radio" id="radioFalse" type="radio" name="permanence" value="0"><label>Non</label>
                      </div>
                      <label><b>Nom de l'Etablissment</b></label>
                      <input id="nomEtab" class="w3-input w3-border w3-margin-bottom" type="text" name="nom" required>
                      <label><b>Latitude</b></label>
                      <input class="w3-input w3-border w3-margin-bottom" type="text" id="latEtab" name="lat" required>
                      <label><b>Longitude</b></label>
                      <input class="w3-input w3-border w3-margin-bottom" type="text" id="lngEtab" name="longitude" required>           
                      </div>
                      <div class="w3-container ">
                      <button class="w3-button w3-block w3-green w3-section w3-padding" name="editForm" type="submit" value="submit">Insérez</button>
                <button onclick="closeEditModal()" type="button" class="w3-button w3-block w3-section w3-padding w3-red">Annuler</button>
              </div>
                      
                    </div>
               
              </form>
        
    
              
        
            </div>
</div>

<div class="w3-container w3-hide" id="doctorsAccordion">
<div id="mainDiv">

<div class="w3-row-padding w3-center w3-section">

<div class="w3-card w3-container w3-teal w3-center w3-round-large" id="doctorsAnchor">

<div class="w3-section">

       <div class="w3-container w3-margin w3-padding-large w3-round-large">

           <div class="w3-card w3-margin w3-round-large w3-border-red w3-pale-blue" >

               <div id="myGrid"  style="font-size: 20px; font-weight: 200; font-family: 'Open Sans Condensed'; padding: 10px">
                   
                        <div class="w3-card w3-white w3-round-xlarge" style="border: 2px solid teal">
                                <img src="placeHolder.jpg" class="w3-circle" style="display: inline-block; width: 100px; height: 100px" alt="placeHolder"><div> PLACEHOLDER</div><div><button style="margin-right: 5px; margin-bottom: 5px" class=" w3-round-xlarge w3-button w3-hover-pale-blue  w3-border">PLACEHOLDER</button><button style="margin: 0 0 5px 0" class="w3-button w3-border w3-hover-pale-blue w3-round-xlarge">PLACEHOLDER</button></div>
                        </div>
                       
                   
               </div>
            </div>   
    </div>
               
</div>
</div>        
</div>

</div>
</div>
<?php require 'partials/footer.php'?>