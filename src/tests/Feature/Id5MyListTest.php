<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Item;
use App\Models\Transaction;

//　テストケースID:5　マイリスト
class Id5MyListTest extends TestCase
{
    use RefreshDatabase;

    // いいねした商品の表示
    public function test_show_items_liked_by_user()
    {
        $likedItem = Item::factory()->create();
        $notLikedItem = Item::factory()->create();

        $user = User::factory()->create();

        $likedItem->likes()->attach($user->id);

        $this->actingAs($user);

        $response = $this->get(route('index', ['tab' => 'mylist']));
        $response->assertStatus(200);

        $response->assertSee($likedItem->item_name);
        $response->assertSee($likedItem->item_image);
        $response->assertDontSee($notLikedItem->item_name);
        $response->assertDontSee($notLikedItem->item_image);
    }

    // soldの表示
    public function test_sold_label_is_shown()
    {
        $user = User::factory()->create();

        //いいね済み　&　購入済み商品
        $soldItem = Item::factory()->create();
        $soldItem->likes()->attach($user->id);
        Transaction::factory()->create([
            'item_id' => $soldItem->id,
            'buyer_id' => $user->id,
        ]);

        //いいね済み　　&　未購入商品
        $availableItem = Item::factory()->create();
        $availableItem->likes()->attach($user->id);

        //　いいねしていない商品
        $notLikedItem = Item::factory()->create();

        $this->actingAs($user);
        $response = $this->get(route('index', ['tab' => 'mylist']));
        $response->assertStatus(200);

        $response->assertSee($soldItem->name);
        $response->assertSee('sold');

        $response->assertSee($availableItem->name);

        $response->assertDontSee($notLikedItem->name);
    }

    //　未認証の場合はマイリスト非表示
    public function test_guest_user_sees_empty_my_list()
    {
        // 誰かが「いいね」している商品を作成
        $user = User::factory()->create();
        $item = Item::factory()->create();
        $item->likes()->attach($user->id);

        $response = $this->get(route('index', ['tab' => 'mylist']));
        $response->assertStatus(200);

        $response->assertDontSee($item->name);

        $response->assertSeeText('商品がありません');
    }
}
