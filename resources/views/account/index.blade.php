@extends('account.layout')
@section('content')
    <h1 class="my-header">CHART OF ACCOUNTS</h1>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" >
                <form action="{{ route('account.index') }}" method="GET">
                    <div class="pull-left">
                        <select name="acc_type" id="acc-type-select">
                            <option value="">All Account Types</option>
                            <option value="Assets" {{ $accountType === 'Assets' ? 'selected' : '' }}>Assets</option>
                            <option value="Liabilities" {{ $accountType === 'Liabilities' ? 'selected' : '' }}>Liabilities</option>
                            <option value="Equity" {{ $accountType === 'Equity' ? 'selected' : '' }}>Equity</option>
                            <option value="Revenue" {{ $accountType === 'Revenue' ? 'selected' : '' }}>Revenue</option>
                            <option value="Expenses" {{ $accountType === 'Expenses' ? 'selected' : '' }}>Expenses</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
        <table class="table bg-white rounded shadow-sm table-hover">
            <thead class="bg-info">
                <tr>
                    <th class="text-center text-dark font-weight-bold" style="color: black;">Account No.</th>
                    <th class="text-center text-dark font-weight-bold" style="color: black;">Account Title</th>
                    <th class="text-center text-dark font-weight-bold" style="color: black;">Account Code</th>
                    <th class="text-center text-dark font-weight-bold" style="color: black;">Account Category</th>
                    <th class="text-center text-dark font-weight-bold" style="color: black;">Account Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td class="text-center"> {{ $account->id }}</td>
                        <td class="text-center">{{ $account->acc_title }}</td>
                        <td class="text-center">{{ $account->acc_code }}</td>
                        <td class="text-center">{{ $account->acc_category }}</td>
                        <td class="text-center">{{ $account->acc_type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $accounts->links() }}
    <script>
        var select = document.getElementById("acc-type-select");
        select.addEventListener("change", function(event) {
            var selectedValue = event.target.value;
            window.location.href = "{{ route('account.index') }}?acc_type=" + selectedValue;
        });
    </script> 

@endsection
