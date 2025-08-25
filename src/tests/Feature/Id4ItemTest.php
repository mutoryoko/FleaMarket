<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Item;
use App\Models\Transaction;

//　テストケースID:4　商品一覧取得
class Id4ItemTest extends TestCase
{
    use RefreshDatabase;

    //　全商品取得
    public function test_guest_can_access_index()
    {
        $items = Item::factory()->count(5)->create();

        $response = $this->get('/');

        foreach ($items as $item) {
            $response->assertSeeText($item->item_name);
            $response->assertSee($item->item_image);
        }

        $response->assertStatus(200);
    }

    //　購入済の商品にsold表示
    public function test_sold_is_shown()
    {
        $item = Item::factory()->create();
        Transaction::factory()->create(['item_id' => $item->id]);

        $response = $this->get('/');

        $response->assertSeeText('sold');

        $response->assertStatus(200);
    }

    //　自分が出品した商品は非表示
    public function test_myItem_is_not_shown()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // ログイン
        $this->actingAs($user);

        Item::factory()->create([
            'user_id' => $user->id,
            'item_name' => '自分の商品',
        ]);

        $otherUser = User::factory()->create();
        Item::factory()->create([
            'user_id' => $otherUser->id,
            'item_name' => '他人の商品',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertDontSee('自分の商品');
        $response->assertSee('他人の商品');
    }
}
