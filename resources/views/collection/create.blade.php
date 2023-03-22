@extends('collection.layout')
  
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add Deposit to Bank</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('collection.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">   
<form action="{{ route('collection.store') }}" method="POST">
    @csrf
    
    <label for ="type">Transaction type:</label>
    <select name="type" id="type">
        <option value="Deposit">Deposit</option>
        <option value="Collection">Collection</option>   
        <option value="Expenses">Expenses</option>   
    </select>
       <br>
    <label for ="date">Date:</label>
    <input type="date" name="date" placeholder="date"><br>
      
    <label for ="check_no">Reference:</label>
    <input type="text" name="check_no" placeholder=""><br>

    <label for="account_title">Account Title</label>
    <select name="account_title">
        @foreach($accounts as $account)
            <option value="{{ $account->acc_code }}">{{ $account->acc_title }}</option>
        @endforeach
    </select>
    <br>
    <label for="bank_account">Bank Account</label>
    <select name="bank_account">
        @foreach($funds as $fund)
            <option value="{{ $fund->bank_account }}">{{ $fund->bank_account }}</option>
        @endforeach
    </select>
    <br>

    <label for ="depositedIn">DepositedIn:</label>
    <select name="depositedIn" id="depositedIn">
        <option value="Cash in Local Treasury">Cash in Local Treasury</option>
        <option value="Cash in Bank">Cash in Bank</option>   
        <option value="Cash Advance">Cash Advance</option>   
        <option value="Petty Cash">Petty Cash</option>   
        
      </select><br>

    <label for ="amount">Amount:</label>
    <input type="number" name="amount" min="0.01" step="0.01" required placeholder=""><br>
    
    <button type="submit">Save Transaction</button>


   
</form>
</div>
@endsection