<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catgeories') }}
        </h2>
    </x-slot>
    <div class="py-12">




        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            {{-- CDN BOOTSRAP  --}}
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <body>




            <a href="{{ route('categories.create') }}" class="btn btn-success m-2" target="_blank">Ajouter Category</a>

            @if (session('status-delete-category'))
                <div class="alert alert-success">{{ session('status-delete-category') }}</div>
            @endif


            <div class="row">
                <div class="col-6">
                    @if (count($categories) > 0)
                        <table class="table table-bordered border-primary">
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>Actions</th>
                            </tr>




                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>


                                    <td>

                                        <!-- Button Modifier -->
                                        <a href="{{ route('categories.edit', $category) }}" target="_blank"
                                            class="btn btn-primary">Modifier</a>

                                        <!-- Button Supprimer -->
                                        <form method="POST" action="{{ route('categories.destroy', $category) }}"
                                            onsubmit="return confirm('Vous Etes Sur de supprimer ce element :  {{ $category->name }} ')"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>

                                    </td>




                                </tr>
                            @endforeach
                        @else
                            <p>Aucun Categories</p>


                        </table>
                    @endif

                </div>

            </div>


            {{-- CDN BOOTSRAP  --}}
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>
    </div>
</x-app-layout>
