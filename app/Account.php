<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Account extends Model
{
    use HasFactory;
  
    public $timestamps=false;
    protected $fillable = 
    ['acc_title', 'acc_code', 'acc_category', 'acc_type' ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'account_title');
    }
 }