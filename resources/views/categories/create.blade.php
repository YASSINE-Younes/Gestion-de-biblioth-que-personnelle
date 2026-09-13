<h1>Page Ajouter CATEGORY</h1>



@if(session('status-store-category'))
        <span style="color:green;">{{ session('status-store-category') }}</span>

@endif

<form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <label for="">Name</label>
    <input type="text" name="name" value="{{ old('name') }}" />

    <button type="submit">Ajouter</button>
    <br>
    @error('name')
        <span style="color:red;">{{ $message }}</span>
    @enderror

</form>
