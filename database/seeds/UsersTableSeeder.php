<?php

use App\Models\User;
use App\Models\UserRole;
use App\Models\UserStatus;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create(
            [
                'user_role_name' => 'Administrator',
                'user_role_slug' => 'admin',
            ]
        );
        UserRole::create(
            [
                'user_role_name' => 'Manager',
                'user_role_slug' => 'manager',
            ]
        );
        UserRole::create(
            [
                'user_role_name' => 'User',
                'user_role_slug' => 'user',
            ]
        );

        UserStatus::create(
            [
                'user_status_name' => 'Active',
            ]
        );
        UserStatus::create(
            [
                'user_status_name' => 'Inactive',
            ]
        );
        UserStatus::create(
            [
                'user_status_name' => 'Disabled',
            ]
        );

        User::create(
            [
                'username' => 'Alejandro Colautti',
                'email' => 'alejandrocolautti235@hotmail.com',
                'password' => '$2y$10$gplk0eyb6IP0AA68wMK4cOEwAgfKIInUi6sO9MZKW3Vv9uiZJxSF6',
                'remember_token' => '4EAvPdpcFUHRbSLKY9Gdm9yL9t2A2HdT5IjpmXqKeIe3M4KGB2Sw4vO2t5y0',
                'avatar' => 'photos/shares/avatars/shingoaraki.jpg',
                'created_at' => '2017-08-07 01:09:20',
                'updated_at' => '2017-08-06 22:09:20',
                'user_status_id' => 1,
                'user_role_id' => 1,
                'facebook' => "alejandrocolautti",
                'instagram' => 'ale235',
                'twitter' => 'alecolautti',
            ]
        );

    }
}
