@extends('deposit.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit funds</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('deposit.index') }}"> Back</a>
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
    <form action="/deposit/{{ $transaction->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="date" value="{{ $transaction->date }}" class="form-control" placeholder="date">
                </div>
            </div>
      
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Reference:</strong>
                    <input type="check_no" name="check_no" value="{{ $transaction->check_no }}" class="form-control" placeholder="check_no">
                </div>
            </div>
        </div>
                {{-- <label for="account_title">Account Title</label>
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
                </select><br>
           
                <label for ="depositedIn">DepositedIn:</label>
                <select name="depositedIn" id="depositedIn">
                    <option value="Cash in Local Treasury">Cash in Local Treasury</option>
                    <option value="Cash in Bank">Cash in Bank</option>   
                    <option value="Cash Advance">Cash Advance</option>   
                    <option value="Petty Cash">Petty Cash</option>   
                    
                  </select><br> --}}

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Amount</strong>
                                <input type="number" name="amount" min="0.01" step="0.01" required value="{{ $transaction->amount}}"class="form-control" placeholder="amount">

                                <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
        </div>
    </form>
@endsection
