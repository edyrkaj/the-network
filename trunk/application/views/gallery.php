		<div id="v_leftmenucol">
			<?php $this->load->view($leftmenu); ?>
		</div>
		
		<div id="v_rightcol">
			
			<div id="memberhome">
				<h3><?php echo $username ?>s portfolio</h3>
				<div style="margin-top: -10px" id="line"></div>
				
			

	<?php
		
		//print_r($fbpictures);
		
		/* settings */
		
		
		/* step one:  read directory, make array of files */
		if ($handle = opendir($image_dir)) {
			while (false !== ($file = readdir($handle))) 
			{
				if ($file != '.' && $file != '..') 
				{
					if(strstr($file,'-thumb'))
					{
						$files[] = $file;
					}
				}
			}
			closedir($handle);
		}
		
		/* step two: loop through, format gallery */
		if(count($files) != 0)
		{
			$count = 0;
			foreach($files as $file) {
				$count++;
				echo '<a class="draggable" rel="example_group" href="../',$image_dir,str_replace('-thumb','',$file),'"><img src="../',$image_dir,$file,'" width="100" height="100" /></a>';
				if($count % $per_column == 0) { echo '<div class="clear"></div>'; }
			}
		}
		else
		{
			echo '<p>There are no images in this gallery.</p>';
		}
		
		
		if($fbpictures) {
					
		//	print_r($fbpictures['fbimages']);
		
			$fblargepics = $fbpictures['fbimages'];
		//	print_r($fblargepics;
		
			$count2=0;
			foreach($fblargepics as $pictures) {
							
				$count2++;
				echo '<a class="draggable" rel="example_group" href="' . $pictures . '">';
				echo '<img src="' . $pictures . '" width="100" height="100" /></a>';
			//	if($count % $per_column == 0) { echo '<div class="clear"></div>'; }

			}
		}
			
		
			
		
			
		
	
	?>
	

	
</div>