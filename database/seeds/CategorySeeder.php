<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'politica',
            'cucina',
            'sport',
            'estero',
            'tech',
            'costume',
        ];
        foreach ($categories as $cat) {
            $resource = new Category();
            $resource->name = $cat;
            $resource->slug = Str::slug($resource->name);
            $resource->save();
        }
    }
}
