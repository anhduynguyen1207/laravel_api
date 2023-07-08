<?php

namespace App\Services;

use App\Models\UsersVuejs;

class UsersVuejsService
{

    /**
     * Create user
     *
     * @param array $params
     * @return mixed
     *
     */
    public function create(array $params)
    {
        return UsersVuejs::create([
            'name' => 'testname',
            'username' => $params['fullname'],
            'email' => $params['email'],
            'password' => bcrypt($params['password']),
            'department_id' => 1,
            'status_id' => 1
        ]);
    }

}
