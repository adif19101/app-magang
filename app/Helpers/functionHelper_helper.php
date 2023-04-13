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

function groupUrl($urlSegment = '')
{
    if ($urlSegment != '') {
        $urlSegment = '/' . $urlSegment;
    }
    if (auth()->loggedIn()) {
        $user = auth()->user();
        if ($user->inGroup('admin')) {
            return base_url('admin'.$urlSegment);
        }
        if ($user->inGroup('user')) {
            return base_url('mahasiswa'.$urlSegment);
        }
        if ($user->inGroup('superadmin')) {
            return base_url('admin'.$urlSegment);
        }
    }
    return base_url();
}
