<?php

$conn = mysqli_connect("127.0.0.1", "root", "", "dealer");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM cars WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$name = htmlspecialchars($data["name"]);
	$brand_id = htmlspecialchars($data["brand_id"]);
	$imageLama = htmlspecialchars($data["imageLama"]);

	// cek apakah user pilih image baru atau tidak
	if ( $_FILES['image']['error'] === 4 ) {
		$image = $imageLama;	
	} else {
		$image = upload();
	}

	$color = htmlspecialchars($data["color"]);
	$description = htmlspecialchars($data["description"]);
	$stock = htmlspecialchars($data["stock"]);


	$query = "UPDATE cars SET
				name = '$name', 
				brand_id = '$brand_id',
				image = '$image',
				color = '$color',
				description = '$description',
				stock = '$stock'
				WHERE id = $id
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload() {

	$namaFile = $_FILES['image']['name'];
	$ukuranFile = $_FILES['image']['size'];
	$error = $_FILES['image']['error'];
	$tmpName = $_FILES['image']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if ( $error === 4) {
		
		echo "
			<script>
				alert('pilih gambar terlebih dahulu');
			</script> ";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiImageValid = ['jpg', 'jpeg', 'png'];
	$ekstensiImage = explode('.', $namaFile);
	$ekstensiImage = strtolower(end($ekstensiImage));

	if ( !in_array($ekstensiImage, $ekstensiImageValid)) {

		echo "<script>
				alert('yang anda upload bukan gambar');
				document.location.href = 'tambah.php';
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if ( $ukuranFile > 1000000) {
		echo "<script>
				alert('yang anda upload bukan gambar');
				document.location.href = 'tambah.php';
			  </script>";
		return false;
	}

	// jika lolos pengecekan
	move_uploaded_file($tmpName, 'img/'. $namaFile);

	return $namaFile;

}


?>