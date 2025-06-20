<h2>Register</h2>
<?= session()->getFlashdata('errors') ? implode('<br>', session()->getFlashdata('errors')) : '' ?>
<form action="/registerProcess" method="post">
    <?= csrf_field() ?>
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <select name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br>
    <button type="submit">Register</button>
</form>
