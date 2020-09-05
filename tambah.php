<?php 
include "function.php";

$conn = mysqli_connect("127.0.0.1", "root", "", "dealer");

// ambil data dari tabel dealer / query data dealer
if ( isset($_POST["submit"])) {


	$name = $_POST["name"];
	$brand_id = $_POST["brand_id"];

	$image = upload();
	if (!$image) {
		return false;
	}

	$color = $_POST["color"];
	$description = $_POST["description"];
	$stock = $_POST["stock"];

	// query insert data
	$query = "INSERT INTO cars (id, name, brand_id, image, color, description, stock) VALUES ('', '$name', '$brand_id', '$image', '$color', '$description', '$stock')";

	mysqli_query($conn, $query);

	// cek apakah data berhasil di tambahkan atau tidak
	if ( mysqli_affected_rows($conn) > 0 ) {
		echo "<script>
				alert('data berhasil ditambahkan');
				document.location.href = 'index.php';
			  </script> 
			";
	} else {
		echo "<script>
				alert('data gagal ditambahkan');
				document.location.href = 'tambah.php';
			  </script> 
			";
		echo mysqli_error($conn);
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
		<h1>Tambah Data Dealer</h1>
			<br>
			<form>

			<div class="form-group">
				<label for="exampleInputEmail1">Name</label>
				<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter merk mobil/motor">
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
			    <label for="exampleFormControlFile1">Upload Image</label>
			    <input type="file" name="imageLama" class="form-control-file" id="exampleFormControlFile1">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Color</label>
				<input type="text" name="color" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Color">
			</div>

			<div class="form-group">
				<label for="description">Description</label>
				<textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter Description"></textarea>
			</div>

			<div class="form-group">
				<label for="description">stock</label>
				<input type="text" class="form-control" name="stock" id="description" rows="3" placeholder="Enter Description"></textarea>
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

