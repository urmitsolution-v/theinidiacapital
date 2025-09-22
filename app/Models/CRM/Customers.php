<?php

namespace App\Models\CRM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;



    protected $table = 'cusotmers';
    protected $fillable = [
        'name',
        'mobile',
        'dob',
        'audioPlayer_input',
        'febrics_detail',
        'delivery_date',
        'qunatity_work',
        'bill_number',
        'order_date',
        'salesman_code',
        'allow_cutting_master',
        'workshop_user',
        'cutting_master_user',
        'gst',
        'fabrics',
        'quantity',
        'amount',
        'total_quantity',
        'total_amount',
        'discount',
        'advance',
        'advance_date',
        'balance',
        'receive',
        'receive_date',
        'top_data',
        'bottom_data',
        'fabric_image',
        'note',
        'workshop_status',
        'work_status',
    ];



    public function cuttingQtys()
    {
        return $this->hasMany(Cutting_QTY::class, 'customer_id', 'id');
    }



}
