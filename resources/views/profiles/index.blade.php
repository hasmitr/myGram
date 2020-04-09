@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" alt="" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->username }}</div>
                    @cannot('update', $user->profile)
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @endcan
                    @can('update', $user->profile)
                        <div>
                            <btn class="btn bg-transparentt ml-4 border border-dark">
                                <a href="/profile/{{ $user->id }}/edit" class="h6 text-dark font-weight-bold text-decoration-none">Edit Profile</a>
                            </btn>
                        </div>
                    @endcan
                </div>

                @can('update', $user->profile)
                    <a href="/p/create">Add New Post</a>
                @endcan
            
            </div>

            <div class="d-flex">
                <div class="pr-4"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-4"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-4"><strong>{{ $followingCount}}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url ?? ""}}</a></div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" alt="" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
