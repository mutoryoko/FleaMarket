<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Category;
use App\Models\Comment;

//　テストケースID:7　商品詳細情報取得
class TestCase7 extends TestCase
{
    use RefreshDatabase;
    //　商品詳細ページを開く
    public function test_guest_can_access_detail()
    {
        $item = Item::factory()->create();
        $users = User::factory()->count(5)->create();

        foreach($users as $user){
            $profile = Profile::factory()->create([
                'user_id' => $user->id,
            ]);

            $comment = Comment::factory()->create([
                'user_id' => $user->id,
                'item_id' => $item->id,
            ]);
        }

        $item->likes()->attach(
            User::factory()->count(5)->create()->pluck('id')
        );

        $categories = Category::factory()->count(3)->create();
        $item->categories()->attach($categories->pluck('id'));

        $response = $this->get(route('detail', $item->id));

        $response->assertStatus(200);

        $response->assertSee($item->item_name);
        $response->assertSee($item->brand);
        $response->assertSee(number_format($item->price));
        $response->assertSee((string)$item->likes()->count());
        $response->assertSee((string)$comment->count());
        foreach($categories as $category){
            $response->assertSee($category->name);
        }
        $response->assertSee($item->condition);
        $response->assertSee($profile->user_image);
        $response->assertSee($user->name);
        $response->assertSee($comment->content);
    }
}