<?php

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use App\Fund;

use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index()
    {
      $transactions = Transaction::all();
        return view('expense.create',compact('transactions'));
    }
    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'date' => 'required',
            'payee' => 'required',
            'particulars' => 'required',
            'check_no' => 'required',
            'dv_no' => 'required',
            'fund_id' => 'required',
            'bank_account' => 'required',
            'deposited_in' => 'required',
            'amount' => 'required',
            'account_id' => 'required',
            'debit' => 'required',
            'credit' => 'required',
    ]);

    $transaction = new Transaction;
    $transaction->date = $validatedData['date'];
    $transaction->payee_payor = $validatedData['payee'];
    $transaction->particulars = $validatedData['particulars'];
    $transaction->check_no = $validatedData['check_no'];
    $transaction->dv_no = $validatedData['dv_no'];
    $transaction->fund_id = $validatedData['fund_id'];
    $transaction->bank_account = $validatedData['bank_account'];
    $transaction->deposited_in = $validatedData['deposited_in'];
    $transaction->amount = $validatedData['amount'];
    $transaction->account_id = $validatedData['account_id'];
    $transaction->debit = $validatedData['debit'];
    $transaction->credit = $validatedData['credit'];

    $account = Account::findOrFail($validatedData['account_id']);

    if ($account->acc_type === 'debit') {
        $transaction->debit = $validatedData['amount'];
        $transaction->credit = 0;
    } else if ($account->acc_type === 'credit') {
        $transaction->credit = $validatedData['amount'];
        $transaction->debit = 0;
    }

    $transaction->save();

    return redirect()->back()->with('success', 'Transaction saved!');
}

    public function create()
    {
         $accounts = Account::all();
         $funds = Fund::all();
             return view('expense.create', compact('accounts', 'funds'));

    }

    public function show($id)
    {
       
    }

    public function edit($id)
    {
       
    }

    public function update(Request $request, $id)
    {
      
    }

    public function destroy($id)
    {
   
    }
}
