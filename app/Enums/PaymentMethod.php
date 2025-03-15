<?php

namespace App\Enums;

enum PaymentMethod: string
{
    // 'Cash on Delivery', 'Stripe', 'PayPal'
    case COD = 'Cash on Delivery';
    case Stripe = 'Stripe';
    case PayPal = 'PayPal';
}
