<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AssigedGLAccount extends Model
{
    use HasFactory;

    protected $fillable = [
      'parent_g_l_account_id',
      'child_g_l_account_id',
      'chart_of_account_id'
    ];

    public function GLAccount()
    : HasOne
    {
        return $this->hasOne(GLAccount::class, 'id', 'parent_g_l_account_id');
    }

    public function ChartOfAccount()
    : HasOne
    {
        return $this->hasOne(ChartOfAccount::class, 'id', 'chart_of_account_id');
    }
}
