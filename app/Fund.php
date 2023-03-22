<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    protected $fillable = [
        'src_of_fund', 'bank_account', 
        'amount'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
