<?php
//include_once 'login_session.php';
include_once 'koneksi.php';
error_reporting(E_ALL);
$title = 'data kategori';
if (isset($_POST['submit'])) {
	$judul = $_POST['title'];
	$content = $_POST['content'];
	$tanggal = $_POST['tanggal'];

	$sql = 'INSERT INTO artikel (title, content, tanggal)';
	$sql .= "VALUE ('{$judul}', '{$content}', '{$tanggal}')";
	$result = mysqli_query($conn,$sql);
	if (!$result) {
		die(mysqli_error($conn));
	}
	header('location: artikel.php');
	//code...
}

include('header.php');
include('sidebar.php');
?>

<div class="content_a">
	<div class="main">
		<h2>Tambah Artikel</h2>
		<form method="post" action="tambah.php" enctype="multipart/form-data">
    		<div class="input">
    			<label>Judul&nbsp;&nbsp;&nbsp;&nbsp;</label>
       			<input type="text" name="title" />
    		</div>
    		<div class="input">
        		<label>Tanggal</label>
            	<input type="data" name="tanggal" />
    		</div>
    		<div class ="submit">
        		<input type="submit" class="btn btn-large" name="submit" value="simpan" />
   			</div>
		</form>
	</div>
</div>
<?php  
include('footer.php')
?>