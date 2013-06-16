<?php
		
		if($header == false)
		{
	?>
		<form action="?page=userpage&action=header" method="post" id="create_header">
			<label for="background">Background:</label>
			<input type="text" name="background" /><br />
			<?php
				if(isset($header_res['background']))
					echo '<p style="color:red;">'.$header_res['background'].'</p>';
			?>
			<label for="logo">Logo:</label>
			<input type="text" name="logo" /><br />
			<?php
				if(isset($header_res['logo']))
					echo '<p style="color:red;">'.$header_res['logo'].'</p>';
			?>
			<label for="logo_pos">Logo Position:</label>
			<input type="text" name="logo_pos" /><br />
			<?php
				if(isset($header_res['logo_pos']))
					echo '<p style="color:red;">'.$header_res['logo_pos'].'</p>';
			?>
			<label for="title">Title:</label>
			<input type="text" name="title" /><br />
			<?php
				if(isset($header_res['title']))
					echo '<p style="color:red;">'.$header_res['title'].'</p>';
			?>
			<label for="title_pos">Title Position:</label>
			<input type="text" name="title_pos" /><br />
			<?php
				if(isset($header_res['title_pos']))
					echo '<p style="color:red;">'.$header_res['title_pos'].'</p>';
			?>
			<label for="font_size">Font-size:</label>
			<input type="text" name="font_size" /><br />
			<?php
				if(isset($header_res['font_size']))
					echo '<p style="color:red;">'.$header_res['font_size'].'</p>';
			?>
			<label for="color">Color:</label>
			<input type="text" name="color" /><br />
			<?php
				if(isset($header_res['color']))
					echo '<p style="color:red;">'.$header_res['color'].'</p>';
			?>
			<label for="font_style">Font-style:</label>
			<input type="text" name="font_style" /><br />
			<?php
				if(isset($header_res['font_style']))
					echo '<p style="color:red;">'.$header_res['font_style'].'</p>';
			?>
			<label for="size">Size:</label>
			<input type="text" name="size" /><br />
			<?php
				if(isset($header_res['size']))
					echo '<p style="color:red;">'.$header_res['size'].'</p>';
			?>
			<input type="submit" value="create header" />
		</form>
			
	<?php
		}
		else 
		{
			$size = str_replace('x', '; height:', $header[10]);
			$style ='background:#'.$header[2].
			'; font-size:'.$header[7].
			'; color:#'.$header[8].
			'; font-family:'.$header[9].
			'; width:'.$size.';';	
			
		?>
		
		<div style="<?php echo $style; ?>">
			<?php echo $header[4]; ?>
		</div>
		
		<?php
	
		}
	
	?>