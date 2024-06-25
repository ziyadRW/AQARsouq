<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory, SoftDeletes;
        
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

    public function scopeFilter(Builder $query,array $filters) : Builder {
        return $query
        ->when(
            $filters['priceFrom'] ?? false,
            fn($query, $value) => $query->where('price', '>=', $value)
        )->when(
            $filters['priceTo'] ?? false,
            fn($query, $value) => $query->where('price', '<=', $value)
        )->when(
            $filters['beds'] ?? false,
            fn($query, $value) => $query->where('beds', (int)$value <6 ? '=' : '>=' ,$value)
        )->when(
            $filters['baths'] ?? false,
            fn($query, $value) => $query->where('baths', (int)$value <6 ? '=' : '>=' , $value)
        )->when(
            $filters['areaFrom'] ?? false,
            fn($query, $value) => $query->where('area', '>=', $value)
        )->when(
            $filters['areaTo'] ?? false,
            fn($query, $value) => $query->where('area', '>=', $value)
        );
    }

    //this one include a return type declaration
/*     public function user(): belongsTo {
        $this->belongsTo(User::class , 'user_id');
    } */
}
