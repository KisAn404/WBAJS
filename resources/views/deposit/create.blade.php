@extends('deposit.layout')
  
@section('content')
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
    <div style="padding-left: 15% " class="d-flex align-items-center">
         <a class="btn btn-primary" href="{{ route('deposit.index') }}"> Back</a><h1 class="my-header">Add Deposit to Bank</h1>   
    </div>
    <div class="card">
    <div class="card-body">
  
<form action="{{ route('deposit.store') }}" method="POST">
    @csrf
    <div class="mb-3 row">
    <label for="type" class="col-sm-3 col-form-label">Transaction Type:</label>
    <select style="width: 50%" style="height: 50px" name="type" id="type">
    <option value="Deposit" {{ old('type') == 'Deposit' ? 'selected' : '' }}>Deposit</option>
    <option value="Collection" {{ old('type') == 'Collection' ? 'selected' : '' }}>Collection</option>
    <option value="Expenses" {{ old('type') == 'Expenses' ? 'selected' : '' }}>Expenses</option>
    </select>
    </div>

  <div class="mb-3 row" >
    <label for ="date" class="col-sm-3 col-form-label">Date:</label>
    <input style="width: 50%" style="height: 50px" type="date" name="date" placeholder="date">
       </div>

       <div class="mb-3 row" >
    <label for ="deposit_slip_no"class="col-sm-3 col-form-label">Reference:</label>
    <input style="width: 50%" style="height: 50px" type="text" name="deposit_slip_no" placeholder="">
       </div>

<div class="mb-3 row" >
    <label for="bank_account" class="col-sm-3 col-form-label">Bank Account</label>
    <select style="width: 50%" style="height: 50px" name="bank_account">
        <option value="DBP - UBAY, BOHOL">DBP - UBAY, BOHOL</option>   
        <option value="LBP - TALIBON, BOHOL">LBP - TALIBON, BOHOL</option>   
    </select>
</div>

<div class="mb-3 row" >
    <label for="depositedIn" class="col-sm-3 col-form-label">DepositedIn:</label>
    <select style="width: 50%" style="height: 50px" name="depositedIn" id="depositedIn">
        <option value="Cash in Local Treasury">Cash in Local Treasury</option>
        <option value="Cash in Bank">Cash in Bank</option>   
        <option value="Cash Advance">Cash Advance</option>   
        <option value="Petty Cash">Petty Cash</option>   
      </select>
</div>

  <div class="mb-3 row" >
    <label for="debit"class="col-sm-3 col-form-label">Debit</label>
    <select style="width: 50%" style="height: 50px"name="debit">
        @foreach($accounts as $account)
            <option value="{{ $account->acc_code }}">{{ $account->acc_title }}</option>
        @endforeach
    </select>
    </div>

      <div class="mb-3 row" >
    <label for="credit"class="col-sm-3 col-form-label">Credit</label>
    <select style="width: 50%" style="height: 50px"name="credit">
        @foreach($accounts as $account)
            <option value="{{ $account->acc_code }}">{{ $account->acc_title }}</option>
        @endforeach
    </select>
    </div>

<div class="mb-3 row" >
    <label for ="amount" class="col-sm-3 col-form-label">Amount:</label>
    <input style="width: 50%" style="height: 50px" type="number" name="amount" min="0.01" step="0.01" required placeholder=""><br>
</div>

    <button type="submit">Save Transaction</button>
</form>
</div>
  </div>
@endsection