<section class='content'>
	<div style="display: flex; justify-content:center;">
		<div class='grid-1' style="margin: 10px; width: 400px; margin-left:150px;">
			<div class="panel panel-danger ">
				<div class="panel-heading" style="font-size: 20px; text-align: center;">Kelembapan Saat Ini</div>
				<?php 
					include ("koneksi.php");
					$qr = mysqli_query($link, "SELECT humidity FROM tbl_kaktus ORDER BY id DESC LIMIT 1");
					while($row = mysqli_fetch_array($qr, MYSQLI_ASSOC)) {
				?>
				<div class="panel-body" style="font-size: 50px; text-align: center;"><?php echo $row['humidity']; ?></div>
				<?php } ?>
			</div>
		</div>
		<div class='grid-2' style="margin: 10px; width: 400px; margin-right:150px;">
			<div class="panel panel-warning">
				<div class="panel-heading" style="font-size: 20px; text-align: center;">Status Pompa Air</div>
				<?php 
					include ("koneksi.php");
					$qr1 = mysqli_query($link, "SELECT status FROM tbl_pompa");
					while($row1 = mysqli_fetch_array($qr1, MYSQLI_ASSOC)) {
				?>
				<div class="panel-body" style="font-size: 50px; text-align: center;"><?php echo $row1['status']; ?></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div style="width:800px;height:400px;margin:auto;">
		<canvas id="myChart"></canvas>
	</div>
</section>
