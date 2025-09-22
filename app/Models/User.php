<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $table = 'users';
    protected $fillable = [
        'name',
        'referral_code',
        'bank_identity',
        'cancel_chaque',
        'bank_name',
        'nominee_contact',
        'nominee_age',
        'nominee_relation',
        'nominee_name',
        'referred_by',
        'email',
        'destination',
        'password',
        'phone',
        'address',
        'access_type',
        'image',
        'company_name',
        'team_type',
        'refer_by',
        'job_title',
        'company_address',
        'gstin',
        'domain',
        'is_block',
        'codeid',
        'role',
        'role_type',
        'remember_token',
        'first_name',
        'last_name',
        'account_holder_name',
        'account_number',
        'ifsc_code',
        'branch_name',
        'wallet',
        'aadhar_card_number',
        'aadhar_card',
        'aadhar_card_back',
        'pan_number',
        'pan_card',
        'status',
        'kyc_status',
        'reason',
        'kyc_reason',
        'kyc_time',
        'refer_by_wallet',
        'refer_wallet'
    ];

    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


     static public function GetSingleEmail($email){
        return User::where('email', '=', $email)->first();
    }
    static public function GetSingleToken($token){
        return User::where('remember_token', '=', $token)->first();
    }



    public function referredUsers()
    {
        return $this->hasMany(User::class, 'refer_by', 'id');
    }

    public function investments()
    {
        return $this->hasMany(Invest::class, 'userid', 'id');
    }


    public function referrals()
{
    return $this->hasMany(User::class, 'refer_by');
}



public function referralCommissions()
{
    return $this->hasMany(CommissionHistory::class, 'user_id');
}
 
public function customerPayments()
{
    return $this->hasMany(\App\Models\CRM\Customerpayment::class, 'customer_id', 'id');
}

public function withdraws()
{
    return $this->hasMany(Withdraw::class, 'userid', 'id');
}


}