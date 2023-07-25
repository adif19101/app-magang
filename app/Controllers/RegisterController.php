<?php

namespace App\Controllers;

use CodeIgniter\Events\Events;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Shield\Exceptions\ValidationException;
use CodeIgniter\Shield\Controllers\RegisterController as ShieldRegister;

class RegisterController extends ShieldRegister
{
    public function registerView()
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->registerRedirect());
        }

        // Check if registration is allowed
        if (! setting('Auth.allowRegistration')) {
            return redirect()->back()->withInput()
                ->with('error', lang('Auth.registerDisabled'));
        }

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // If an action has been defined, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show');
        }

        return $this->view('perusahaan/register_perusahaan');
    }

    public function registerAction(): RedirectResponse
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->registerRedirect());
        }

        // Check if registration is allowed
        if (! setting('Auth.allowRegistration')) {
            return redirect()->back()->withInput()
                ->with('error', lang('Auth.registerDisabled'));
        }

        $users = $this->getUserProvider();

        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = $this->getValidationRules();

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // validasi nama dan alamat perusahaan
        $rulesPerusahaan = $this->perusahaanRules();

        if (! $this->validate($rulesPerusahaan)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_keys($rules);
        $user              = $this->getUserEntity();
        $user->fill($this->request->getPost($allowedPostFields));

        // Workaround for email only registration/login
        if ($user->username === null) {
            $user->username = null;
        }

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            $users->save($user);
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // To get the complete user object with ID, we need to get from the database
        $idUsers = $users->getInsertID();
        $entityUser = $this->getUserEntity();
        $entityUser->id = $idUsers;
        $user = $users->findById($idUsers);

        // Add to perusahaan group
        $entityUser->addGroup('perusahaan');

        // Save perusahaan
        $perusahaan = new \App\Models\Perusahaan();

        $dataPerusahaan = [
            'account_id' => $idUsers,
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        $perusahaan->save($dataPerusahaan);

        $db->transComplete();

        Events::trigger('register', $user);

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        $authenticator->startLogin($user);

        // If an action has been defined for register, start it up.
        $hasAction = $authenticator->startUpAction('register', $user);
        if ($hasAction) {
            return redirect()->to('auth/a/show');
        }

        // Set the user active
        $user->activate();

        $authenticator->completeLogin($user);

        // Success!
        return redirect()->to(config('Auth')->registerRedirect())
            ->with('message', lang('Auth.registerSuccess'));
    }

    public function perusahaanRules()
    {
        return [
            'nama' => [
                'label' => 'Nama Perusahaan',
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'max_length' => '{field} tidak boleh lebih dari {param} karakter',
                ]
            ],
            'alamat' => [
                'label' => 'Alamat Perusahaan',
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'max_length' => '{field} tidak boleh lebih dari {param} karakter',
                ]
            ],
        ];
    }
}
