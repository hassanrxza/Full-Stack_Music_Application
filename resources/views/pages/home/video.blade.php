@extends('layouts.home')

@section('home-section')
    <!-- Download -->
    <div id="screenshot" class="Lastestnews">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Latest Videos</h2>
                        <span>It is a long established fact that a reader will be distracted by the readable <br>content of
                            a page when looking at its layout. The point of using Lorem </span>
                    </div>
                </div>
            </div>

{{-- Cards --}}

<div class="row">
            @foreach ( $videos as $video )

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="card shadow">
                        <div class="embed-responsive embed-responsive-16by9">
                            <video controls loop muted class="embed-responsive-item" src="{{ asset('/assets/video/' . $video->file) }}" allowfullscreen></video>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="{{ route('video.show', ['id' => $video->id]) }}">{{ $video->name }}</a></h3>
                            <p class="card-text">{{ $video->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </div>
    </div>
    </div>

    <!-- end Download -->
@endsection
