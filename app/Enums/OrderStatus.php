<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'Pending';
    case Processing = 'Processing';
    case Confirmed = 'Confirmed';
    case AtLocalFacility = 'At Local Facility';
    case OutForDelivery = 'Out for Delivery';
    case Delivered = 'Delivered';
    case Cancelled = 'Cancelled';
    case Failed = 'Failed';
    case Refunded = 'Refunded';
    case Rejected = 'Rejected';
}
