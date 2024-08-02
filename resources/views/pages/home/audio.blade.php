@extends('layouts.home')

@section('home-section')
<!-- Download -->
<div id="screenshot" class="Lastestnews">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Latest Audios</h2>
                    <span>It is a long established fact that a reader will be distracted by the readable <br>content of a page when looking at its layout. The point of using Lorem </span>
                </div>
            </div>
        </div>

        <div class="row">
        @foreach ($audios as $audio)
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 my-3">
                <div class="news-box col-sm">
                    <figure><img src="{{ asset('assets/home/images/1.jpg') }}" alt="img" /></figure>
                    <audio controls class="ml-2 mt-3" src="{{ asset('assets/audio/' . $audio->file) }}"></audio>
                    <h3><a href="{{ route('audio.show', ['id' => $audio->id]) }}">{{ $audio->name }}</a></h3>
                    <p>{{ $audio->description }}</p>
                </div>
            </div>
            @endforeach
        </div>


    </div>
</div>
<!-- end Download -->

@endsection
