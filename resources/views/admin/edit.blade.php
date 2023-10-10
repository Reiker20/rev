<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Image lama dan file input --}}
                        <img src="{{ asset($menu->image) }}" alt="menu">
                        <br>
                        <div class="form-group mb-4">
                            <label class="text-dom-a5" for="image">Image</label>
                            <input id="image" type="file" class="form-control" name="image">
                        </div>
                        <div class="mb-4">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" name="name" id="name" placeholder="Nama Menu"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                                required autocomplete="name" autofocus
                                value="{{ old('name', $menu->name) }}">
                            @error('name')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="harga" class="sr-only">Harga</label>
                            <input type="number" name="price" id="harga" placeholder="Harga Menu"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('price') border-red-500 @enderror"
                                required autocomplete="price" autofocus
                                value="{{ old('price', $menu->price) }}">
                            @error('price')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="category_id" class="sr-only">Category</label>
                            <select name="category_id" id="category_id"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('category_id') border-red-500 @enderror"
                                required autocomplete="category_id" autofocus>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $menu->category->id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="sr-only">Deskripsi</label>
                            <textarea name="description" id="deskripsi" placeholder="Deskripsi Menu"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror"
                                required autocomplete="description" autofocus>{{ old('description', $menu->description) }}</textarea>
                            @error('description')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Add any other fields you need to edit -->

                        <div>
                            <button type="submit" class="block bg-green-200 text-black p-2 rounded font-medium w-full">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

