@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> 
                    <a href="#">{{$thread->creator->name}}</a> posted:
                    <h1>{{$thread->title}}</h1></div>

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

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h1>Replies</h1></div>

                <div class="card-body">
              
                    @foreach ($thread->replies as $repy)
                        
                    @include('threads.reply')
                  
                    @endforeach
                </div>
            </div>

            @auth
                
            <div class="row">
                <div class="col-12 col-md-offset-2 mt-2">
                <form action="{{ $thread->path() . '/replies'}}">
                    <div class="form-group">
                        <textarea name="body" id="body" rows="5" class="form-control" placeholder="have something to say?"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
                </div>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection
