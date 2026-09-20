<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Page Ajouter Book') }}
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

            @if (session('status-store-book'))
                <div class="alert alert-success">
                    {{ session('status-store-book') }}
                </div>
                
            @endif


            <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Title-->
                <div>
                    <label>Titre</label>
                    <input type="text" class="form-control mt-1 w-25" name="title" />

                    <!-- start Message Error -->
                    @error('title')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror


                    <!-- End Message Error -->

                </div>

                <!-- author-->
                <div>
                    <label>Auteur</label>
                    <input type="text" class="form-control mt-1 w-25" name="author" />

                    <!-- start Message Error -->
                    @error('author')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- description-->
                <div>
                    <label>Description</label>

                    <textarea class="form-control mt-1 w-25" name="description">

                    </textarea>

                    <!-- start Message Error -->
                    @error('description')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror

                </div>

                <!-- image-->
                <div>
                    <label>image</label>
                    <input type="file" class="form-control mt-1 w-25" name="image" />

                    <!-- start Message Error -->
                    @error('image')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- status-->
                <div>
                    <label>Statue</label>

                    <select class="form-control mt-1 w-25" name="status">
                        <option value="unread">unread</option>
                        <option value="reading">reading</option>
                        <option value="read">read</option>
                    </select>

                    <!-- start Message Error -->
                    @error('status')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror

                </div>


                <!-- Categoy ID-->
                <div>
                    <label>Category</label>

                    <select class="form-control mt-1 w-25" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>

                    <!-- start Message Error -->
                    @error('category_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror

                </div>








                <button type="submit" class="btn btn-primary"> Ajouter</button>


            </form>







            {{-- CDN BOOTSRAP  --}}
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

        </body>

        </html>


    </div>
</x-app-layout>
