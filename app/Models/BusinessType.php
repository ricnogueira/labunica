<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Business;

class BusinessType extends Model
{
    use HasFactory;

    public function busines_types(){
    
        return $this->belogsToMany(Business::class);
    }

}

