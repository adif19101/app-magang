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

/**
 * return base_url of $fullImgPath if its exist and its file.
 *
 * return base_url of $defaultImg if $fullImgPath not exist.
 *
 * @param string $fullImgPath example: "public/uploads/" . PATH_USER_VENDOR_KTP_IMAGE . "/" . "vendor_220212123456.jpeg"
 * @param string $defaultImg Optional. If you want to set your own default image.
 * @return string
 **/
function urlImg($fullImgPath, $defaultImg = 'assets/img/default.webp')
{
  if (
    empty($fullImgPath) ||
    !is_string($fullImgPath) ||
    !is_file($fullImgPath)
  ) {
    return base_url($defaultImg);
  };

  return base_url($fullImgPath);
}