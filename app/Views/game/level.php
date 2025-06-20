<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game Level <?= esc($level) ?></title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f9; color: #333; line-height: 1.6; margin: 20px; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #0056b3; }
        .question-box { border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px; background-color: #fdfdfd; }
        .question-text { font-weight: bold; margin-bottom: 10px; font-size: 1.1em; }
        .options label { display: block; margin-bottom: 8px; cursor: pointer; padding: 8px; border-radius: 4px; transition: background-color 0.2s; }
        .options label:hover { background-color: #e9ecef; }
        input[type="radio"] { margin-right: 10px; }
        button { background-color: #007bff; color: white; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; display: block; width: 100%; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Level <?= esc($level) ?>: Analisis Skenario Insiden</h2>
        <p>Baca setiap skenario dengan cermat dan pilih tindakan atau identifikasi yang paling tepat.</p>
        <hr>

        <form action="/game/submit/<?= esc($level) ?>" method="post">
            <?= csrf_field() ?>

            <?php foreach ($questions as $index => $q): ?>
                <div class="question-box">
                    <p class="question-text"><?= ($index + 1) . '. ' . esc($q['question_text']) ?></p>
                    <div class="options">
                        <?php foreach ($q['options'] as $option): ?>
                            <label>
                                <input type="radio" name="answers[<?= esc($q['id']) ?>]" value="<?= esc(substr($option, 0, 1)) ?>" required>
                                <?= esc($option) ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <button type="submit">Kunci Jawaban</button>
        </form>
    </div>
</body>
</html>