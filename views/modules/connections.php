<p id="login">Login</p>
			<form action="index.php?action=login" method="post" id="login_form"  <?php if(isset($errors)) echo 'style="display:block;"'; ?>
				<label for="login">Login</label>
				<input type="text" name="login" placeholder="login" /><br />
				<label for="psswd">Password</label>
				<input type="text" name="psswd" placeholder="password" /><br />
				<?php
					if(isset($errors['psswd']))
						echo '<p style="color:red;">'.$errors['connect'].'</p>';
				?>
				<input type="submit" value="login" />
			</form>
			
			<p id="register">Register</p>
			<form action="index.php?action=register" method="post" id="register_form" <?php if(isset($errors)) echo 'style="display:block;"'; ?>
				<label for="login">Login</label>
				<input type="text" name="login" placeholder="login" /><br />
				<?php
					if(isset($errors['login']))
						echo '<p style="color:red;">'.$errors['login'].'</p>';
				?>
				<label for="psswd">Password</label>
				<input type="text" name="psswd" placeholder="password" /><br />
				<label for="psswd_verif">Password</label>
				<input type="text" name="psswd_verif" placeholder="password" /><br />
				<?php
					if(isset($errors['psswd']))
						echo '<p style="color:red;">'.$errors['psswd'].'</p>';
				?>
				<label for="email">Email</label>
				<input type="text" name="email" placeholder="email" /><br />
				<label for="email_verif">Email</label>
				<input type="text" name="email_verif" placeholder="email" /><br />
				<?php
					if(isset($errors['email']))
						echo '<p style="color:red;">'.$errors['email'].'</p>';
				?>
				<input type="submit" value="register" />
			</form>