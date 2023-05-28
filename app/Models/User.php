<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Cashier\Subscription;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'affiliate_id',
        'affiliate_code'
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

    public function fullName(){
        return $this->name.' '.$this->surname;
    }

    public function openai(){
        return $this->hasMany(UserOpenai::class);
    }

    public function orders(){
        return $this->hasMany(UserOrder::class);
    }

    public function plan(){
        return $this->hasMany(UserOrder::class)->where('type', 'subscription')->orderBy('created_at', 'desc')->first();
    }

    public function activePlan(){

        $activesub = $this->subscriptions()->where('stripe_status', 'active')->first();
        if ($activesub != null){
            $plan = PaymentPlans::where('id', $activesub->plan_id)->first();
            if ($plan == null){
                return null;
            }
            $difference = $activesub->updated_at->diffInDays(Carbon::now());
            if ($plan->frequency == 'monthly'){
                if ($difference < 31){
                    return $plan;
                }
            }elseif ($plan->frequency == 'yearly'){
                if ($difference < 365){
                    return $plan;
                }
            }
        }else{
            return null;
        }

    }


    //Support Requests
    public function supportRequests(){
        return $this->hasMany(UserSupport::class);
    }

    //Favorites
    public function favoriteOpenai(){
        return $this->belongsToMany(OpenAIGenerator::class, 'user_favorites', 'user_id', 'openai_id');
    }

    //Affiliate
    public function affiliates(){
        return $this->hasMany(User::class, 'affiliate_id', 'id');
    }

    public function affiliateOf(){
        return $this->belongsTo(User::class, 'affiliate_id', 'id');
    }

    public function withdrawals(){
        return $this->hasMany(UserAffiliate::class);
    }

    //Chat
    public function openaiChat(){
        return $this->hasMany(UserOpenaiChat::class);
    }

    //Avatar
    public function getAvatar(){
        if ($this->avatar == null){
            return '<span class="avatar">'.Str::upper(substr($this->name, 0, 1)).Str::upper(substr($this->surname, 0, 1)).'</span>';
        }else{
            $avatar = $this->avatar;
            return  ' <span class="avatar" style="background-image: url(/'.$avatar.')"></span>';
        }
    }
}
