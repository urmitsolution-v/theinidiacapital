<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CRM\Customers;

class Workshop_Cutting extends Model
{
    use HasFactory;

    protected $table = 'workshop_cutting';
    protected $fillable = [
        'customer_id',
        'user_id',
        'category_type',
        'qty'
    ];

    use HasFactory;


    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

}
