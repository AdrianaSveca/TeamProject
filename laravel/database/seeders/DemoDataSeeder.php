<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Products;
use App\Models\Orders;

/**
 * Seeder to create simple demo data for testing.
 * In this seeder we create a demo customer and a sample order that uses one of the existing products.
 */
class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a demo customer account (if it does not already exist)
        $customer = User::firstOrCreate(
            ['email' => 'customer@wellth.com'],
            [
                'name' => 'Demo Customer',
                'password' => Hash::make('password123'),
                'role' => 'customer',
                'dob' => '2000-01-01',
                'gender' => 'Other',
                'phone' => '0000000000',
            ]
        );

        // Pick a product to attach to the demo order (use the first product if available)
        $product = Products::first();

        if (!$product) {
            // No products seeded yet; nothing more to do.
            return;
        }

        // Avoid creating duplicate demo orders for the same customer
        if (Orders::where('user_id', $customer->id)->exists()) {
            return;
        }

        $quantity = 2;
        $subtotal = (float) $product->product_price * $quantity;

        // Create a simple demo order for the customer
        $order = Orders::create([
            'user_id' => $customer->id,
            'order_total' => $subtotal,
            'order_discount' => 0,
            'order_status' => 'Pending',
            'order_address' => '123 Demo Street, Demo City',
            'days_until_delivery' => 3,
            'order_date' => now()->subDays(1),
        ]);

        // Attach one order item using the chosen product
        $order->items()->create([
            'product_id' => $product->product_id,
            'order_item_quantity' => $quantity,
            'order_item_price' => $product->product_price,
            'order_item_status' => 'Purchased',
        ]);
    }
}

