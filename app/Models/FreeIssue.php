<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeIssue extends Model
{
    use HasFactory;
    protected $table = 'free_issues';
    protected $fillable = ['free_issue_label','type','purchase_product','free_product','purchase_quantity','free_quantity','lower_limit','upper_limit'];



    public function products()
    {
        return $this->hasMany(Product::class);
    }



}


