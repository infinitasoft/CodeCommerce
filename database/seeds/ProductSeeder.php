<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,15) as $i) {
            Product::create([
                'name' => $faker->word(),
                'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'category_id' => $faker->biasedNumberBetween($min = 1, $max = 10, $function = 'sqrt'),
                'price' => '19.99',
                'recommend' => '1',
                'featured' => '1'
            ]);
        }

    }
}
