<?php $title='Admin Sign in'?>
<?php require 'partials/header.php'?>

 <style>
      
      #myGrid{
              display: grid;
              grid-template-columns: repeat(4, 24.35%);
              grid-gap: 10px;

      }
    
    </style>

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

<div class='w3-modal' id='errorModal'>
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" id='errorChild' style="max-width:600px">  
        <?php if(isset($result['errorMessage'])) : ?>
        <div class="w3-center"><br>
         <span onclick="closeErrorModal()" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Fermer">&times;</span>
       
       </div>
       <div class="w3-container"><?=$result["errorMessage"]?></div><span style="visibility : hidden">;</span>
       
       <?php  elseif(isset($result['successMessage'])) : ?>
          
          <div class="w3-center"><br>
         <span onclick="closeErrorModal()" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Fermer">&times;</span>
       </div>
       <div class="w3-container"><?=$result['successMessage']?></div><span style="visibility : hidden">;</span>
        <?php endif;?>
     </div>   
</div> 
    <div class="w3-display-container w3-teal">
        <div class="w3-container w3-padding-64">
            <img src="Images/Logo.png" class="w3-display-left" style="max-height: 150px; max-width: 150px"></img>
            <h1 class="w3-display-middle" style="font-family: 'Open Sans Condensed', serif;">Espace Administrateur</h1>
          </div>
    </div>
    <div class="w3-section">
        <div class="w3-card w3-container w3-center w3-teal w3-round-large" style="padding: 10px" id="#home">
            <div class="w3-row" style="width: 100%">
                
                    <div class="w3-card w3-margin w3-pale-blue w3-round-large w3-hover-opaque">
                        <h3>Se connecter</h3><br>
                        <form class="w3-container" action="adminSignIn" method="post">
                            <div class="w3-section">
                                    <label><b>Email</b></label>
                                    <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Tapez votre email" name="email" required>
                                    <label><b>Mot de Passe</b></label>
                                    <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Tapez votre mot de passe" name="password" required>
                                    <div class="w3-margin-bottom">
                                    <input type="hidden" name="role" value="a"> 
                            </div>
                            <div>
                                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" value="submit">Se connecter</button>
                            </div>
                        </form>
                    </div>
                
        </div>
    </div>
    
    </div>

    
</div>
<?php require 'partials/footer.php'?>