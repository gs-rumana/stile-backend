<?php

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('shipping_address_id');
            $table->foreignId('billing_address_id');
            $table->string('order_id');
            $table->double('total');
            $table->enum('status', [OrderStatus::Pending->value, OrderStatus::Processing->value, OrderStatus::Delivered->value, OrderStatus::Cancelled->value, OrderStatus::Failed->value, OrderStatus::Refunded->value, OrderStatus::Rejected->value, OrderStatus::AtLocalFacility->value, OrderStatus::OutForDelivery->value, OrderStatus::Confirmed->value, OrderStatus::Delivered->value])->default(OrderStatus::Pending->value);
            $table->enum('payment_method', [PaymentMethod::COD->value, PaymentMethod::Stripe->value, PaymentMethod::PayPal->value])->default(PaymentMethod::COD->value);
            $table->enum('payment_status', [PaymentStatus::Pending->value, PaymentStatus::Paid->value, PaymentStatus::Failed->value, PaymentStatus::Refunded->value, PaymentStatus::Rejected->value])->default(PaymentStatus::Pending->value);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
