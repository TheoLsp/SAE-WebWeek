


<!DOCTYPE html> 
<html lang="fr">

	<head>
	  	<link rel="stylesheet" type="text/css" href="CSS/connexion.css">
		<title>The European Meals Tour - Modification de plats</title>
		<?php
      		require_once("Php/meta.php");
    	?>
	</head>
	<body>
		<?php

			// Protection pour que personne ne puisse accèder a la page s'il n'est pas passé par le formulaire de la page connexion.php
			if (isset($_GET["id"])){
				$id_plat = $_GET["id"];
                

                $connection = new PDO('mysql:host=localhost;port=3306;dbname=webweek','root','');
                $requete = 'SELECT * FROM plat WHERE id_plat ='. $id_plat;
                $resultat = $connection ->query($requete);
                $tabPlat = $resultat -> fetchAll();
                $resultat -> closeCursor();

                $requete = 'SELECT * FROM region WHERE id_region = '.$tabPlat[0]["id_region"];
                $resultat = $connection ->query($requete);
                $tabRegion = $resultat -> fetchAll();
                $resultat -> closeCursor();


        ?>

					<fieldset>
                        <from action="" method="POST">
            		    <legend><?php echo $tabPlat[0]["nom_plat"] ?></legend>

                            <p>
                                <label for ="description">Description :</label>
                                <textarea type="text" name ="description"><?php echo($tabPlat[0]["description_plat"]); ?></textarea>
                            </p>

                            <p>
                                <label for ="ingredient">Ingredients :</label>
                                <textarea type="text"  name ="ingredient"><?php echo($tabPlat[0]["ingredients_plat"]); ?></textarea>
                            </p>

                            
                        <form>
				</fieldset>

					<?php
				}

				else{
					header('Location: connexion.php');
					exit();
				}
			



?>




        
    </body>

</html>