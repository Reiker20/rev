@extends('layouts.main')

@section('container')
    <h1 align="center">Menu Makanan dan Minuman</h1>
    <br><br>
    <div class="menu">
        <div class="row">
            <div class="col-10">
                <h1 class="mt-3"></h1>
                @if (session()->has('success'))
                    <div class="alert alert-success col-log-12" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">name</th>
                            <th scope="col">price</th>
                            <th scope="col">category</th>
                            <th scope="col">description</th>
                            <th scope="col">image</th>
                            <!-- <th scope="col">Actions</th> -->
                        </tr>
                        
                        @foreach ($menus as $menu)
                        <tr>
                            <td>{{ $menus->name }}</td>
                            <td>{{ $menus->price }}</td>
                            <td>{{ $menus->category }}</td>
                            <td>{{ $menus->description }}</td>
                            <td><img src="{{ $menus->image }}" alt="" width="100px"></td>
                            <!-- <td>
                                <a type="detail/{{$siswa->nis}}" type="button" class="btn btn-primary">Detail</a>
                                <a type="edit/{{$siswa->nis}}" type="button" class="btn btn-success">Edit</a>
                                <form action="/siswa/delete/{{$siswa->nis}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('apakah anda yakin ?')">Delete</button>
                                </form>
                            </td> -->
                        </tr>                      
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>
    </div>

@endsection