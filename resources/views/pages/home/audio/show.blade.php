@extends('layouts.home')


@section('home-section')
    <br>
    <br>
    <br>
    <div class="container" style="background-color: lightgray">
        <br>
        <h2 class="text-center">Details</h2>
        <br>
        <br>
        <br>

        <div class="container text-center">
            <audio controls loop src="{{ asset('assets/audio/' . $audio[0]->file) }}"></audio>
        </div>

        <center>
            <div class="container mb-5">
                <table class="table table-bordered table-hover my-5 right">
                    <tbody class="mb-5">
                        <tr>
                            <th>Name</th>
                            <td>{{ $audio[0]->name }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $audio[0]->description }}</td>
                        </tr>
                        <tr>
                            <th>Artist</th>
                            <td>{{ $audio[0]->artist }}</td>
                        </tr>
                        <tr>
                            <th>Album</th>
                            <td>{{ $audio[0]->album }}</td>
                        </tr>
                        <tr>
                            <th>Post Date</th>
                            <td>{{ $audio[0]->post_date }}</td>
                        </tr>
                        <tr>
                            <th>Genre</th>
                            <td>{{ $audio[0]->genre }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
        </center>
        <form action="{{ url('/addReview') }}" method="POST">
            @csrf
            <input type="hidden" name="postid" value="{{ $audio[0]->id }}">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Comment on the Post</label>
                <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Comment</button>
        </form>
        <br><br>

        <div class="container">
            <h5>Comments</h5>
            @foreach ($comments as $comment)
            <p>{{ $comment->name }} Commented: "{{ $comment->comments }}" at {{ $comment->created_at }}</p>
            @endforeach
        </div>

    </div>
    <br><br>
@endsection
