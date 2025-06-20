<h2>Login</h2>
<?= session()->getFlashdata('error') ?>
<form action="/loginProcess" method="post">
    <?= csrf_field() ?>
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
	
</form>
<p>Belum punya akun? <a href="/register">Daftar</a></p>
<?php
echo password_hash('admin123', PASSWORD_BCRYPT);

