<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssigedGLAccount extends Model
{
    use HasFactory;

    protected $fillable = [
      'parent_g_l_account_id',
      'child_g_l_account_id',
      'chart_of_account_id'
    ];
}
