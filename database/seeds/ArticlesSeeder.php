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
            $article = factory(Article::class)->create([
                'user_id' => $creator_user->id
            ]);

            foreach ($users as $user) {
                if ($creator_user->id !== $user->id) {
                    if (rand(0, 1)) {
                        if (rand(0, 1)) {
                            $article->likes_users()->attach($user->id);

                            // increase article most liked
                            $article->update([
                                'most_liked' => $article->most_liked + 1
                            ]);
                        }
                    } else {
                        if (rand(0, 1)) {
                            $article->dislikes_users()->attach($user->id);

                            // decrease article most liked
                            $article->update([
                                'most_liked' => $article->most_liked ?? $article->most_liked - 1
                            ]);
                        }
                    }
                }
            }
        }
    }
}
