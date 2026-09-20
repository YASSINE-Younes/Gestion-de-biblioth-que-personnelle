<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('  BOOKS INDEX') }}
        </h2>
    </x-slot>
    <div class="py-12">



        {{-- CDN BOOTSRAP  --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">



        <table class="table table-bordered border-primary">
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>Auteur</th>
                <th>Description</th>
                <th>image</th>
                <th>Statue</th>
                <th>Category</th>
                <th>user</th>
                <th>Actions</th>
            </tr>

            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->description }}</td>

                    <td>

                        @if ($book->image)
                            <img src="{{ asset("storage/books/$book->image") }}" style="width:100px;height:100px;">
                        @else
                            <span>Aucune image</span>
                        @endif


                    </td>

                    <td>{{ $book->status }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->user->name }}</td>
                    <td>
                        <a class="btn btn-outline-primary" href="{{ route('books.edit', $book) }}"
                            target="_blank">Modifier</a>


                        <!-- Start Button Supprimer -->
                        <form method="POST"
                         action="{{ route('books.destroy' , $book) }}"
                            onsubmit="return confirm('Sur De  Suppression')"
                         >
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn btn-danger">Supprimer</button>
                        </form>
                        <!-- End Button Supprimer -->
                     </td>

                </tr>
            @endforeach

        </table>





        {{-- CDN BOOTSRAP  --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>




    </div>
</x-app-layout>
