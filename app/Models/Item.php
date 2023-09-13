<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'host',
        'risk',
        'base',
        'protocol',
        'port',
        'cve',
        'category_order',
        'name',
        'synopsis',
        'description',
        'solution',
        'plugin',
        'zone',
        'site',
        'unit',
        'so',
        'note',
        'status'
    ];

    // Illuminate\Support\Str::words(html_entity_decode(strip_tags($item->solution)), 2)

    protected function solution(): Attribute
    {
        return Attribute::make(
            fn (string $value) => Str::limit(strip_tags($value), 50, '...')
        );
    }
    protected function description(): Attribute
    {
        return Attribute::make(
            fn (string $value) => Str::limit(strip_tags($value), 50, '...')
        );
    }
}
