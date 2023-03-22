@extends('fund.layout')
@section('content')
<div class="row" style=" padding-bottom: 15px ">
    <div class="pull-right " style="padding-top: 15px "  >
        <a class="btn btn-success" style="  padding-right: 20px" href="{{ route('fund.create') }}">Create New fund</a>
        @php
            $current_year = date('Y');
            $restrict_year = request()->query('year');
        @endphp
        @if ($restrict_year)
            <a class="btn btn-danger"  href="{{ route('fund.index') }}">Unrestrict</a>
        @else
            <a class="btn btn-danger" href="{{ route('fund.index', ['year' => $current_year]) }}">Restrict based on {{ $current_year }}</a>
        @endif
    </div>
</div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table bg-white rounded shadow-sm table-hover" >
        <thead class="bg-info" >
            <tr>
                <th>Fund No</th>
                <th>Source of Fund</th>
                <th>Bank Account</th>
                <th>Amount</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($funds as $fund)
    <tr>
        <td>{{ $fund->id }}</td>
        <td>{{ $fund->src_of_fund }}</td>
        <td>{{ $fund->bank_account }}</td>
        <td>{{ $fund->amount }}</td>

        <td>
            @if ($restrict_year)
                @if (strtotime($fund->created_at) + (365*24*60*60) >= time())
                    <p>Editing and deleting restricted.</p>
                @else
                    <form action="{{ route('fund.destroy', $fund->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('fund.edit', $fund->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
            @else
                <form action="{{ route('fund.destroy', $fund->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('fund.edit', $fund->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
        </td>
    </tr>
@endforeach


        </tbody>
    </table>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                Total Fund: {{ $totalFunds }} 
            </div>
        </div>
    </div>

    {{ $funds->links() }}
@endsection
