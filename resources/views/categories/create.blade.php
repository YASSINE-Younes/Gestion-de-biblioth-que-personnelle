<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Page Ajouter CATEGORY') }}
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
            @if (session('status-store-category'))
                <span style="color:green;">{{ session('status-store-category') }}</span>
            @endif

            <form method="POST" action="{{ route('categories.store') }}">
                @csrf


                <label for="">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" />

                <button type="submit" class="btn btn-success">Ajouter</button>
                
                <br>

                @error('name')
                    <span style="color:red;">{{ $message }}</span>
                @enderror

            </form>

            {{-- CDN BOOTSRAP  --}}
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>




    </div>
</x-app-layout>
