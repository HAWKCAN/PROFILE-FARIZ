<?php 
//1. koneksi ke database mysql
$servername = "localhost";
$username = "root" ;
$password = "";
$dbname = "feedback_web_dasar";

// membuat koneksi 
$conn = new mysqli($servername, $username, $password, $dbname);

//memeriksa koneksi
if ($conn->connect_error){
    die("koneksi gagal: ". $conn->connect_error);
}

//2. mengambil data dari form
$name = $_POST ['name'];
$telepon = $_POST ['telepon'];
$comments = $_POST ['comments'];

//3. menampilkan pesan sebelum insert (opsional)
echo "<h2> menyimpan saran dan komentar :$comments<h2>";

//4. menyiapkan dan menjalankan query SQL untuk menyimpan data ke database
$sql = "INSERT INTO pengguna (name, telepon, comments ) VALUES ('$name','$telepon','$comments')";

//5. mengecek apakah query berhasil dijalankan

if ($conn->query($sql) === TRUE) {
    echo "<h3>Data berhasil disimpan! Berikut data yang Anda masukkan:</h3>";
    echo "Nama: " . $name . "<br>";
    echo "Telepon: " . $telepon. "<br>";
    echo "Komentar: " . $comments . "<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//5. menutup koneksi ke database
$conn->close();
?>
