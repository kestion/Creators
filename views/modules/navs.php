<?php
		
		if($nav != false)
		{
			?>
				<div style="<?php echo $style; ?>; height:20px; line-height:20px; text-align:center;">
					<ul style="width:100%; padding:0;">
					<?php
					foreach($nav as $v)
					{
						?>
							<li style='display:inline'>
								<?php echo $v['title']; ?>
							</li>
						<?php
					}
					?>
					</ul>
				</div>
			<?php
	
		}
			?>
				<form action="?page=userpage&action=nav" method="post" id="create_nav">
					<label for="title">Title:</label>
					<input type="text" name="title" /><br />
					<?php
						if(isset($nav_res['title']))
							echo '<p style="color:red;">'.$nav_res['title'].'</p>';
					?>
					<input type="submit" value="create page" />
				</form>
			<?php
		
		?>
	