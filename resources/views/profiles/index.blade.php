@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 p-5">
            <img src="https://instagram.fhan3-3.fna.fbcdn.net/vp/54aa1263c67acba89ffd5521027af50f/5E3CB4FA/t51.2885-19/s150x150/52386854_1940179789444434_3707715026048516096_n.jpg?_nc_ht=instagram.fhan3-3.fna.fbcdn.net" class="rounded-circle">
        </div>
        <div class="col-8 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="#">Add New Post</a>
            </div>
            <div class="d-flex"> 
                <div class="pr-5"><strong>143</strong> posts</div>
                <div class="pr-5"><strong>291</strong> followers</div>
                <div class="pr-5"><strong>1</strong> following</div>
            </div>
            <div><strong>{{ $user->profile->title }}</strong></div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-4"><img src="/svg/cat1.jpg" alt="" class="w-100"></div>
        <div class="col-4"><img src="/svg/cat2.jpg" alt="" class="w-100"></div>
        <div class="col-4"><img src="/svg/cat3.jpg" alt="" class="w-100"></div>
    </div>
</div>
@endsection
