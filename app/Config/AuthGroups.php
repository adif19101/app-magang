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
    public string $defaultGroup = 'user';

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
        'superadmin' => [
            'title'       => 'Super Admin',
            'description' => 'Complete control of the site.',
        ],
        'admin' => [
            'title'       => 'Admin',
            'description' => 'Day to day administrators of the site.',
        ],
        'user' => [
            'title'       => 'User',
            'description' => 'General users of the site. Mahasiswa.',
        ],
        'company' => [
            'title'       => 'Company',
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
        'admin.access'        => 'Can access the sites admin area',
        'admin.settings'      => 'Can access the main site settings',

        'users.manage-admins' => 'Can manage other admins',
        'users.create'        => 'Can create new non-admin users',
        'users.edit'          => 'Can edit existing non-admin users',
        'users.delete'        => 'Can delete existing non-admin users',

        'jobs.access'         => 'listing semua lowongan magang',
        'jobs.create'         => 'Can create new jobs',
        'jobs.edit'           => 'Can edit existing jobs',
        'jobs.delete'         => 'Can delete existing jobs',

        'home.access'         => 'Can access the home page',

        'companies.access'    => 'listing lowongan magang per instansi',
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     */
    public array $matrix = [
        'superadmin' => [
            'admin.*',
            'users.*',
            'jobs.*',
            'companies.*',
            'home.*'
        ],
        'admin' => [
            'admin.access',
            'users.create',
            'users.edit',
            'users.delete',
        ],
        'user' => [
            'home.access',
            'jobs.*',
        ],
        'company' => [
            'companies.access',
            'jobs.create',
            'jobs.edit',
            'jobs.delete',
        ],
    ];
}
