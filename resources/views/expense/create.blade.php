{{-- @extends('deposit.layout')
  
@section('content') --}}

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('expense.store') }}">
                @csrf

                <label>Date:</label>
                <input type="date" name="date" required>

                <label>Payee:</label>
                <input type="text" name="payee" required>

                <label>Particulars:</label>
                <input type="text" name="particulars" required>

                <label>Check No.:</label>
                <input type="text" name="check_no" required>

                <label>DV No.:</label>
                <input type="text" name="dv_no" required>

                <label>Type of Fund:</label>
                 <label for="type_of_fund" required>
                    @foreach ($funds as $fund)
                        <option value="{{ $fund->type_of_fund }}">{{ $fund->type_of_fund }}</option>
                    @endforeach
                </select>

                <label>Bank Account:</label>
                <label for="bank_account" required>
                 @foreach($funds as $fund)
                     <option value="{{ $fund->bank_account }}">{{ $fund->bank_account }}</option>
                 @endforeach

                <label>Deposited In:</label>
                <input type="text" name="deposited_in" required>

                <label>Amount:</label>
                <input type="number" name="amount" required>

                <label>Account Title:</label>
                <select name="account_title" required>
                    @foreach ($accounts as $account)
                        <option value="{{ $account->id }}">{{ $account->acc_title }}</option>
                    @endforeach
                </select>

                <label>Debit:</label>
                <input type="number" name="debit" required>

                <label>Credit:</label>
                <input type="number" name="credit" required>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
