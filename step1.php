<?php
//file_put_contents('./step1.txt', serialize($_REQUEST));
	$params = '?name='.urlencode($_GET['name']).'&amp;pizza='.urlencode($_GET['pizza']).'&amp;phone='.urlencode($_GET['phone']).'&amp;address='.urlencode($_GET['address']).'&amp;nr='.urlencode($_GET['nr']);
?><Response>
<Gather timeout="10" finishOnKey="*" action="http://obp.sous-anneau.org/results.php<?php echo $params; ?>">
<Say language="fr" voice="woman">Bonjour. Ici la COGIP. <?php echo $_GET['name']; ?>  aimerait commander <?php if ($_GET['nr'] == "1") { echo "une";} else {echo $_GET['nr'];} ?> pizza <?php echo $_GET['pizza']; ?>.
	Pourriez-vous lui livrer à l'adresse suivante ? <?php echo $_GET['address']; ?>.  Si vous prenez la commande, merci de taper sur le clavier de votre téléphone le délai en minutes suivi de la touche étoile.</Say>
</Gather>
<Redirect>
http://obp.sous-anneau.org/step1.php<?php echo $params; ?>
</Redirect>
</Response>
