<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    public string $defaultGroup = 'mahasiswa';

    /**
     * --------------------------------------------------------------------
     * Groups
     * --------------------------------------------------------------------
     * An associative array of the available groups in the system, where the keys are
     * the group names and the values are arrays of the group info.
     *
     * Whatever value you assign as the key will be used to refer to the group when using functions such as:
     *      $user->addGroup('superadmin');
     *
     * @var array<string, array<string, string>>
     *
     * @see https://github.com/codeigniter4/shield/blob/develop/docs/quickstart.md#change-available-groups for more info
     */
    public array $groups = [
        'admin' => [
            'title'       => 'Admin',
            'description' => 'Day to day administrators of the site.',
        ],
        'verifikator' => [
            'title'       => 'Verifikator',
            'description' => 'Verifikator surat magang.',
        ],
        'mahasiswa' => [
            'title'       => 'Mahasiswa',
            'description' => 'General users of the site. Mahasiswa.',
        ],
        'perusahaan' => [
            'title'       => 'Perusahaan',
            'description' => 'Company users of the site. Akun instansi penyedia lowongan magang.',
        ],
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system. Each system is defined
     * where the key is the
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        'navmenu.home'        => 'Can access the home page',
        'navmenu.joblist'     => 'Can access the job list page',
        'navmenu.suratmohon'  => 'Can access the surat permohonan page',
        'navmenu.suratplot'   => 'Can access the surat plot page',
        'navmenu.users'       => 'Can access the users page',
        'navmenu.search'      => 'Can access the search page',
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     */
    public array $matrix = [
        'admin' => [
            'navmenu.home',
            'navmenu.joblist',
            'navmenu.suratmohon',
            'navmenu.suratplot',
            'navmenu.users',
        ],
        'verifikator' => [
            'navmenu.home',
            'navmenu.suratplot',
        ],
        'mahasiswa' => [
            'navmenu.home',
            'navmenu.joblist',
            'navmenu.suratmohon',
            'navmenu.suratplot',
            'navmenu.search',
        ],
        'perusahaan' => [
            'navmenu.home',
            'navmenu.joblist',
        ],
    ];
}
