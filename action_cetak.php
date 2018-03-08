<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=cetakharian.xls");
include_once 'control/koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$data = $_REQUEST['data'];
	$waktu = $_REQUEST['waktu'];
}
if ($data == 'dokumenranmor_join') {
	$data = "dokumenranmor";
?>
	<body>
		<center>
			<h3>DATA <?php echo strtoupper($data)." - ".$waktu; ?></h3>
			<table border="1px solid" style="border-collapse: collapse;">
				<thead>
					<tr align="center" style="text-align: center;">
						<?php
							$query = mysqli_query($link, "SELECT * FROM $data JOIN pengemudi ON $data.noPaspor = pengemudi.noPaspor JOIN kendaraan ON $data.noKendaraan = kendaraan.noKendaraan WHERE $data.waktu='$waktu'");						        		
							while ($hasil = mysqli_fetch_assoc($query)) {
								foreach ($hasil as $key => $value) {
									if ($key == "waktu" || $key== "id" || strpos($key, "_") !== false) {
										// nothing to do			
									} else {
										$pieces = preg_split('/(?=[A-Z])/',$key);
										$hasil = ucfirst(implode(" ", $pieces));
										echo "<th>$hasil</th>";
									}
								}
							}
						?>
					</tr>
				</thead>
				<tbody>
					<?php
						$query = mysqli_query($link, "SELECT * FROM $data JOIN pengemudi ON $data.noPaspor = pengemudi.noPaspor JOIN kendaraan ON $data.noKendaraan = kendaraan.noKendaraan WHERE $data.waktu='$waktu'");
						while ($row = mysqli_fetch_assoc($query)) {
							echo "<tr>";
							foreach ($row as $key => $value) {
								if ($key == "waktu" || $key== "id" || strpos($key, "_") !== false) {
									
								} else {
									echo "<td>$value</td>";
								}
							}								
							echo "</tr>";
						}
					?>
				</tbody>              
			</table>
		</center>
	</body> 
	<?php
		echo '<meta http-equiv="refresh" content="0; URL=cetak.php">';
	?>
	<?php
} else {
	?>
	<body>
		<center>
			<h3>DATA <?php echo strtoupper($data)." - ".$waktu; ?></h3>
			<table border="1px solid" style="border-collapse: collapse;">
				<thead>
					<tr align="center" style="text-align: center;">
						<?php
							$query = mysqli_query($link, "SELECT * FROM $data WHERE waktu='$waktu'");
							while ($hasil = mysqli_fetch_assoc($query)) {								
								foreach ($hasil as $key => $value) {
									if ($key == "waktu" || $key == "id" || strpos($key, "_") !== false) {
										
									} else {
										$pieces = preg_split('/(?=[A-Z])/',$key);
										$hasil = ucfirst(implode(" ", $pieces));
										echo "<th>$hasil</th>";
									}
								}
							}
						?>
					</tr>
				</thead>
				<tbody>
					<?php
						$query = mysqli_query($link, "SELECT * FROM $data WHERE waktu='$waktu'");
						while ($row = mysqli_fetch_assoc($query)) {
							echo "<tr>";
							foreach ($row as $key => $value) {
								if ($key == "waktu" || $key== "id" || strpos($key, "_") !== false) {
									
								} else {
									echo "<td>$value</td>";
								}
							}								
							echo "</tr>";
						}
					?>
				</tbody>              
			</table>
		</center>
	</body> 
	<?php
		echo '<meta http-equiv="refresh" content="0; URL=cetak.php">';
	}
	?>