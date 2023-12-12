<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/aplikasi%20surat/index.php?target=";
        $data = [
            array('Text' => 'Pengguna', 'Link' => $base . 'tb_pengguna'),
            array('Text' => 'Surat Masuk', 'Link' => $base . 'tb_surat_masuk'),
            array('Text' => 'Surat Keluar ', 'Link' => $base . 'tb_surat_keluar'),
        ];
        return $data;
    }
}
