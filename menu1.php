<!DOCTYPE html>
<html>
<head>
    <title>Menu 1 - CRUD</title>
</head>
<body>
    <h1>Menu 1 - CRUD</h1>

    <?php
    // Koneksi ke database
    $dbh = new PDO('mysql:host=localhost;dbname=test', 'root', '');

    // Fungsi untuk menampilkan data
    function showData() {
        global $dbh;

        $query = "SELECT * FROM apaapa";
        $statement = $dbh->prepare($query);
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (count($data) > 0) {
            echo '<table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>';

            foreach ($data as $row) {
                echo '<tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['nama'].'</td>
                    <td>
                        <a href="menu1.php?action=edit&id='.$row['id'].'">Edit</a> |
                        <a href="menu1.php?action=delete&id='.$row['id'].'">Hapus</a>
                    </td>
                </tr>';
            }

            echo '</table>';
        } else {
            echo 'Data tidak ditemukan.';
        }
    }

    // Fungsi untuk menambah data
    function addData() {
        global $dbh;

        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];

            $query = "INSERT INTO apaapa (nama) VALUES (:nama)";
            $statement = $dbh->prepare($query);
            $statement->bindParam(':nama', $nama);

            if ($statement->execute()) {
                echo 'Data berhasil ditambahkan.';
            } else {
                echo 'Gagal menambahkan data.';
            }
        }
    }

    // Fungsi untuk mengedit data
    function editData() {
        global $dbh;

        if (isset($_POST['submit'])) {
            $id = $_GET['id'];
            $nama = $_POST['nama'];

            $query = "UPDATE apaapa SET nama = :nama WHERE id = :id";
            $statement = $dbh->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->bindParam(':nama', $nama);

            if ($statement->execute()) {
                echo 'Data berhasil diupdate.';
            } else {
                echo 'Gagal mengupdate data.';
            }
        }
    }

    // Fungsi untuk menghapus data
    function deleteData() {
        global $dbh;

        $id = $_GET['id'];

        $query = "DELETE FROM apaapa WHERE id = :id";
        $statement = $dbh->prepare($query);
        $statement->bindParam(':id', $id);

        if ($statement->execute()) {
            echo 'Data berhasil dihapus.';
        } else {
            echo 'Gagal menghapus data.';
        }
    }

    // Main program
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        if ($action == 'edit') {
            $id = $_GET['id'];

            $query = "SELECT * FROM apaapa WHERE id = :id";
            $statement = $dbh->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $data = $statement->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                ?>
                <h2>Edit Data</h2>
                <form method="post">
                    <input type="text" name="nama" value="<?php echo $data['nama']; ?>">
                    <input type="submit" name="submit" value="Update">
                </form>
                <?php
            } else {
                echo 'Data tidak ditemukan.';
            }

            editData();
        } elseif ($action == 'delete') {
            deleteData();
        }
    } else {
        showData();
        addData();
    }
    ?>

    <h2>Tambah Data</h2>
    <form method="post">
        <input type="text" name="nama">
        <input type="submit" name="submit" value="Tambah">
    </form>
</body>
</html>
