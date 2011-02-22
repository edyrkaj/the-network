		<div id="v_leftmenucol">
			<?php $this->load->view($leftmenu); ?>
		</div>
		
		<div id="v_rightcol">
			
			<div id="memberhome">
				<h3>Redigera din portfolio</h3>
				<div style="margin-top: -10px" id="line"></div>
				<p>Här kan du redigera din portfolio. Om du vill ta bort bilder drar du dem
				till papperskorgen.<br /> Du <a style="text-decoration: underline; font-style:bold; 
				color: #4f011a;" href="processimg/thumbalize">klickar här</a> om du vill ladda upp fler bilder.</p><br />
			

	<?php
		
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
			foreach($files as $file)
			{
				$count++;
				echo '<a class="draggable" rel="example_group" href="',$image_dir,str_replace('-thumb','',$file),'"><img src="',$image_dir,$file,'" width="100" height="100" /></a>';
				if($count % $per_column == 0) { echo '<div class="clear"></div>'; }
			}
		
			echo '<img class="trashcan" src="images/siteimages/trashcan.png" />';	
		
		}
		else
		{
			echo '<p>There are no images in this gallery.</p>';
		}
		
	?>
	

	
</div>