<?php
require_once('php/session/function.php');

if (!isLogon()) {
	header('Location: index.php');
}

require_once('header.php');
?>
		<!-- Main -->
			<div id="main">

				<!-- About Me -->
					<section id="inbox" class="two">
						<div class="container">

							<header>
								<h2>Boite de réception</h2>
							</header>

							<p><a href="write.php">Envoyer un nouveau message</a></p>

							<table>
                <thead>
                  <tr>
                    <th>Date de réception</th>
                    <th>Expéditeur</th>
                    <th>Sujet</th>
                  </tr>
                </thead>
                <tbody>
									<?php
									$messages =  $file_db->query("SELECT * FROM messages WHERE id_to='{$_SESSION['id']}'");

									foreach ($messages as $message) {
										$result = $file_db->query("SELECT * FROM users WHERE id='{$message['id_from']}'");
										$user= $result->fetch(PDO::FETCH_ASSOC);

										echo '<tr>';
										echo '	<th>' . $message['time'] . '</th>';
										echo '	<th>' . $user['username'] . '</th>';
										echo '	<th>' . $message['subject'] . '</th>';
										echo '	<th><a href="write.php?to=' . $message['id_from'] . '&reply=' . $message['id'] . '">Répondre</a></th>';
										echo '	<th><a href="php/message/delete.php?id=' . $message['id'] . '">Supprimer</a></th>';
										echo '	<th><a href="read.php?id=' . $message['id'] . '">Ouvrir</a></th>';
										echo '<tr>';
									}
									?>
                </tbody>
              </table>

						</div>
					</section>

			</div>
			<?php	require_once('footer.php'); ?>
