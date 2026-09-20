<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Page Modifier Book') }}
        </h2>
    </x-slot>
    <div class="py-12">

        {{-- CDN BOOTSRAP  --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">




        @if (session('update-book'))
            <div class="alert alert-success"> {{ session('update-book') }}</div>
        @endif



        <form method="POST" action="{{ route('books.update', $book) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <!-- Title-->
            <div>
                <label>Titre</label>
                <input type="text" class="form-control mt-1 w-25" name="title"
                    value="{{ old('title', $book->title) }}" />

                <!-- start Message Error -->
                @error('title')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror


                <!-- End Message Error -->

            </div>

            <!-- author-->
            <div>
                <label>Auteur</label>
                <input type="text" class="form-control mt-1 w-25" name="author"
                    value="{{ old('author', $book->author) }}" />

                <!-- start Message Error -->
                @error('author')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- description-->
            <div>
                <label>Description</label>

                <textarea class="form-control mt-1 w-25" name="description">
                {{ old('description', $book->description) }}
                    </textarea>

                <!-- start Message Error -->
                @error('description')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror

            </div>

            <!-- image-->
            <div>
                @if ($book->image)
                    <label>image Actuel</label>
                    <img src="{{ asset("storage/books/$book->image") }}" style ="height:150px; width:150px;">

                    <label>Changer Image Actuel</label>
                    <input type="file" class="form-control mt-1 w-25" name="image" />
                @else
                    <label>Ajouter Une Image | Aucun Image existe Deja</label>
                    <input type="file" class="form-control mt-1 w-25" name="image" />
                @endif



                <!-- start Message Error -->
                @error('image')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- status-->
            <div>
                <label>Statue</label>

                <select class="form-control mt-1 w-25" name="status">
                    <option value="unread" @selected(old('status', $book->status) == 'unread')>unread</option>
                    <option value="reading" @selected(old('status', $book->status) == 'reading')>reading</option>
                    <option value="read" @selected(old('status', $book->status) == 'read')>read</option>




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
                        <option value="{{ $category->id }}" @selected(old('category_id' , $book->category_id) == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach




                </select>

                <!-- start Message Error -->
                @error('category_id')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror

            </div>








            <button type="submit" class="btn btn-success"> Modifier</button>


        </form>







        {{-- CDN BOOTSRAP  --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>




    </div>
</x-app-layout>
