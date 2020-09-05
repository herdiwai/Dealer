<?php 

$conn = mysqli_connect("127.0.0.1", "root", "", "dealer");

// ambil data dari tabel dealer / query data dealer
$result = mysqli_query($conn, "SELECT * FROM cars");

?> 

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<title>CRUD DATA DEALER</title>
	</head>
<body>

<div class="jumbotron text-center">
	<h1>Test Technical Online Bootcamp DumbWays Batch 18 Kloter 6</h1>
</div>

<div class="container">
	<div class="row">
		<form>
		<h1>Data Dealer</h1>
		<a href="tambah.php" class="btn btn-primary">Tambah Data</a>
			<br></br>

			<!-- looping data cars -->
			<?php while ($row = mysqli_fetch_assoc($result) ) : ?>

				<div class="card" style="width: 18rem;">
					<img src="img/<?= $row["image"]; ?>" width="40" class="card-img-top" alt="">
					<div class="card-body">
						<hr width="100%" color="black">
					    <h5 class="card-title"><?= $row["name"]; ?></h5>
					    <p class="card-text"><?= $row["description"]; ?></p>
					    <a href="#" class="btn btn-success">Beli</a>
					    <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-warning">Ubah</a>
					    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');" class="btn btn-danger">Hapus</a>
					</div>
				</div>
				<br>

			<?php endwhile; ?>

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

