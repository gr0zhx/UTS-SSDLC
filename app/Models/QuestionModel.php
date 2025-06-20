<?php namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table            = 'questions';
    protected $primaryKey       = 'id';

    protected $allowedFields    = ['level', 'question_text', 'options', 'correct_answer', 'explanation'];

    protected $useTimestamps    = true;

    public function getQuestionsForLevel($level): array
    {
        $questions = $this->where('level', $level)->findAll();

        // Decode kolom 'options' dari JSON menjadi array PHP
        foreach ($questions as &$q) {
            // Pastikan 'options' ada dan merupakan string sebelum di-decode
            if (isset($q['options']) && is_string($q['options'])) {
                $q['options'] = json_decode($q['options'], true);
            }
        }

        return $questions;
    }
}