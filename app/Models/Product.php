<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'products';

    protected $fillable = [
        'article',
        'name',
        'status',
        'properties',
    ];

    protected $casts = [
        'properties' => 'array',
    ];

    public function scopeAvailable(Builder $query): void
    {
        $query->where('status', '=', 'available');
    }

    /**
     * Маршрутизация уведомлений для почтового канала.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return array|string
     */
    public function routeNotificationForMail($notification)
    {
        // Вернуть только адрес электронной почты ...
        return config('products.email', false);

    }
}
