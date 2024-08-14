<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'deleted_by',
    ];

    // If you have a custom table name, specify it here.
    protected $table = 'customers';

    // If you need to customize the primary key name, you can do so.
    protected $primaryKey = 'id';
}
