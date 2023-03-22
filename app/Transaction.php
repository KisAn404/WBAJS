<?php

namespace App;

use App\Fund;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['bank_account','type','date','payer/payee','particulars','or_no','dv_no','pb_no','rcd_no','check_no','deposit_slip_no','depositedIn','debit','credit', 'amount'];
    
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function fund()
    {
        return $this->belongsTo(Fund::class);
    }
}
