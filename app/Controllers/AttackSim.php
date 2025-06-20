<?php namespace App\Controllers;

class AttackSim extends BaseController
{
    public function simulate()
    {
        return view('attack/simulate');
    }

    public function result()
    {
        $input = $this->request->getPost('attackInput');
        $clean = esc($input); // Escape XSS
        $length = strlen($input);

        $warning = '';
        if ($length > 255) {
            $warning = '⚠️ Input terlalu panjang! Mungkin buffer overflow.';
        } elseif (preg_match('/<script|SELECT|UNION|--/i', $input)) {
            $warning = '🚨 Deteksi input berbahaya (XSS/SQLi)';
        }

        return view('attack/result', [
            'input' => $input,
            'escaped' => $clean,
            'length' => $length,
            'warning' => $warning
        ]);
    }
}
