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

        $role_customer = Role::where('name', 'Customer')->first();

        $customer = new User();
        $customer->first_name = 'Johnny';
        $customer->last_name = 'Doe';
        $customer->email = 'johnnydoe@email.com';
        $customer->username = 'johnnydoe@email.com';
        $customer->password = bcrypt('password');
        $customer->qr_data = 'TANGO_001';
        $customer->save();
        $customer->roles()->attach($role_customer);

        $point = new Point(['points' => 1000]);
        $customer->points()->save($point);
    }
}
