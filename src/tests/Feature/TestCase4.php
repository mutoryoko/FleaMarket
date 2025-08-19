<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Item;

//　テストケースID:4　商品一覧取得
class TestCase4 extends TestCase
{
    use RefreshDatabase;
    //　商品ページを開く
    public function test_guest_can_access_index()
    {
        $items = Item::factory()->count(5)->create();

        $response = $this->get('/');

        foreach ($items as $item) {
            $response->assertSee($item->item_name);
            $response->assertSee($item->item_image);
        }

        $response->assertStatus(200);
    }
}
