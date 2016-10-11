<?php	require_once('header.php'); ?>
		<!-- Main -->
			<div id="main">

				<!-- Contact -->
					<section id="contact" class="one dark cover">
						<div class="container">

							<header>
								<h2>Welcome</h2>
							</header>

							<p>Elementum sem parturient nulla quam placerat viverra
							mauris non cum elit tempus ullamcorper dolor. Libero rutrum ut lacinia
							donec curae mus. Eleifend id porttitor ac ultricies lobortis sem nunc
							orci ridiculus faucibus a consectetur. Porttitor curae mauris urna mi dolor.</p>

							<header>
								<h2>Login</h2>
							</header>

							<form method="post" action="php/user/login.php">
								<div class="row">
									<div class="12u$"><input type="text" name="username" placeholder="Name" /></div>
									<div class="12u$"><input type="password" name="password" placeholder="Password" /></div>
									<div class="12u$">
										<input type="submit" value="Go" />
									</div>
								</div>
							</form>

						</div>
					</section>

			</div>
			<?php	require_once('footer.php'); ?>
