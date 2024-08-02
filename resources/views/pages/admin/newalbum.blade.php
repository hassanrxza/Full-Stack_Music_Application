@extends('layouts.admin')


@section('admin-section')


<h1 class="text-center mt-5">Manage Album</h1>

<div class="col-12">
    <div class="container">
        <button type="button" class="btn btn-primary mt-5 mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add album</button>
        <br><br><br>
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">All Albums</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Release Date</th>
                            <th scope="col">Artist</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($albums as $album)

                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $album->name }}</td>
                            <td>{{ $album->description }}</td>
                            <td>{{ $album->release_date }}</td>
                            <td>{{ $album->artist}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Album</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/addAlbum') }}" method="post">
                @csrf

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Album Name</label>
                        <input type="text" class="form-control" name="albumName">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Album Description</label>
                        <input type="text" class="form-control" name="albumDescription">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Release Date</label>
                        <input type="date" class="form-control" name="albumDate">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Artist</label>
                        <select name="albumArtist" id="" class="form-control">
                            <option value="" selected disabled> --- Select Artist ---</option>
                            @foreach ($artists as $artist)
                            <option value="{{ $artist->id }}">{{ $artist->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
        </div>
        </form>
    </div>
</div>


@endsection
