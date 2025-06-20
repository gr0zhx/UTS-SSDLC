<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class SecureData extends Controller
{
    public function index()
    {
        return view('encrypt_form');
    }

    public function process()
    {
        helper(['form', 'url']);

        $rules = [
            'plaintext' => 'required|min_length[1]|max_length[1000]|alpha_numeric_space'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $plaintext = $this->request->getPost('plaintext');
        $key = 'MySecretKey12345';

        // Simulasi enkripsi
        $encrypted = base64_encode(openssl_encrypt($plaintext, 'aes-128-cbc', $key, 0, substr($key, 0, 16)));

        return view('result', ['encrypted' => $encrypted, 'original' => $plaintext]);
    }
}
