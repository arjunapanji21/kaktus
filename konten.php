<?php 
if (isset($_GET['m']))
{
	if($_GET['m'] == 'riwayat')
	{
		include("riwayat.php");
	}
	if($_GET['m'] == 'tentang')
	{
		include("tentang.php");
	}
}
else
	{
		include("dashboard.php");
	}
 ?>
