<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portfolio;
use App\Models\Type;
use Faker\Generator as Faker;


class PortfolioTbaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <50 ; $i++) {

            $new_portfolio = new Portfolio();
            $new_portfolio->type_id = Type::inRandomOrder()->first()->id;
            $new_portfolio->title = $faker->jobTitle;
            $new_portfolio->slug = Portfolio::generateSlug( $new_portfolio->title);
            $new_portfolio->name = $faker->firstName;
            $new_portfolio->surname = $faker->lastName;
            $new_portfolio->description = $faker->paragraph;
            $new_portfolio->image = '';
            $new_portfolio->save();
        }

    }
}
