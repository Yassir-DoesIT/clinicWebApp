<?php $title='Profile de '. $_SESSION['prenom'] . " " . $_SESSION['nom'] ?>
<?php require('Partials/header.php')?>
<?php 
if (isset($_SESSION['prenom']) && isset($_SESSION['nom'])) {
	echo "Hello ". $_SESSION['prenom'] . " " . $_SESSION['nom'] . ", your id is " . $_SESSION['user_id'];}
?>
<div class="w3-display-container"><button class="w3-display-topright"><a href="logout">Log Out</a></button>

<?php require('Partials/footer.php')?>