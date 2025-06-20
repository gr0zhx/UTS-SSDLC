<h2>Simulasi Serangan Endpoint</h2>
<form method="post" action="/attack/result">
    <?= csrf_field() ?>
    <label>Masukkan input mentah:</label><br>
    <textarea name="attackInput" rows="4" cols="60"></textarea><br>
    <button type="submit">Simulasikan</button>
</form>
