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
            return base_url('admin' . $urlSegment);
        }
        if ($user->inGroup('verifikator')) {
            return base_url('verifikator' . $urlSegment);
        }
        if ($user->inGroup('mahasiswa')) {
            return base_url('mahasiswa' . $urlSegment);
        }
        if ($user->inGroup('superadmin')) {
            return base_url('admin' . $urlSegment);
        }
        if ($user->inGroup('perusahaan')) {
            return base_url('perusahaan' . $urlSegment);
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
 * merubah format tanggal
 *
 * @param  string $date
 * @param  string $format
 * @return void
 */
function convertDate($date = null, $format = 'd-m-Y')
{
    if (!$date == null) {
        $tanggal = new DateTime($date);
        return $tanggal->format($format);
    }
    return '-';
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

function showAvatar($avatar)
{
    if ($avatar) {
        return base_url('avatar/' . $avatar);
    }
    
    return urlImg('');
}

function setUserSession()
{
    $db = \Config\Database::connect();

    if (auth()->loggedIn()) {
        $userGroup = auth()->user()->getGroups()[0];
    
        // TODO buat user mungkin dah ok.. cek buat admin dan perusahaan
        switch ($userGroup) {
            case 'mahasiswa':
                $data = $db->table('mahasiswa')
                    ->select('mahasiswa.*')
                    ->where('account_id', auth()->id())
                    ->get()
                    ->getRowArray();
                $data += [ 'group' => 'Mahasiswa'];
    
                session()->set('userDetails', $data);
                break;
    
            case 'admin':
                $data = $db->table('admin')
                    ->select('admin.*')
                    ->where('account_id', auth()->id())
                    ->get()
                    ->getRowArray();
                $data += [ 'group' => 'Admin'];
    
                session()->set('userDetails', $data);
                break;
    
            case 'verifikator':
                $data = $db->table('admin')
                    ->select('admin.*')
                    ->where('account_id', auth()->id())
                    ->get()
                    ->getRowArray();
                $data += [ 'group' => 'Verifikator'];
    
                session()->set('userDetails', $data);
                break;
    
            case 'perusahaan':
                $data = $db->table('perusahaan')
                    ->select('perusahaan.*')
                    ->where('account_id', auth()->id())
                    ->get()
                    ->getRowArray();
                $data += [ 'group' => 'Perusahaan'];
    
                session()->set('userDetails', $data);
                break;
    
            default:
                
                break;
        }
    }
}

/**
 * @param array $var Required
 * @param array $keys Required
 * @param bool $is_base_level Optional, Default FALSE
 * @return bool
 */
function is_all_set($var, $keys, $is_base_level = false)
{
    $pointer = $var;
    foreach ($keys as $key) {
        if (!isset($pointer[$key])) {
            return false;
        }
        if (!$is_base_level)
            $pointer = $pointer[$key];
    }
    return true;
}

function is_all_set_and_return($var, $keys)
{
    if (is_all_set($var, $keys)) {
        foreach ($keys as $key) {
            $var = $var[$key];
        }
        return $var;
    }
    return false;
}

function convert_json_to_datatable_query($json)
{
    // Just for IDE
    $length = 'length';
    $start = 'start';
    $filename = 'filename';
    $json['length'] = isset($json['length']) ? $json[$length] : 10;
    $query = [
        "columns" => [],
        "search" => [],
        "length" => isset($json['length']) ? $json[$length] : 10,
        "start" => isset($json['start']) ? $json[$start] : 0,
        "order" => isset($json['order']) ? json_decode($json['order'], true) : [],
        "filename" => isset($json['filename']) ? $json[$filename] : null,
    ];
    $orderables = isset($json['ordbls']) ? json_decode($json['ordbls']) : [];
    $searchables = isset($json['sbls']) ? json_decode($json['sbls']) : [];

    if (isset($json['columns'])) {
        $json['columns'] = json_decode($json['columns']);
        foreach ($json['columns'] as $index => $value) {
            $query['columns'][$index] = [
                'searchable' => in_array($index, $searchables),
                'orderable' => in_array($index, $orderables),
                'search' => [
                    'value' => $value,
                    'regex' => false,
                ]
            ];
        }
    }

    return $query;
}

function statusBadge($status)
{
    switch ($status) {
        case 'PENDING':
            return '<span class="badge bg-warning">PENDING</span>';
            break;
        case 'APPROVED':
            return '<span class="badge bg-info">APPROVED</span>';
            break;
        case 'CANCELED':
            return '<span class="badge bg-danger">CANCELED</span>';
            break;
        case 'REJECTED':
            return '<span class="badge bg-danger">REJECTED</span>';
            break;
        case 'DONE':
            return '<span class="badge bg-success">DONE</span>';
            break;
        default:
            return '<span class="badge bg-warning">PENDING</span>';
            break;
    }
}

function newRibbon($number)
{
    if ($number > 0) {
        return '<div class="ribbon bg-red">NEW</div>';
    }
    return '';
}