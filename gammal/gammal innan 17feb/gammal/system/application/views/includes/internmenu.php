<div id="menu2">
	<ul id="nav" class="dropdown dropdown-horizontal">
	
	<li><span class="dir">sök</span>
		<ul>
			<li class="mainmenu"><a href="">personer</a></li>
			<li class="mainmenu"><a href="">företag</a></li>
			<li class="mainmenu"><?php echo anchor('/main/jobsearch/', 'jobbannonser') ?></li>
		</ul>
	</li>
	<li><span class="dir">|</li>
	<li><span class="dir">meddelanden</span>
		<ul>
			<li class="mainmenu"><a href="">inkorg</a></li>
			<li class="mainmenu"><a href="">utkorg</a></li>
		</ul>
	</li>
	<li><span class="dir">|</li>
	<li class="externmenu"><span class="dir">favoriter</span>
		<ul>
			<li class="mainmenu"><a href="">personer</a></li>
			<li class="mainmenu"><a href="">företag</a></li>
		</ul>
	</li>
	<li><span class="dir">|</li>
	<li class="mainmenu"><?php echo anchor('/main/mypage/', 'min sida') ?></li>
	<li><span class="dir">|</li>
	<li class="mainmenu" id="stat"><?php echo anchor('/main/statistics/', 'statistik') ?></li>
	<li><span class="dir">|</li>
	<li><?php echo anchor('/validation/logout/', 'logga ut') ?></li>	
</ul>
</div>	