<?php

use Illuminate\Database\Seeder;
use Modules\User\Entities\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = new Role();
        $super_admin->name = 'Super Admin';
        $super_admin->save();

        $cashier = new Role();
        $cashier->name = 'Cashier';
        $cashier->save();

    }
}
