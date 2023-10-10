<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in! as admin") }}
                </div>
            </div>
        </div>
    </div>
    {{--    menu menus --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-gray-900">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-2">Menus</h2>
                    <div class="flex flex-wrap">
                        <!-- <div class="w-full md:w-1/2 lg:w-1/3">
                            <a href="{{ route('admin.viewAllMenus') }}" class="block bg-blue-200 hover:bg-gray-300 rounded-lg shadow-lg mb-4 p-6">
                                <h3 class="text-xl font-bold mb-2">All Menus</h3>
                                <p class="text-gray-700 text-base">View all menus</p>
                            </a>
                        </div> -->
                        <div class=" px-3 w-full md:w-1/2 lg:w-1/3">
                            <a href="{{route('admin.create')}}" class="block bg-green-200 hover:bg-gray-300 rounded-lg shadow-lg mb-4 p-6">
                                <h3 class="text-xl font-bold mb-2">Create Menu</h3>
                                <p class="text-gray-700 text-base">Create a new menu</p>
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-wrap">
                        @foreach($menus as $menu)
                            <div class="w-full md:w-1/2 lg:w-1/3 p-3">
                                <div class="block hover:bg-gray-300 rounded-lg shadow-lg p-4">
                                    <img src="{{ asset($menu->image) }}" alt="menu"
                                            class="rounded-lg mb-3 w-full h-80 object-cover">
                                    <h3 class="text-xl font-bold mb-2">{{ $menu->name }}</h3>
                                    <p class="text-gray-700 text-base">{{ $menu->price }}</p>
                                    <p class="text-gray-700 text-base">{{ $menu->category->name }}</p>
                                    <div class="mt-3 flex justify-between">
                                        <a href="{{ route('admin.edit', $menu->id) }}"
                                            class="text-blue-500 hover:underline">Edit</a>
                                        <form action="{{route('admin.destroy', $menu->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-gray-900">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-2">User</h2>
                    <div class="flex flex-wrap">
                        <!-- <div class="w-full md:w-1/2 lg:w-1/3">
                            <a href="{{ route('admin.viewAllMenus') }}" class="block bg-blue-200 hover:bg-gray-300 rounded-lg shadow-lg mb-4 p-6">
                                <h3 class="text-xl font-bold mb-2">All Menus</h3>
                                <p class="text-gray-700 text-base">View all menus</p>
                            </a>
                        </div> -->
                        <!-- <div class=" px-3 w-full md:w-1/2 lg:w-1/3">
                            <a href="{{route('admin.create')}}" class="block bg-green-200 hover:bg-gray-300 rounded-lg shadow-lg mb-4 p-6">
                                <h3 class="text-xl font-bold mb-2">Create Menu</h3>
                                <p class="text-gray-700 text-base">Create a new menu</p>
                            </a>
                        </div> -->
                    </div>
                    <div class="flex flex-wrap">
                        @foreach($users as $user)
                            <div class="w-full md:w-1/2 lg:w-1/3 p-3">
                                <div class="block hover:bg-gray-300 rounded-lg shadow-lg p-4">
                                    <h3 class="text-xl font-bold mb-2">{{ $user->name }}</h3>
                                    <p class="text-gray-700 text-base">{{ $user->email }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-gray-900">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-2">Daftar Pesanan</h2>
                    <table class="w-full border-collapse border border-gray-400">
                        <thead>
                            <tr>
                                <th class="border border-gray-400 px-4 py-2">Nama Pelanggan</th>
                                <th class="border border-gray-400 px-4 py-2">Menu Pesanan</th>
                                <th class="border border-gray-400 px-4 py-2">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2">{{ $transaction->user->name }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $transaction->menu->name }}</td>
                                    <td class="border border-gray-400 px-4 py-2">Rp {{ $transaction->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>