<?php

class Flasher
{

    public static function setFlash($user, $code, $pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'user' => $user,
            'code' => $code,
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                    ' . $_SESSION['flash']['user'] . ' <strong>' . $_SESSION['flash']['code'] . ' </strong>' . $_SESSION['flash']['pesan'] . '<strong> ' . $_SESSION['flash']['aksi'] . '</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            unset($_SESSION['flash']);
        }
    }
    public static function flashAdmin()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                   ' . $_SESSION['flash']['user'] . ' <strong>' . $_SESSION['flash']['code'] . ' </strong>' . $_SESSION['flash']['pesan'] . '<strong> ' . $_SESSION['flash']['aksi'] . '</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            unset($_SESSION['flash']);
        }
    }
}
