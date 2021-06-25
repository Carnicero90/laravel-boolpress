<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'vaticano',
            'dolci',
            'covid19',
            'Genoa',
            'Berlusconi',
            'javascript',
            'Salernitana'
        ];
        foreach($tags as $tag_name) {
            $item = new Tag();
            $item->name = $tag_name;
            $item->slug = Str::slug($tag_name);
            $item->save();
        }
    }
}
