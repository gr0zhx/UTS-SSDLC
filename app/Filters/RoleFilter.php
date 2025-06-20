<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Cek login
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil role pengguna saat ini
        $userRole = $session->get('role');

        // Jika filter memerlukan role tertentu
        if ($arguments && !in_array($userRole, $arguments)) {
            return redirect()->to('/')->with('error', 'Akses ditolak. Anda tidak memiliki izin.');
        }

        // Jika lolos, lanjutkan
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu aksi setelahnya
    }
}
