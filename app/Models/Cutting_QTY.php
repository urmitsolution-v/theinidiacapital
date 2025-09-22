<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\CRM\Customers;

class Cutting_QTY extends Model
{

    protected $table = 'cutting_qty';
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
