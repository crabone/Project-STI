<?php
require_once('php/session/function.php');

if (!isLogon()) {
	header('Location: index.php');
}

if (!isset($_POST['id']) && !empty($_POST['id'])) {
	header('Location: inbox.php');
}

require_once('header.php');
?>
		<!-- Main -->
			<div id="main">

				<!-- About Me -->
					<section id="about" class="three">
						<div class="container">

							<header>
								<h2>About Me</h2>
							</header>

							<?php
							
							$result =  $file_db->query("SELECT * FROM messages WHERE id='{$_POST['id']}'");
							$message = $result->fetch(PDO::FETCH_ASSOC);

							$result =  $file_db->query("SELECT * FROM users WHERE id='{$message['id_from']}'");
							$from = $result->fetch(PDO::FETCH_ASSOC);

							echo '<p>' . $from . '</p>';
							echo '<p>' . $message['subject'] . '</p>';
							echo '<p>' . $message['content'] . '</p>';

							?>


							<p></p>

						</div>
					</section>


			</div>
			<?php	require_once('footer.php'); ?>
