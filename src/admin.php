<?php
require_once('php/session/function.php');

if (!isLogon()) {
	header('Location: index.php');
}

if (!isAdmin()) {
	header('Location: inbox.php');
}

require_once('header.php');
?>
		<!-- Main -->
			<div id="main">

				<!-- About Me -->
					<section id="inbox" class="two">
						<div class="container">

							<header>
								<h2>Gestion des utilisateurs</h2>
							</header>

							<table>
                <thead>
                  <tr>
                    <th>Nom d'utilisateur</th>
                  </tr>
                </thead>
                <tbody>
									<?php
									$users =  $file_db->query("SELECT * FROM users");

									foreach ($users as $user) {
										echo '<tr>';
										echo '	<td>' . $user['username'] . '</td>';
                    echo '	<td><a href="editUser.php?id=' . $user['id'] . '">Éditer</a></td>';
										echo '	<td><a href="php/admin/deleteUser.php?id=' . $user['id'] . '">Supprimer</a></td>';
										echo '<tr>';
									}
									?>
                </tbody>
								<form method="post" action="php/admin/addUser.php">
									<tr>
										<td><input type="text" name="username" placeholder="Userame" /></td>
										<td><input type="password" name="password" placeholder="Password" /></td>
										<td><label><input type="checkbox" name="isActive" /> est actif ?</label><label><input type="checkbox" name="isAdmin" /> est admin ?</label></td>
										<td><input type="submit" value="Ajouter" /></td>
									</tr>
								</form>
              </table>

						</div>
					</section>

			</div>
			<?php	require_once('footer.php'); ?>
