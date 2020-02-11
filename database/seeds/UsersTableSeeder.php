<?php

use Illuminate\Database\Seeder;
use Modules\Account\Entities\Account;
use Modules\User\Entities\Role;
use Modules\User\Entities\User;
use Modules\Point\Entities\Point;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Super Admin')->first();

        $admin = new User();
        $admin->first_name = 'John';
        $admin->last_name = 'Doe';
        $admin->email = 'admin@admin.com';
        $admin->username = 'admin@admin.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
