<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit']))
{
    $id = $_POST['id'];
    $judul = $_POST['title'];
    $content = $_POST['content'];
    $tanggal = $_POST['tanggal'];

    $sql = 'UPDATE artikel SET ';
    $sql .= "title = '{$judul}', content = '{$content}', ";
    $sql .= "tanggal = '{$tanggal}' ";
    $sql .= "WHERE id = '{$id}'";
    $result = mysqli_query($conn, $sql);
    if (!$result) die(mysqli_error($conn));
        header('location: artikel.php');
}  
$id = $_GET['id'];
$sql = "SELECT * FROM artikel WHERE id = '{$id}'";
$result = mysqli_query($conn, $sql);
if (!$result) die('Error: Data tidak tersedia');
$data = mysqli_fetch_array($result);
include('header.php');
include('sidebar.php');
?>

<div class="content_a">
    <div class="main">
        <h2>Edit Artikel</h2>
        <form method="post" action="edit.php" enctype="multipart/form-data">
            <div class="input">
                <input type="text" name="title" value="<?php echo $data['title'];?>"/>
            </div>
            <div class="input">
                <textarea name="content" cols="50" rows="10"><?php echo $data['content'];?></textarea>
            </div>
            <div class="input">
                <label>Tanggal</label>
                <input type="text" name="tanggal" value="<?php echo $data['tanggal'];?>"/>
            </div>
            <div class ="submit">
                <input type="hidden" name="id" value="<?php echo $data['id'];?>"/>
                <input type="submit" name="submit" value="Simpan" class="btn btn-large" />
            </div>
        </form>
    </div>
</div>
<?php  
include('footer.php')
?>