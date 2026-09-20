<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('  BOOKS SEARSH') }}
        </h2>
    </x-slot>
    <div class="py-12">



        {{-- CDN BOOTSRAP  --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">


        <form method="GET" action="{{ route('books.searsh') }}">
            <label> Checrher Par Title</label>
            <input type="text" name= "searsh" class="form-control w-25 mb-3" />

            @error('searsh')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">afficher</button>

        </form>

        <table class="table table-bordered border-primary">
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>Auteur</th>
                <th>Description</th>
                <th>image</th>
                <th>Statue</th>
                <th>Category</th>
             
            </tr>





            @if (isset($result))
                @foreach ($result as $r)
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->title }}</td>
                        <td>{{ $r->author }}</td>
                        <td>{{ $r->description }}</td>
                        <td>{{ $r->image }}</td>
                        <td>{{ $r->status }}</td>
                        <td>{{ $r->category_id }}</td>
               
                     

 















                    </tr>
                @endforeach

            @endif








        </table>





        {{-- CDN BOOTSRAP  --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>




    </div>
</x-app-layout>
