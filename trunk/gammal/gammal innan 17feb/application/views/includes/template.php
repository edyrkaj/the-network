<?PHP
	
	$this->load->view('includes/header.php', $menu, $personnummer=0);

	
	$this->load->view($main_content, $menu, $leftmenu=0);
	
	
	$this->load->view('includes/footer.php');















