<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Form Survey</title>
</head>

<body>
    <div class="container">
        <h1>Form Survey</h1>
        <div class="wrp">
            <form id="MyForm" action="act.php" method="POST" enctype="multipart/form-data">
                <div class="sec">
                    <label for="nama">Nama:</label>
                    <div class="wp">
                        <input type="text" id="nama" name="nama" required>
                    </div>
                </div>
                <div class="sec">
                    <label for="alamat">Alamat:</label>
                    <div class="wp">
                        <textarea id="alamat" name="alamat" required></textarea>
                    </div>
                </div>
                <div class="sec">
                    <label for="dokumen">Dokumen:</label>
                    <div class="wp">
                        <select id="dokumen" name="dokumen" required>
                            <option value="aman">Aman</option>
                            <option value="tidak aman">Tidak Aman</option>
                        </select>
                    </div>
                </div>
                <div class="sec">
                    <label for="kondisi">Kondisi:</label>
                    <div class="wp">
                        <select id="kondisi" name="kondisi" required>
                            <option value="aman">Aman</option>
                            <option value="tidak aman">Tidak Aman</option>
                        </select>
                    </div>
                </div>
                <div class="sec">
                    <label for="p2tl">P2TL:</label>
                    <div class="wp">
                        <select id="p2tl" name="p2tl" required>
                            <option value="aman">Aman</option>
                            <option value="tidak aman">Tidak Aman</option>
                        </select>
                    </div>
                </div>
                <div class="sec">
                    <label for="tunggakan">Tunggakan:</label>
                    <div class="wp">
                        <select id="tunggakan" name="tunggakan" required>
                            <option value="aman">Aman</option>
                            <option value="tidak aman">Tidak Aman</option>
                        </select>
                    </div>
                </div>
                <!-- <div class="sec">
                    <label for="keterangan">Keterangan:</label>
                    <div class="wp">
                        <textarea id="keterangan" name="keterangan"></textarea>
                    </div>
                </div> -->
                <div class="sec">
                    <input type="submit" value="Submit">
                </div>
                <div class="show">
                    <button onclick="location.href='show.php'">show</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>