<?php
require_once('php/session/function.php');

if (!isLogon()) {
	header('Location: index.php');
}

require_once('header.php');
?>
		<!-- Main -->
			<div id="main">

				<!-- Contact -->
					<section id="contact" class="one dark cover">
						<div class="container">

							<header>
								<h2>Changement du mot de passe</h2>
							</header>

							<form method="post" action="#">
								<div class="row">
									<div class="12u$"><input type="password" name="name" placeholder="Nouveau mot de passe" /></div>
									<div class="12u$"><input type="password" name="password" placeholder="Nouveau mot de passe (confirmation)" /></div>
									<div class="12u$">
										<input type="submit" value="Go" />
									</div>
								</div>
							</form>

						</div>
					</section>

			</div>
			<?php	require_once('footer.php'); ?>
