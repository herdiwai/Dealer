<?php 

include "function.php";

$conn = mysqli_connect("127.0.0.1", "root", "", "dealer");

$id = $_GET["id"];
$dealer = query("SELECT * FROM cars WHERE id = $id")[0];
// ambil data dari tabel dealer / query data dealer
if ( isset($_POST["submit"])) {

	if ( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
	}

}

?> 

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<title>Tambah Data Dealer</title>
	</head>
<body>

<div class="jumbotron text-center">
	<h1>Test Technical Online Bootcamp DumbWays Batch 18 Kloter 6</h1>
</div>

<div class="container">
	<div class="row">
		<form action="" method="POST" enctype="multipart/form-data">
		<h1>Ubah Data Dealer</h1>
			<br>
			<form>

			<input type="hidden" name="id" value="<?= $dealer["id"]; ?>">
			<input type="hidden" name="imageLama" value="<?= $dealer["image"]; ?>">

			<div class="form-group">
				<label for="exampleInputEmail1">Name</label>
				<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter merk mobil/motor" value="<?= $dealer["name"]; ?>">
			</div>

			<div class="form-group">
			    <label for="exampleFormControlSelect1">Brand ID</label>
			    <select class="form-control" name="brand_id" id="exampleFormControlSelect1">
				    <option value="">Pilih</option>
				    <!-- mengambil data table brand -->
				    <?php 
					    $sql_brand = mysqli_query($conn, "SELECT * FROM brand") or die (mysqli_error($conn));

					    while ($data_brand = mysqli_fetch_assoc($sql_brand)) {
					    	echo '<option value="'.$data_brand['id'].'">'.$data_brand['name'].'</option>';
					    }
				    ?>
		    	</select>
			</div>

			<div class="form-group">
			    <label for="exampleFormControlFile1">Upload Image</label><br>
			    <img src="img/<?= $dealer['image']; ?>"><br>
			    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Color</label>
				<input type="text" name="color" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Color" value="<?= $dealer["color"]; ?>">
			</div>

			<div class="form-group">
				<label for="description">Description</label>
				<textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter Description" value="<?= $dealer["description"]; ?>">
				</textarea>
			</div>

			<div class="form-group">
				<label for="description">stock</label>
				<input type="text" class="form-control" name="stock" id="description" rows="3" placeholder="Enter Description" value="<?= $dealer["stock"]; ?>">
			</textarea>
			</div>

			<button type="submit" name="submit" class="btn btn-primary">Tambah</button>
			<br><br><br><br><br><br>
		</form>
	</div>
</div>

	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="js/jquery-3.5.1.slim.min.js"></script>
	    <script src="js/popper.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>

