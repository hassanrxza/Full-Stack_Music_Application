@extends('layouts.admin')

@section('admin-section')

<h1 class="text-center mt-5">Manage Posts</h1>

    <div class="col-12">
        <div class="container">
            <button type="button" class="btn btn-primary mt-5 mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add Post</button>
            <br><br><br>
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">All Posts</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">File</th>
                                <th scope="col">Date Posted</th>
                                <th scope="col">Album</th>
                                <th scope="col">Artist</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)

                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->file }}</td>
                                <td>{{ $post->post_date }}</td>
                                <td>{{ $post->album}}</td>
                                <td>{{ $post->artist }}</td>
                                <td>{{ $post->genre }}</td>
                                <td>{{ $post->category }}</td>
                                <td><a href="" id="{{ $post->id }}" class="editPost mx-3" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil-square"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    {{-- Add Modal --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Post Name</label>
                        <input type="text" class="form-control" name="postName">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Post Description</label>
                        <input type="text" class="form-control" name="postDescription">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Post Category</label>
                        <select name="postCat" id="" class="form-control">
                            <option value="" selected disabled> --- Select Category ---</option>
                            @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3" id="thumbnailInput" style="display: none;">
                        <label for="thumbnail" class="form-label">Post Thumbnail</label>
                        <input type="file" name="postThumbnail" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Post Album</label>
                        <select name="postAlbum" id="" class="form-control">
                            <option value="" selected disabled> --- Select Album ---</option>
                            @foreach ($albums as $album )
                            <option value="{{ $album->id }}">{{ $album->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Post Date</label>
                                <input type="date" class="form-control" name="postDate">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Post Artist</label>
                                <select name="postArtist" id="" class="form-control">
                                    <option value="" selected disabled> --- Select Artist ---</option>
                                    @foreach ($artists as $artist)
                                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Post Genre</label>
                            <select name="postGenre" id="" class="form-control">
                                <option value="" selected disabled> --- Select Genre ---</option>
                                @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->genre_type}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="categoryInput" class="form-label">Post link</label>
                            <input type="file" name="postLink" class="form-control">
                        </div>

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

{{-- Edit Modal --}}

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Post Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/posts/{id}') }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="editPostId" id="editPostId" value="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Post Name</label>
                        <input type="text" class="form-control" name="editPostName" id="editPostName">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Post Description</label>
                        <input type="text" class="form-control" name="editPostDescription" id="editPostDescription">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Post Category</label>
                        <select name="editPostCat" id="editPostCat" class="form-control">
                            <option value="" selected disabled> --- Select Category ---</option>
                            @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Post Album</label>
                        <select name="editPostAlbum" id="editPostAlbum" class="form-control">
                            <option value="" selected disabled> --- Select Album ---</option>
                            @foreach ($albums as $album )
                            <option value="{{ $album->id }}">{{ $album->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Post Date</label>
                                <input type="date" class="form-control" name="editPostDate" id="editPostDate">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Post Artist</label>
                                <select name="editPostArtist" id="editPostArtist" class="form-control">
                                    <option value="" selected disabled> --- Select Artist ---</option>
                                    @foreach ($artists as $artist)
                                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Post Genre</label>
                            <select name="editPostGenre" id="editPostGenre" class="form-control">
                                <option value="" selected disabled> --- Select Genre ---</option>
                                @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->genre_type}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="categoryInput" class="form-label">Post link</label>
                            <input type="file" name="editPostLink" class="form-control">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
        </div>
        </form>
    </div>
</div>

{{-- <script>
    $(document).ready(function () {

        function toggleThumbnailInput() {
            let category == $('#postCat').val();
            if (category === "audio") {
                $('#thumbnailInput').show();
            }
            else{
                $('#thumbnailInput').hide();
            }
        }

        toggleThumbnailInput();
    })
</script> --}}

<script>
    $(document).ready(function()
    {
        $.ajaxSetup({
        headers:
        {'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr('content') }
      });

      $('.editPost').on('click', function()
      {
        var postId = $(this).attr('id');
        // console.log(postId);

        $.ajax({
            'url': "posts/" + postId + "/edit" ,
            'type': 'GET',
            'success': function (data)
            {
                $.each(data, function (k, v)
                {
                    $('#editPostId').val(postId);
                    $('#editPostName').val(v["name"]);
                    $('#editPostDescription').val(v["description"]);
                    $('#editPostCat').val(v['cat_id']);
                    $('#editPostAlbum').val(v['album_id']);
                    $('#editPostGenre').val(v['genre_id']);
                    $('#editPostArtist').val(v['artist_id']);
                    $('#editPostDate').val(v['post_date']);
                })
            }
        })
      })

    })
</script>

@endsection
