<section class='content'>
  <div class='row'>
	<div class='col-xs-12'>
	  <div class='box'>
		<div class='box-header'>
		  <h3 class='box-title'>DATA RIWAYAT KELEMBABAN KAKTUS</h3>
		</div><!-- /.box-header -->
		<div class='box-body'>
		<table class="table table-bordered table-striped" id="mytable">
			<thead>
				<tr>
					<th style="text-align:center;">Waktu Pendeteksian</th>
					<th style="text-align:center;">Kelembaban</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					include ("koneksi.php");
					$qr = mysqli_query($link, "SELECT * FROM tbl_kaktus");
					while($row = mysqli_fetch_array($qr, MYSQLI_ASSOC)) {
				 ?>
				
				<tr>
					<td style="text-align:center;"><?php echo $row['time']; ?></td>
					<td style="text-align:center;"><?php echo $row['humidity']; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<script src="template/js/jquery-1.11.2.min.js"></script>
		<script src="template/datatables/jquery.dataTables.js"></script>
		<script src="template/datatables/dataTables.bootstrap.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$("#mytable").dataTable();
			});
		</script>
		</div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->