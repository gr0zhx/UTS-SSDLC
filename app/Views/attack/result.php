<h2>Hasil Analisis Input</h2>
<p><strong>Input Mentah:</strong> <?= $input ?></p>
<p><strong>Input Setelah Escape:</strong> <?= $escaped ?></p>
<p><strong>Panjang Input:</strong> <?= $length ?></p>
<?php if ($warning): ?>
    <p style="color:red"><?= $warning ?></p>
<?php else: ?>
    <p style="color:green">✅ Tidak terdeteksi serangan berbahaya.</p>
<?php endif; ?>
<a href="/attack/simulate">Kembali</a>
