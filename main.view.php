
<!DOCTYPE html>
<html>
  <head>
      <title>Bienvenu sur HealthGeist</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link rel="icon" href="Images/Logo.png">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300;700&display=swap" rel="stylesheet"> 
      <script src="https://kit.fontawesome.com/c964be31f4.js" crossorigin="anonymous"></script>
      <script src="../someFrontEnd.js"></script>
      <script type="text/javascript">
        function pageLoad() {
            if(window.location.hash==='#login'){
              let y = document.getElementById('loginAccordionButton');
              y.click();
            }
        }
        window.onload = function()
         {
           pageLoad();
          showErrorOrSuccess();
          }
        
        </script>
  </head>

<body>

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

    <div class="w3-display-container w3-teal">
        <div class="w3-container w3-padding-64">
            <img src="Images/Logo.png" class="w3-display-left" style="max-height: 150px; max-width: 150px"></img>
            <h1 class="w3-display-middle" style="font-family: 'Tangerine', serif;">Bienvenue sur HealthGeist!</h1>
          </div>
    </div>

  <div class="w3-bar w3-teal w3-right-align">
      <button class="w3-button w3-teal w3-hover-gray" onclick="goToHome()">Page d'Acceuil</button>
      <button class="w3-button w3-teal w3-hover-gray" onclick="goToEtab()">Consulter Les Etablissments de Santé</button>
      <button class="w3-button w3-teal w3-hover-gray" onclick="goToLoginAccordion()">Se Connecter</button>
      </div>

  <div class="w3-row-padding w3-center w3-section">
    <div class="w3-card w3-container w3-teal w3-center w3-round-large" id="#home">
      <div class="w3-display-container">
          <img src="Images/Hospital.jpg" alt="HealthGeist" style="width: 100%; max-width: width 400px; max-height: 300px;" class="w3-image w3-opacity-max w3-margin-top w3-round-large"></img>
          <div class="w3-display-middle w3-xlarge" style="font-family: 'Open Sans Condensed', sans-serif; font-weight: 700;">Consultez Votre Médecin Sans Tracas!</div>
      </div>  
        <p style="text-align: center; font-family: 'Open Sans Condensed', sans-serif; font-weight: 200; font-size: 20px">
            Dans le contexte actuel de l'épidémie COVID-19 et la situation sanitaire préoccupante,
            il est nécessaire d’innover/développer des solutions logicielles/en nouvelles technologies 
            qui offrent plusieurs services à distance pour répondre aux différents besoins des utilisateurs, 
            afin de réduire au maximum les déplacements inutiles de ces derniers et renforcer les mesures préventives
             prises par les autorités sanitaires. 
             Dans ce cadre, nous avons eu l’idée de mettre en place un site numérique
              qui va fournir deux services globaux, le premier va permettre à l’utilisateur un accès instantané
               à l’information en obtenant la localisation la plus proche d’un emplacement recherché,
                le deuxième va offrir la possibilité de réaliser un téléconseil médical à distance.
        </p>
        <div class="w3-half w3-margin-bottom">
            <div class="w3-card w3-container w3-round-large w3-hover-shadow" onclick="goToEtab()"  style="min-height:460px; cursor: pointer">
                <h3>Consultez les Etablissments de Santé</h3><br>
                <i class="fas fa-prescription-bottle-alt w3-margin-bottom" style="font-size:120px"></i>
                <p>Annuaire Gratuit 100% Gratuit</p>
                <p>Trouvez rapidement les établissments les plus proches de chez vous en ligne</p>
                <p>Rendre Accessible Toutes les Informations des Etablissments!</p>
                </div>
        </div>
        <div class="w3-half w3-margin-bottom">
            <div class="w3-card w3-container w3-round-large w3-hover-shadow w3-margin-left" onclick="goToLoginAccordion()"  style="min-height:460px; cursor: pointer">
                <h3>Accédez au Espace Télé-Consultation</h3><br>
                <i class="fas fa-laptop-medical w3-margin-bottom" style="font-size:120px"></i>
                <p>Plate-forme de Télé-conseil Médical Gratuti</p>
                <p>Consultation Professionnelle Assurée par des Médecins Bénévoles</p>
                <p>Utilisation Facile et Intuitive</p>
                <p>Échange Entre Patients et Médecins par Messagerie!</p>
                </div>
        </div>
    </div>
  </div>

  <button onclick="controlLoginAccordion()" id='loginAccordionButton' class="w3-button w3-block w3-center-align">
      Section d'Authentification</button>
      
