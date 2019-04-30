<?php
session_start();

// chargement de la base de donne
$bdd= new PDO('mysql:host=localhost;dbname=eceshop;charset=utf8','root','');

if(isset($_SESSION['id']))
{

	$reqacheteur=$bdd->prepare("SELECT * FROM acheteurs WHERE id =?");
	$reqacheteur->execute(array($_SESSION['id']));
	$acheteursinfo=$reqacheteur->fetch();

	


?>



<!DOCTYPE html>
<html>

	<head>
		<title> Votre Compte </title>
	</head>


	<body>
		<div >
			<h1 align="center"> Modifier information </h1>
			<br /> <br/> 

			<!-- on verifie que lutilisateur n'a pas changer l'id -->
			<?php if($acheteursinfo['id']==$_SESSION['id'])
			{ ?>
				<h2 align="center"> Bonjour <?php echo $acheteursinfo['pseudo'] ?></h2>

					<table>
						<tr>
							<td align="right">
								<!-- pour le nom -->
								<label for "nom">Nom :</label>
							</td>

							<td align="right">
								<input type="text" placeholder="votre nom" name="nom"  value="<?php echo $acheteursinfo['nom'] ?>"/>
							</td>
						</tr>

						<tr>
							<td align="right">
								<!-- pour le prenom -->
								<label for "prenom">Prenom :</label>
							</td>

							<td align="right">
								<input type="text" placeholder="votre prenom" name="prenom" value="<?php echo $acheteursinfo['prenom'] ?>"/>
							</td>
						</tr>

						<tr>
							<td align="right">
								<!-- pour l'adresse -->
								<label for "adresse">Adresse :</label>
							</td>

							<td align="right">
								<input type="text" placeholder="votre Adresse" name="adresse" value="<?php echo $acheteursinfo['adresse'] ?>"/>
							</td>
						</tr>

						
						<tr>
							<td align="right">
								<!-- pour le speudo -->
								<label for "pseudo">Pseudo :</label>
							</td>

							<td align="right">
								<input type="text" placeholder="votre Pseudo" name="pseudo" value="<?php echo $acheteursinfo['pseudo'] ?>"/>
							</td>


						</tr>


						<tr>
							<td align="right">
								<!-- pour le speudo -->
								<label for "mail">Mail :</label>
							</td>

							<td align="right">
								<input type="text" placeholder="votre Maio" name="mail" value="<?php echo $acheteursinfo['mail'] ?>"/>
							</td>


						</tr>

						
					</table>
					
					
			<?php 
			}
			else
			{
				$erreur = "VOUS AVEZ PAS  ACCES AUX AUTRES COMPTES";
			}
			?>

			

			<?php
			//on verifie si il y a une erreur et on laffiche en bas
				if(isset($erreur))
					{
						echo '<font color="red">' .$erreur. " </font>";
					}

			?>
		</div>
	</body>

</html>
<?php
}
else
{
	header("Location: connexion.php");
}
?>