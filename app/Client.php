<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Client extends Authenticatable
{
    use Notifiable,HasRoles,HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','image','phone','home_telphone'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    ///////////////////set image///////////////////////////////
    public function setImageAttribute($value)
    {
        $path     = '/uploads/clients/'.date('Y-m-d').'/';
        if(is_file($value))
        {
        $img_name = time().rand(0,999).'.'.$value->getClientOriginalExtension();
        $value->move(base_path($path),$img_name);
        $this->attributes['image']= $path.$img_name ;
        }
        else{
        $this->attributes['image']= $path.$value ;
        }

    }

    public function getImageAttribute($value)
    {
        if(isset($value)){
            return url($value);
        }
        else{
            return $value;
        }

    }

    public function cities()
    {
        return $this->belongsToMany('App\City','client_addresses','client_id','city_id')
        ->withPivot('id','address','details')->withTimestamps();
    }

    public function rates()
    {
        return $this->belongsToMany('App\Product','client_rates','client_id','product_id')
        ->withPivot('id', 'rate' , 'comment' , 'publish')->where('publish','=', 1)->withTimestamps();
    }

    public function admin_rates()
    {
        return $this->belongsToMany('App\Product','client_rates','client_id','product_id')
        ->withPivot('id', 'rate' , 'comment' , 'publish')->withTimestamps();
    }

    public function carts()
    {
        return $this->belongsToMany('App\Product','carts','client_id','product_id')
        ->withPivot('id', 'quantity' , 'price' ,'total_price')->withTimestamps();
    }

    public function orders()
    {
        return $this->hasMany('App\Order','client_id','id');
    }

    public function coupons()
    {
        return $this->hasMany('App\Coupon','client_id','id')->where('used',1);
    }

}
