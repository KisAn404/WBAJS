<?php
namespace App\Http\Controllers;
use App\Account;
use App\Fund;
use App\Transaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DepositToBankController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('deposit.index',compact('transactions'));
    }
    public function store(Request $request)
    {
           $validator = Validator::make($request->all(), [
        'type' => 'required|in:deposit',
        'date'=>'required',
        'bank_account' => 'required',
        'depositedIn' => 'required',
        'deposit_slip_no' => 'required',
        'debit' => 'required|exists:accounts,acc_code',
        'credit' => 'required|exists:funds,code',
        'amount' => 'required',
    ]);
        
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            Transaction::create([
                'type' => $request->input('type'),
                'date' => $request->input('date'),
                'bank_account' => $request->input('bank_account'),
                'depositedIn' => $request->input('depositedIn'),
                'deposit_slip_no' => $request->input('deposit_slip_no'),
                'debit' => $request->input('debit'),
                'credit' => $request->input('credit'),
                'amount' => $request->input('amount'),
            ]);
              return redirect()->route('deposit.index')
                     ->with('success', 'Deposit to Bank added successfully.');

            }
 public function create()
{
    $accounts = Account::all();
    $funds = Fund::all();
    return view('deposit.create', compact('accounts', 'funds'));
}
public function edit(Transaction $transaction)
    {
        return view('deposit.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
{
    $request->validate([
        'date'=>'required',
        'deposit_slip_no' => 'required',
        'debit' => 'required',
        'credit' => 'required',
        'amount' => 'required',
    ]);
    $transaction->update($request->all());

    return redirect()->route('deposit.index')
        ->with('success','deposit to bank updated successfully');
}

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
    
        return redirect()->route('deposit.index')
                        ->with('success','Deposit to bank deleted successfully');
    }

}

