<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GLAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'account',
        'name',
        'status',
        'desc',
        'posting_account',
        'type',
        'designation',
    ];
}
