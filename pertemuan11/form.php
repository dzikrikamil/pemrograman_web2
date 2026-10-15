<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Tambah Mahasiswa</title></head>
<body>
<form action="insert3.php" method="post">
    <label>Firstname: <input type="text" name="firstname" maxlength="15" required></label><br>
    <label>Lastname: <input type="text" name="lastname" maxlength="15" required></label><br>
    <label>Age: <input type="number" name="age" min="0" required></label><br>
    <button type="submit">Simpan</button>
</form>
</body>
</html>