<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Newsletter extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email'];
}
