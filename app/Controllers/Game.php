<?php namespace App\Controllers;

use App\Models\QuestionModel;

class Game extends BaseController
{
    public function level($level_num)
    {
        $model = new QuestionModel();
        $data['questions'] = $model->getQuestionsForLevel($level_num);
        $data['level'] = $level_num;

        if (empty($data['questions'])) {
            // Arahkan kembali ke dashboard jika level tidak ada atau soalnya kosong
            return redirect()->to('/user/dashboard')->with('error', 'Level tidak ditemukan atau belum ada soal.');
        }

        return view('game/level', $data);
    }

    public function submit($level_num)
    {
        $model = new QuestionModel();
        $questions = $model->getQuestionsForLevel($level_num);
        $answers = $this->request->getPost('answers');

        $score = 0;
        $totalQuestions = count($questions);
        $results = [];

        foreach ($questions as $q) {
            $is_correct = (isset($answers[$q['id']]) && $answers[$q['id']] === $q['correct_answer']);
            if ($is_correct) {
                $score++;
            }
            $results[] = [
                'question' => $q['question_text'],
                'your_answer' => $answers[$q['id']] ?? 'Tidak dijawab',
                'correct_answer' => $q['correct_answer'],
                'is_correct' => $is_correct,
                'explanation' => $q['explanation'] ?? 'Penjelasan tidak tersedia.'
            ];
        }

        // Lulus jika skor benar minimal 80%
        if ($totalQuestions > 0 && ($score / $totalQuestions) >= 0.8) {
            // Simpan progres ke session untuk membuka level selanjutnya
            $unlocked_level = session()->get('level_unlocked') ?? 1;
            if ($level_num + 1 > $unlocked_level) {
                session()->set('level_unlocked', $level_num + 1);
            }
        }

        return view('game/result', [
            'score' => $score,
            'total' => $totalQuestions,
            'results' => $results,
            'level' => $level_num
        ]);
    }
}