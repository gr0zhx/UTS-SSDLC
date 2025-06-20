<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Level <?= esc($level) ?></title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f9; color: #333; margin: 20px; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .result-header { text-align: center; padding: 20px; border-radius: 5px; margin-bottom: 20px; }
        .result-header.pass { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .result-header.fail { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .result-box { border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 5px; }
        .result-box.correct { border-left: 5px solid #28a745; }
        .result-box.incorrect { border-left: 5px solid #dc3545; }
        .question-text { font-weight: bold; }
        .answer-info { margin-top: 10px; }
        .explanation { background-color: #e9ecef; padding: 10px; border-radius: 4px; margin-top: 10px; font-size: 0.9em; border: 1px solid #ced4da;}
        .correct-answer { color: #28a745; font-weight: bold; }
        .your-answer.wrong { color: #dc3545; }
        a.button { display: inline-block; background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-top: 20px; }
        a.button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <?php $passing_score = 0.8; $user_score = $total > 0 ? $score / $total : 0; ?>
        
        <?php if ($user_score >= $passing_score): ?>
            <div class="result-header pass">
                <h2>Selamat, Anda Lulus!</h2>
                <p>Skor Anda: <?= esc($score) ?> dari <?= esc($total) ?>. Anda telah membuka akses ke level berikutnya.</p>
            </div>
        <?php else: ?>
            <div class="result-header fail">
                <h2>Anda Perlu Belajar Lagi</h2>
                <p>Skor Anda: <?= esc($score) ?> dari <?= esc($total) ?>. Coba lagi untuk meningkatkan pemahaman Anda.</p>
            </div>
        <?php endif; ?>

        <h3>Rincian Jawaban</h3>

        <?php foreach ($results as $res): ?>
            <div class="result-box <?= $res['is_correct'] ? 'correct' : 'incorrect' ?>">
                <p class="question-text"><?= esc($res['question']) ?></p>
                <div class="answer-info">
                    Jawaban Anda: <span class="<?= $res['is_correct'] ? '' : 'your-answer wrong' ?>"><?= esc($res['your_answer']) ?></span> 
                    <?= $res['is_correct'] ? '✅' : '❌' ?>
                </div>
                <?php if (!$res['is_correct']): ?>
                    <div class="answer-info">
                        Jawaban Benar: <span class="correct-answer"><?= esc($res['correct_answer']) ?></span>
                    </div>
                <?php endif; ?>
                <div class="explanation">
                    <strong>Penjelasan:</strong> <?= esc($res['explanation']) ?>
                </div>
            </div>
        <?php endforeach; ?>

        <a href="/user/dashboard" class="button">Kembali ke Dashboard</a>
    </div>
</body>
</html>