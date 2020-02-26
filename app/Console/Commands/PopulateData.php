<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Expression;
use Modules\Item\Entities\Item;

class PopulateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $products = Item::get();

        foreach ($products as $product) {
            $sales_count = mt_rand(1, 200);
            for ($i = 0; $i < $sales_count; $i++) {
                $random_date = date('Y-m-d H:i:s',mt_rand(1577923200, 1580428800));
                $expression_data = [
                    'item_id' => $product->id,
                    'neutral_score' =>  mt_rand(-1000, 1000)/1000,
                    'happy_score' =>  mt_rand(-1000, 1000)/1000,
                    'sad_score' =>  mt_rand(-1000, 1000)/1000,
                    'angry_score' =>  mt_rand(-1000, 1000)/1000,
                    'fearful_score' =>  mt_rand(-1000, 1000)/1000,
                    'disgusted_score' =>  mt_rand(-1000, 1000)/1000,
                    'surprised_score' =>  mt_rand(-1000, 1000)/1000,
                    'created_at' => $random_date,
                ];
                Expression::create($expression_data);
            }
        }
    }
}
