<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'badge',
        'title',
        'description',
        'image',
        'is_full_page',
        'primary_button_text',
        'primary_button_link',
        'secondary_button_text',
        'secondary_button_link',
        'note_label',
        'note_text',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_full_page' => 'boolean',
        'sort_order' => 'integer',
    ];
}
