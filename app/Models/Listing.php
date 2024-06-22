<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
        
    ///or add     Model::unguard();     to the boot()
    
/*     protected $fillable = [
        'headline',
        'beds',
        'baths',
        'area',
        'city',
        'code',
        'neighbourhood',
        'street',
        'description',
        'price',
        'user_id'
    ]; */

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }

    //this one include a return type declaration
/*     public function user(): belongsTo {
        $this->belongsTo(User::class , 'user_id');
    } */
}
