<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $trade_account_number
 * @property string $business_name
 * @property string $name
 * @property string $email
 * @property string $ip_address
 * @property string $message
 * @property string $subject
 * @property bool $is_read
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Message extends Model
{
    protected $fillable = [
        'trade_account_number',
        'business_name',
        'name',
        'email',
        'message',
        'subject',
        'ip_address',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}
