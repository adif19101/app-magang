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

/**
 * cek value dari form lalu return selected atau checked(sesuai kebutuhan)
 *
 * @param  mixed $value
 * @param  string|int $selectedValue
 * @param  string $return
 * @return void
 */
function formChecker($value, $selectedValue, $return)
{
    if (is_array($value) && in_array($selectedValue, $value)) {
        return $return;
    } else if ($value == $selectedValue) {
        return $return;
    }
    return '';
}

/**
 * convertDate
 * merubah tanggal urutan tanggal
 *
 * @param  string $date
 * @return void
 */
function convertDate($date, $format = null)
{
    if ($format != null) {
        $tanggal = new DateTime($date);
        return $tanggal->format($format);
    }
    $tanggal = explode("-", $date);
    return $tanggal[2] . '-' . $tanggal[1] . '-' . $tanggal[0];
}
