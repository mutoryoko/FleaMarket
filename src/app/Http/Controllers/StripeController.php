<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Webhook;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Transaction;

class StripeController extends Controller
{
    public function checkout(PurchaseRequest $request)
    {
        $paymentMethod = $request->input('payment_method');
        $itemId = $request->input('item_id');
        $item = Item::findOrFail($itemId);
        $userId = Auth::id();

        // コンビニ決済の場合
        if ($paymentMethod === 'konbini') {
            Transaction::create([
                'item_id' => $item->id,
                'buyer_id' => $userId,
                'payment_method' => 1,
                'shipping_postcode' => $request->input('shipping_postcode'),
                'shipping_address' => $request->input('shipping_address'),
                'shipping_building' => $request->input('shipping_building'),
            ]);

            return to_route('checkout.success');
        }

        // カード決済の場合
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $session = Session::create([
                'payment_method_types' => ['card'],

                'line_items' => [[
                    'price_data' => [
                        'currency' => 'jpy',
                        'product_data' => [
                            'name' => $item->item_name,
                        ],
                        'unit_amount' => (int) $item->price,
                    ],
                    'quantity' => 1,
                ]],

                'mode' => 'payment',

                'success_url' => route('checkout.success'),
                'cancel_url' => route('checkout.cancel'),

                // Webhookで使うための情報をメタデータとして渡す
                'metadata' => [
                    'user_id' => $userId,
                    'product_id' => $itemId,
                ],
            ]);

            // 作成したセッションのURLにリダイレクト
            return redirect($session->url, 303);
        } catch (\Exception $e) {
            // エラーが発生した場合の処理
            return to_route('checkout.cancel');
        }
    }

    public function success()
    {
        return view('checkout.success');
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }

    public function webhook()
    {
        $webhookSecret = env('STRIPE_WEBHOOK_SECRET');
        if (!$webhookSecret) {
            return response('Webhook secret not set.', 500);
        }

        $payload = @file_get_contents('php://input');
        $sigHeader = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            // Stripeからのリクエストであることを署名で検証
            $event = Webhook::constructEvent(
                $payload, $sigHeader, $webhookSecret
            );
        } catch (\UnexpectedValueException $e) {
            // 不正なペイロード
            return response('Invalid payload', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // 不正な署名
            return response('Invalid signature', 400);
        }

        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;

            $address = $session->shipping_details?->address;

            Transaction::create([
                'item_id' => $session->metadata->product_id,
                'buyer_id' => $session->metadata->user_id,
                'payment_method' => 2,
                'shipping_postcode' => $address?->postal_code,
                'shipping_address' => ($address?->state ?? '') . ($address?->city ?? '') . ($address?->line1 ?? ''),
                'shipping_building' => $address?->line2,
            ]);
        }

        return response('Webhook Handled', 200);
    }
}