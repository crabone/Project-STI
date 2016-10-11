<?php
require_once('php/session/function.php');

if (!isLogon()) {
	header('Location: index.php');
}

require_once('header.php');
?>
		<!-- Main -->
			<div id="main">

				<!-- Write -->
					<section id="contact" class="two">
						<div class="container">

							<header>
								<h2>Envoyer un message</h2>
							</header>
							<?php
							$users =  $file_db->query("SELECT id, username FROM users");

							?>
							<form method="post" action="php/message/send.php">
								<div class="row">
									<div class="6u 12u$(mobile)">Destinataire :
										<select name="to">
											<?php
											foreach ($users as $user) {
												echo '<option value="' . $user['id'] . '">' . $user['username'] . '</option>';
											}
											?>
										</select>
									</div>
									<div class="6u$ 12u$(mobile)">Sujet :
										<input type="text" name="subject" placeholder="subject" />
									</div>
									<div class="12u$">
										<textarea name="content" placeholder="Message"></textarea>
									</div>
									<div class="12u$">
										<input type="submit" value="Envoyer" />
									</div>
								</div>
							</form>

						</div>
					</section>

			</div>
			<?php	require_once('footer.php'); ?>
