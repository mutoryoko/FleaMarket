<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Item;
use App\Models\profile;

// テストケースID:11 支払い方法選択機能
class Id11PaymentMethodTest extends TestCase
{
    use RefreshDatabase;

    public function test_reflect_the_payment_method()
    {
        $item = Item::factory()->create();

        Profile::factory()->create(); // 配送先の設定で使う

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('purchase', $item->id));
        $response->assertStatus(200);

        // まだ途中・・・
    }
}
