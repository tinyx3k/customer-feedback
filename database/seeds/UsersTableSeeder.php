<?php

use Illuminate\Database\Seeder;
use Modules\Account\Entities\Account;
use Modules\User\Entities\Role;
use Modules\User\Entities\User;
use Modules\Item\Entities\ItemCategory;
use Modules\Item\Entities\Item;

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
        $customer->first_name = 'Customer';
        $customer->last_name = 'Account';
        $customer->email = 'customer@customer.com';
        $customer->username = 'customer@customer.com';
        $customer->password = bcrypt('customer');
        $customer->save();
        $customer->roles()->attach($role_customer);

        $categories = [
            0 => [
                'name' => 'Hot Drinks',
            ],
            1 => [
                'name' => 'Cold Drinks',
            ],
            2 => [
                'name' => 'Breakfast',
            ],
            3 => [
                'name' => 'Pasta',
            ],
            4 => [
                'name' => 'Grilled Sandwich',
            ],
            5 => [
                'name' => 'Cakes',
            ],
        ];

        foreach ($categories as $category) {
            ItemCategory::create($category);
        }

        $hot_drinks = ItemCategory::where('name', 'Hot Drinks')->first();

        $item_hot_drinks = [
            0 => [
                'name' => 'Cappuccino',
                'image' => 'hot-cappuccino.png',
                'category_id' => $hot_drinks->id,
                'price' => 100,
            ],
            1 => [
                'name' => 'Hot Americano',
                'image' => 'hot-americano.png',
                'category_id' => $hot_drinks->id,
                'price' => 100,
            ],
            2 => [
                'name' => 'Hot Latte',
                'image' => 'hot-latte.png',
                'category_id' => $hot_drinks->id,
                'price' => 100,
            ],
            3 => [
                'name' => 'Hot Caffe Mocha',
                'image' => 'hot-caffe_mocha.png',
                'category_id' => $hot_drinks->id,
                'price' => 100,
            ],
            4 => [
                'name' => 'Hot Caramel Latte',
                'image' => 'hot-caramel_latte.png',
                'category_id' => $hot_drinks->id,
                'price' => 100,
            ],
            5 => [
                'name' => 'Hot Matcha Green Tea Latte',
                'image' => 'hot-matcha_green_tea_latte.png',
                'category_id' => $hot_drinks->id,
                'price' => 100,
            ],
            6 => [
                'name' => 'Hot Tea',
                'image' => 'hot-tea.png',
                'category_id' => $hot_drinks->id,
                'price' => 100,
            ],
        ];

        foreach ($item_hot_drinks as $hot_drink) {
            Item::create($hot_drink);
        }

        $cold_drinks = ItemCategory::where('name', 'Cold Drinks')->first();

        $item_cold_drinks = [
            0 => [
                'name' => 'Iced Caffe Americano',
                'image' => 'cold-caffe_americano.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            1 => [
                'name' => 'Iced Caffe Latte',
                'image' => 'cold-caffe_latte.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            2 => [
                'name' => 'Iced Caffe Mocha',
                'image' => 'cold-caffe_mocha.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            3 => [
                'name' => 'Iced White Chocolate Mocha',
                'image' => 'cold-white_chocolate_mocha.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            4 => [
                'name' => 'Signature Cold White Brew',
                'image' => 'cold-white_brew.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            5 => [
                'name' => 'Froccino Mocha',
                'image' => 'cold-froccino_mocha.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            6 => [
                'name' => 'Froccino Coffee Jelly',
                'image' => 'cold-froccino_coffee_jelly.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            7 => [
                'name' => 'Froccino Caramelo',
                'image' => 'cold-froccino_caramelo.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            8 => [
                'name' => 'Froccino Cookies N Cream',
                'image' => 'cold-froccino_cookies_n_cream.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            9 => [
                'name' => 'Freeze Artisanal Chocolate',
                'image' => 'cold-freeze_artisanal_chocolate.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            10 => [
                'name' => 'Freeze Cookies N Cream',
                'image' => 'cold-freeze_cookies_n_cream.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            11 => [
                'name' => 'Freeze Matcha Green Tea',
                'image' => 'cold-freeze_matcha_green_tea.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            12 => [
                'name' => 'Freeze Strawberry',
                'image' => 'cold-freeze_strawberry.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            13 => [
                'name' => 'Freeze Vanilla',
                'image' => 'cold-freeze_vanilla.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            14 => [
                'name' => 'Iced Caramel Latte',
                'image' => 'cold-caramel_latte.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            15 => [
                'name' => 'Shaken Iced Tea Apple Chia',
                'image' => 'cold-shaken_iced_tea_apple_chia.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            16 => [
                'name' => 'Shaken Iced Tropical Breeze',
                'image' => 'cold-shaken_iced_tropical_breeze.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
            17 => [
                'name' => 'Shaken Iced Peach Mangga Berry',
                'image' => 'cold-shaken_iced_peach_mangga_berry.png',
                'category_id' => $cold_drinks->id,
                'price' => 100,
            ],
        ];

        foreach ($item_cold_drinks as $cold_drink) {
            Item::create($cold_drink);
        }

        $breakfasts = ItemCategory::where('name', 'Breakfast')->first();

        $item_breakfasts = [
            0 => [
                'name' => 'Bo\'s Breakfast Platter',
                'image' => 'breakfast-bos_platter.png',
                'category_id' => $breakfasts->id,
                'price' => 100,
            ],
            1 => [
                'name' => 'Bacon Breakfast Platter',
                'image' => 'breakfast-bacon_platter.png',
                'category_id' => $breakfasts->id,
                'price' => 100,
            ],
            2 => [
                'name' => 'Corned Beef Breakfast Platter',
                'image' => 'breakfast-corned_beef_platter.png',
                'category_id' => $breakfasts->id,
                'price' => 100,
            ],
            3 => [
                'name' => 'Sausage Breakfast Platter',
                'image' => 'breakfast-sausage_platter.png',
                'category_id' => $breakfasts->id,
                'price' => 100,
            ],
            4 => [
                'name' => 'Ham Breakfast Platter',
                'image' => 'breakfast-ham_platter.png',
                'category_id' => $breakfasts->id,
                'price' => 100,
            ],
            5 => [
                'name' => 'Pancake Plate',
                'image' => 'breakfast-pancake_plate.png',
                'category_id' => $breakfasts->id,
                'price' => 100,
            ],
            6 => [
                'name' => 'Sausage and Cheese Omelette',
                'image' => 'breakfast-sausage_cheese.png',
                'category_id' => $breakfasts->id,
                'price' => 100,
            ],
            7 => [
                'name' => 'Vigan Longganisa Omelette',
                'image' => 'breakfast-vigan_longganisa.png',
                'category_id' => $breakfasts->id,
                'price' => 100,
            ],
            8 => [
                'name' => 'Ham and Egg Breakfast Sandwich',
                'image' => 'breakfast-ham_egg_sandwich.png',
                'category_id' => $breakfasts->id,
                'price' => 100,
            ],
            9 => [
                'name' => 'Spam and Egg Breakfast Sandwich',
                'image' => 'breakfast-spam_egg_sandwich.png',
                'category_id' => $breakfasts->id,
                'price' => 100,
            ],
        ];

        foreach ($item_breakfasts as $breakfast) {
            Item::create($breakfast);
        }

        $pastas = ItemCategory::where('name', 'Pasta')->first();

        $item_pastas = [
            0 => [
                'name' => 'Arrabiatta',
                'image' => 'pasta-arrabiatta.png',
                'category_id' => $pastas->id,
                'price' => 100,
            ],
            1 => [
                'name' => 'Bacon Pesto',
                'image' => 'pasta-bacon_pesto.png',
                'category_id' => $pastas->id,
                'price' => 100,
            ],
            2 => [
                'name' => 'Bolognese',
                'image' => 'pasta-bolognese.png',
                'category_id' => $pastas->id,
                'price' => 100,
            ],
            3 => [
                'name' => 'Carbonara',
                'image' => 'pasta-carbonara.png',
                'category_id' => $pastas->id,
                'price' => 100,
            ],
            4 => [
                'name' => 'Spanish Sardines',
                'image' => 'pasta-spanish_sardines.png',
                'category_id' => $pastas->id,
                'price' => 100,
            ],
        ];

        foreach ($item_pastas as $pasta) {
            Item::create($pasta);
        }

        $grills = ItemCategory::where('name', 'Grilled Sandwich')->first();

        $item_grills = [
            0 => [
                'name' => 'Grilled Bacon, Lettuce, and Tomato',
                'image' => 'grilled-bacon_lettuce_tomato.png',
                'category_id' => $grills->id,
                'price' => 100,
            ],
            1 => [
                'name' => 'Grilled Triple Cheese',
                'image' => 'grilled-triple_cheese.png',
                'category_id' => $grills->id,
                'price' => 100,
            ],
            2 => [
                'name' => 'Grilled Cheese Hawaiian',
                'image' => 'grilled-cheese_hawaiian.png',
                'category_id' => $grills->id,
                'price' => 100,
            ],
            3 => [
                'name' => 'Grilled Cheese Tuna',
                'image' => 'grilled-cheese_tuna.png',
                'category_id' => $grills->id,
                'price' => 100,
            ],
        ];

        foreach ($item_grills as $grill) {
            Item::create($grill);
        }

        $cakes = ItemCategory::where('name', 'Cakes')->first();

        $item_cakes = [
            0 => [
                'name' => 'Dulce De Leche Cheesecake',
                'image' => 'cakes-dulce_de_leche.png',
                'category_id' => $cakes->id,
                'price' => 100,
            ],
            1 => [
                'name' => 'Classic New York Cheesecake',
                'image' => 'cakes-classic_new_york.png',
                'category_id' => $cakes->id,
                'price' => 100,
            ],
            2 => [
                'name' => 'Mango Cheesecake',
                'image' => 'cakes-mango.png',
                'category_id' => $cakes->id,
                'price' => 100,
            ],
            3 => [
                'name' => 'Oreo Cheesecake',
                'image' => 'cakes-oreo.png',
                'category_id' => $cakes->id,
                'price' => 100,
            ],
            4 => [
                'name' => 'Blueberry Cheesecake',
                'image' => 'cakes-blueberry.png',
                'category_id' => $cakes->id,
                'price' => 100,
            ],
            5 => [
                'name' => 'Bo\'s Chocolate Cake',
                'image' => 'cakes-bos_chocolate.png',
                'category_id' => $cakes->id,
                'price' => 100,
            ],
        ];

        foreach ($item_cakes as $cake) {
            Item::create($cake);
        }
    }
}
