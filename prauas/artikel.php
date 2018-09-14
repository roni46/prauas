<?php
include_once 'koneksi.php';
$title = 'artikel';
$sql = 'SELECT * FROM artikel';
$result = mysqli_query($conn, $sql);

include('header.php');
include('sidebar.php');
?>
<div class="content_a">
	<div class="main">
		<?php 
			echo '<a href="tambah.php" class="btn btn-large">Tambah Artikel</a>';
		?>
		<table border="1">
			<th>Judul</th>
			<th>Tanggal</th>
			<th>Aksi</th>
			<?php while ($row= mysqli_fetch_array($result)):?>
			<tr>
				<td>
					<?php echo $row ['title'];?>
				</td>
				<td>
					<?php echo $row ['tanggal'];?>
				</td>
				<td>
					<a class="btn btn-default" href="edit.php?id=<?php  echo $row ['id'];?>">edit</a>
					<a class="btn btn-default" onclick="return confirm ('Yakin Akan menghapus data?');"
					href="Hapus.php?id=<?php echo $row['id'];?>">delete</a>
				</td>
			</tr>
			<?php endwhile; ?>
		</table>
	</div>
</div>
<?php 
include('footer.php');
?>	