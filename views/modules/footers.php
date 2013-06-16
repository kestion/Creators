<?php
		
		if($header == false)
		{
	?>
		<p>You need to set your header first.</p>
			
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
		
		<div style="<?php echo $style; ?>; height:50px; text-align:center; line-height:50px;">
			<p>www.creators.com</p>
		</div>
		
		<?php
	
		}
	
	?>