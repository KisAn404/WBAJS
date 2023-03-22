<form action="{{ route('transaction') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Enter Name" />
    <input type="email" name="email" placeholder="Enter Email" />
    <input type="hidden" name="id" value="{{ $record->id ?? '' }}" />
    <button type="submit" name="action" value="save">Save</button>
    <button type="submit" name="action" value="update">Update</button>
    <button type="submit" name="action" value="delete">Delete</button>
</form>
