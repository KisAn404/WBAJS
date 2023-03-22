@extends('collection.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('collection.create') }}"> Create New deposit</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Transaction No.</th>
            <th>Transaction Type</th>
            <th>Date</th>
            <th>Bank Account</th>
            <th>Account Title</th>
            <th>DepositedIn</th>
            <th>Reference</th>
            <th>Amount</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($transactions as $transaction) 
        <tr>
            <td>{{ $transaction->id}}</td>
            <td>{{ $transaction->type}}</td>
            <td>{{ $transaction->date }}</td>
            <td>{{ $transaction->bank_account}}</td>
            <td>{{ $transaction->account_title}}</td>
            <td>{{ $transaction->depositedIn}}</td>
            <td>{{ $transaction->check_no }}</td>
            <td>{{ $transaction->amount }}</td>
            <td>
                <form action="{{ route('collection.destroy',$transaction->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('collection.edit',$transaction->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
