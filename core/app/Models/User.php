<?php

namespace App\Models;

use App\Constants\Status;
use App\Traits\Searchable;
use App\Traits\UserNotify;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Searchable, UserNotify;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'ver_code', 'balance', 'kyc_data'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'address' => 'object',
        'kyc_data' => 'object',
        'ver_code_send_at' => 'datetime'
    ];


    public function loginLogs()
    {
        return $this->hasMany(UserLogin::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class)->orderBy('id', 'desc');
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class)->where('status', '!=', Status::PAYMENT_INITIATE);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class)->where('status', '!=', Status::PAYMENT_INITIATE);
    }

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    public function publicCollections()
    {
        return $this->hasMany(Collection::class)->where('is_public', Status::YES);
    }

    public function privateCollections()
    {
        return $this->hasMany(Collection::class)->where('is_public', Status::NO);
    }

    public function purchasedPlan()
    {
        return $this->hasOne(PlanPurchase::class)->whereDate('expired_at', '>=', now());
    }

    public function collectionImages()
    {
        return $this->hasManyThrough(CollectionImage::class, Collection::class);
    }

    public function allImages()
    {
        return $this->hasMany(Image::class);
    }
    
    public function images()
    {
        return $this->hasMany(Image::class)->where('status', Status::ENABLE);
    }

    public function followers()
    {
        return $this->hasMany(Follow::class, 'following_id');
    }

    public function referralLogs()
    {
        return $this->hasMany(ReferralLog::class);
    }
    public function earningLogs()
    {
        return $this->hasMany(EarningLog::class, 'contributor_id');
    }

    public function followings()
    {
        return $this->hasMany(Follow::class, 'user_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function downloads()
    {
        return $this->hasMany(Download::class);
    }

    public function referrer()
    {
        return $this->belongsTo(self::class, 'ref_by');
    }

    public function referrals()
    {
        return $this->hasMany(User::class, 'ref_by');
    }

    public function allReferrals()
    {
        return $this->referrals()->with('referrer');
    }

    public function fullname(): Attribute
    {
        return new Attribute(
            get: fn () => $this->firstname . ' ' . $this->lastname,
        );
    }

    // SCOPE$queryS
    public function scopeActive($query)
    {
        $query->where('status', Status::USER_ACTIVE)->where('ev', Status::VERIFIED)->where('sv', Status::VERIFIED);
    }

    public function scopeBanned($query)
    {
        $query->where('status', Status::USER_BAN);
    }

    public function scopeEmailUnverified($query)
    {
        $query->where('ev', Status::NO);
    }

    public function scopeMobileUnverified($query)
    {
        $query->where('sv', Status::NO);
    }

    public function scopeKycUnverified($query)
    {
        $query->where('kv', Status::KYC_UNVERIFIED);
    }

    public function scopeKycPending($query)
    {
        $query->where('kv', Status::KYC_PENDING);
    }

    public function scopeEmailVerified($query)
    {
        $query->where('ev', Status::VERIFIED);
    }

    public function scopeMobileVerified($query)
    {
        $query->where('sv', Status::VERIFIED);
    }

    public function scopeWithBalance($query)
    {
        $query->where('balance', '>', 0);
    }

    public function alredyDownload($imageFile, $type){
        $download = Download::where('user_id', auth()->user()->id)->where('image_file_id', $imageFile)->where('type',$type)->first();
        if($download){
            return "yes";
        }else{
            return "no";
        }
    }
}
