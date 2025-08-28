<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Item;
use App\Models\profile;

class Id11PaymentMethodSelectionTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_reflect_the_payment_method()
    {
        $item = Item::factory()->create();
        $user = User::factory()->create();
        Profile::factory()->create(['user_id' => $user->id]);

        $this->browse(
            function (Browser $browser) use ($user, $item) {
                $browser->loginAs($user)
                    ->visit(route('purchase', $item->id))
                    ->assertVisible('#payment_method') // 支払い方法のプルダウンが表示されていることを確認
                    ->assertVisible('#selected-payment-method'); // 支払い方法の表示欄が表示されていることを確認

                // プルダウンで「コンビニ払い」を選択
                $browser->select('payment_method', 'konbini')
                    ->pause(500) // JavaScriptの反映を待つため少し待機
                    ->assertSeeIn('#selected-payment-method', 'コンビニ払い');

                // プルダウンで「カード払い」を選択
                $browser->select('payment_method', 'card')
                    ->pause(500)
                    ->assertSeeIn('#selected-payment-method', 'カード払い');
                });
            }
}
