<?php
  
namespace App\Http\Controllers;
   
use App\Account;
use Illuminate\Http\Request;
  
class AccountController extends Controller
{
  public function index(Request $request)
{
    $perPage = 10; // Define the number of records to display per page
    $accountType = $request->input('acc_type');
    
    // Get the accounts based on the selected account type, if any
    $accounts = Account::when($accountType, function ($query, $accountType) {
                        return $query->where('acc_type', $accountType);
                    })
                    ->paginate($perPage);
    
    return view('account.index', compact('accounts', 'accountType'));
}

    
     
    public function create()
    {
       
    }

    public function store(Request $request)
    {

    }

    public function show(Account $account)
    {

    } 
     
    public function edit(Account $account)
    {
 
    }

    public function update(Request $request, Account $account)
    {
    }
    public function destroy(Account $account)
    {
    }
}