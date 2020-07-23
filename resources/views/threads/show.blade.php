@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h1>{{$thread->title}}</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                            <article>
                           
                            <div class="body">{{$thread->body}}</div>
                            </article>
                            <hr>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h1>Replies</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($thread->replies as $repy)
                        
                    <div class="body">
                        <a href="#">{{$repy->owner->name}}</a>  {{$repy->created_at->diffForHumans()}}...</div>
                    <article>
                        
                        <div class="body">{{$repy->body}}</div>
                    </article>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
