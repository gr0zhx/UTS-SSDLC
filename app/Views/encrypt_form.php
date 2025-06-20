<!DOCTYPE html>
<html>
<head><title>Secure Data Transmission</title></head>
<body>
    <h2>Form Pengiriman Data Aman</h2>
    <?php if(session()->getFlashdata('errors')): ?>
        <div style="color:red">
            <?= implode('<br>', session()->getFlashdata('errors')) ?>
        </div>
    <?php endif; ?>

    <form method="post" action="/securedata/process">
        <?= csrf_field() ?>
        <label for="plaintext">Data yang akan dienkripsi:</label><br>
        <textarea name="plaintext" rows="4" cols="50" maxlength="1000"></textarea><br><br>
        <input type="submit" value="Kirim">
    </form>
</body>
</html>