<div class="w3-container w3-hide" id="loginAccordion">
    <div class="w3-row-padding w3-center w3-margin-top">
        <div class="w3-half">
            <div class="w3-card w3-container w3-hover-green w3-hover-opaque" onclick="openLoginD()" style="min-height:300px; cursor: pointer" id="loginAnchor">
                <h3 class="w3-margin-top">Espace Docteur</h3><br>
                <i class="fas fa-user-md w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
                </div>
        </div>
        <div class="w3-half">
            <div class="w3-card w3-container w3-hover-green w3-hover-opaque" onclick="openLoginP()" style="min-height:300px; cursor: pointer">
                <h3 class="w3-margin-top">Espace Patient</h3><br>
                <i class="fas fa-user w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
                </div>
        </div>
        </div>
      <div class="w3-container w3-margin-top w3-margin-bottom w3-center">
        <button class="w3-button w3-teal w3-hover-green w3-round" onclick="openSignUpModal()">Pas de compte? Cliquez ici!</button>
      </div>
</div>

<div id="SignUpModal" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="closeSignUpModal()" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Fermer">&times;</span>
      </div>

      <form class="w3-container" action="/signUpForm" onsubmit="return validateForm()" method="post" id="signUpForm" name="signUpForm" enctype="multipart/form-data">
        <div class="w3-section">
          <label><b>Nom</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Veuillez taper votre nom" name="nom" required>
          <label><b>Prénom</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Veuillez taper votre prénom" name="prenom" required>
          <label><b>Numéro de CIN</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Veuillez taper le numero de votre CIN" name="cin" required>
          <label><b>Date de Naissance</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="date" name="dateNaissance" required>
          <div class="w3-margin-bottom">
            <label><b>Sexe</b></label>
            <input class="w3-radio" type="radio" name="sexe" value="m" checked><label>Male</label>
            <input class="w3-radio" type="radio" name="sexe" value="f"><label>Female</label>
          </div>
          <label><b>Email</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Veuillez taper votre adresse email" name="email" required>
          <label><b>Confirmez Votre Adresse Email</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Veuillez confirmer votre adresse email" name="email2" required>
          <label><b>Mot de Passe</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Tapez votre mot de passe" name="password" required>
          <label><b>Confirmez Votre Mot de Passe</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Veuillez confirmer votre mot de passe" name="password2" required>
          <div class="w3-margin-bottom">
            <label><b>Vous Êtes Docteur ou Patient?</b></label>
            <input class="w3-radio" type="radio" name="role" value="p" checked onclick="hideDocStuff()"><label>Patient</label>
            <input class="w3-radio" type="radio" name="role" value="d" onclick="showDocStuff()"><label>Docteur</label>
          </div>
          <div id="docStuff" style="display: none;">
            <label><b>Spécialité</b></label>
            <select class="w3-border w3-margin-bottom" name="specialite" form="signUpForm">
              <option value="generaliste">Généraliste</option>
              <option value="cardiologue">Cardiologue</option>
              <option value="gynecologue">Gynécologue</option>
            </select><br>
            <label><b>Justificatif</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="file"  name="justificatif" id="docJustificatif" >
          </div>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" value="submit">S'inscrire</button>
        </div>
       
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="closeSignUpModal()" type="button" class="w3-button w3-red">Annuler</button>
      </div>

    </div>
  </div>

  <div id="loginModalP" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="closeLoginP()" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Fermer">&times;</span>
      </div>

      <form class="w3-container" action="">
        <div class="w3-section">
          <label><b>Email</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Tapez votre email" name="email" required>
          <label><b>Mot de Passe</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Tapez votre mot de passe" name="password" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Connexion</button>
          <input class="w3-check w3-margin-top" type="checkbox" name="rememberMe" value="rememberMe" checked> Se souvenir de moi
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="closeLoginP()" type="button" class="w3-button w3-red">Annuler</button>
        <span class="w3-right w3-padding w3-hide-small"><a href="#">Mot de passe oublié?</a></span>
      </div>

    </div>
  </div>
  <div id="loginModalD" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="closeLoginD()" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Fermer">&times;</span>
      </div>

      <form class="w3-container" action="">
        <div class="w3-section">
          <label><b>Email</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Tapez votre email" name="email" required>
          <label><b>Mot de Passe</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Tapez votre mot de passe" name="password" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Connexion</button>
          <input class="w3-check w3-margin-top" type="checkbox" name="rememberMe" value="rememberMe" checked> Se souvenir de moi
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="closeLoginD()" type="button" class="w3-button w3-red">Annuler</button>
        <span class="w3-right w3-padding w3-hide-small"><a href="#">Mot de passe oublié?</a></span>
      </div>

    </div>
  </div>

</body>
</html>