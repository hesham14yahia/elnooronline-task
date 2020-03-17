<?php

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $creator_user) {
            $articles = factory(Article::class, rand(3, 7))->create([
                'user_id' => $creator_user->id
            ]);

            foreach ($articles as $article) {
                foreach ($users as $user) {
                    if ($creator_user->id !== $user->id) {
                        if (rand(0, 1)) {
                            if (rand(0, 1)) {
                                $article->likes_users()->attach($user->id);
                            }
                        } else {
                            if (rand(0, 1)) {
                                $article->dislikes_users()->attach($user->id);
                            }
                        }
                    }
                }
            }
        }
    }
}
