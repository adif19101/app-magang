<?php

/**
 * Menampilkan notifikasi toast
 *
 * @param  mixed $icon
 * @param  mixed $title
 * @return void
 */
function toastNotif($icon, $title)
{
    $toast = [
        'icon' => $icon,
        'title' => $title
    ];

    return session()->setFlashdata('toast', $toast);
}