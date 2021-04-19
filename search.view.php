<?php $title='Search'?>
<?php require('Partials/header.php')?>
<style>
      
        #myGrid{
display: grid;
grid-template-columns: 1fr 1fr 1fr 1fr;
grid-gap: 10px;
align-items: center;
grid-template-areas: 
"card card card card"
"card card card card"
"pages pages pages pages";		

}

.pages{
	grid-area: pages;
}
      
      </style>
<div class="w3-sidebar w3-pale-blue w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
<button class="w3-bar-item w3-button w3-large"
onclick="w3_close()">Close &times;</button>
<form action="search" method="get" >
<input class="w3-input" type="text" placeholder="Search.." name="search">
<button class="w3-button" type="submit"><i class="fa fa-search"></i></button>
</form>
<a href="<?= $_SESSION['role']?>" class="w3-bar-item w3-button">Mes Informations</a>
<a href="consultationsPatient" class="w3-bar-item w3-button">Mes Consultations</a>
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



<div id="mainDiv">

<div class="w3-row-padding w3-center w3-section">

<div class="w3-card w3-container w3-teal w3-center w3-round-large" id="#home">

<div class="w3-section">

<div class="w3-container w3-margin w3-padding-large w3-round-large">

<h3>Resultats de Recherche:</h3>
<div class="w3-card w3-margin w3-round-large w3-border-red w3-pale-blue" >

<div id="myGrid"  style="font-size: 20px; font-weight: 200; font-family: 'Open Sans Condensed'; padding: 10px">
<?php if ($rows>=1) : ?>
<?php foreach($cards as $card) : ?>
	<div id="modal01" class="w3-modal w3-animate-zoom w3-center" onclick="this.style.display='none'">
<img class="w3-modal-content" src="<?="UsersCache/photoProfile/". $card->PHOTOPROFILE?>" style="width: 500px; height: 500px">
</div>
<div class="w3-card w3-white w3-round-xlarge card" style="border: 2px solid teal">

        <img src="<?="UsersCache/photoProfile/". $card->PHOTOPROFILE?>" class="w3-circle" style="display: inline-block; width: 100px; height: 100px" alt="placeHolder"><div> <?=$card->NOM . ' '. $card->PRENOM?></div>
        <div>
        <?php echo '<a  href="profile?profile='.$card->ID_USER.'" style="text-decoration: none" style="margin-right: 5px; margin-bottom: 5px" class=" w3-round-xlarge w3-button w3-hover-pale-blue  w3-border" >Profile </a>';?>

        <?php echo '<a  href="#" style="text-decoration: none" style="margin-right: 5px; margin-bottom: 5px" class=" w3-round-xlarge w3-button w3-hover-pale-blue  w3-border" >Contact </a>';?>
    </div>
</div>
<?php endforeach;?>
<div class="pages">
<?php for ($page=1; $page<=$pages ; $page++) : ?>
	<?= '<a href="search?page='. $page .'">'.$page?>
<?php endfor; ?>
<?php else : ?>
	<h1 style="padding-left: 490px" >No Results</h1>
<?php endif;?>
</div>
</div>
</div>   
</div>

</div>
</div>        
</div>

</div>

<?php require('Partials/footer.php')?>