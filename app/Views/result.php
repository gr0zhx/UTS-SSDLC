<!DOCTYPE html>
<html>
<head><title>Hasil Enkripsi</title></head>
<body>
    <h2>Hasil Pengamanan Data</h2>
    <p><strong>Plaintext:</strong> <?= esc($original) ?></p>
    <p><strong>Encrypted:</strong> <?= esc($encrypted) ?></p>
    <a href="/securedata">Kembali</a>
</body>
</html>
