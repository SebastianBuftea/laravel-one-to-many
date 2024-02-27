<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 25; $i++) {
            $project = new Project();
            $project->title = $faker->words(3, true);
            $project->description = $faker->text(250);
            $project->slug = Str::slug($project->title, '-');
            $project->languages = $faker->words(3, true);
            $project->relese_date = $faker->date();
            $project->save();
        }
    }
}
