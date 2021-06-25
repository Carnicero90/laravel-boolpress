<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       foreach(config('sample_posts') as $sample_post) {
           $new_post = new Post;
           $new_post->fill($sample_post);
           $new_post->slug = Str::slug($new_post->title);
           $new_post->save();
        //    $new_post->title = $sample_post['title'];
        //    $new_post->subtitle = $sample_post['subtitle'];
        //    $new_post->author = $sample_post['author'];
        //    $new_post->content = $sample_post['content'];



       }
    }
}
