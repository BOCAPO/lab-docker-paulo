<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Invoque\Hermes\Models\Profiles;
use Invoque\Hermes\Models\User;

class UserSeed extends Seeder
{
    public function run()
    {
        //CRIACAO DO PERFIL ADMIN
        $profile = new Profiles();

        $admin = $profile->create(
            [
                'prf_name' => 'ADMIN',
                'prf_permission' => [],
                'prf_description' => 'Perfil Administrador'
            ]
        );

        $cliente = $profile->create(
            [
                'prf_name' => 'CLIENTE',
                'prf_permission' => [],
                'prf_description' => 'Perfil Cliente'
            ]
        );

        //CRIACAO DO USUARIO ADMIN
        $user = new User();
        $user->create(
            [
                'usr_username' => 'admin@madefy.com.br',
                'usr_password' => bcrypt('123456'),
                'usr_prf_id' => $admin->prf_id,
                'usr_active' => true
            ]
        );
    }
}
