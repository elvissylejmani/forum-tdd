@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> 
                    <a href="#">{{$thread->creator->name}}</a> posted:
                    {{$thread->title}}</div>

                <div class="card-body">
                    
                            <article>
                           
                            <div class="body">{{$thread->body}}</div>
                            </article>
                </div>
            </div>
              
            @foreach ($replies as $repy)
                        
            @include('threads.reply')
          
            @endforeach
            {{ $replies->links() }}
            @auth
            <form action="{{ $thread->path() . '/replies'}}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="body" id="body" rows="5" class="form-control" placeholder="have something to say?"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post</button>
            </form>
            </div>
        @endauth

        @guest
                        <div class="text-center">
                    <p>Please <a href="{{ route('login')}}"> sign in </a> to participate in this discussion.</p>
                </div>
        @endguest
        <div class="col-md-4">
            <div class="card">
               

                <div class="card-body">
                    <p>
                        this thread was published {{$thread->created_at->diffForHumans()}} 
                        by <a href="#"> {{$thread->creator->name}} </a> currently has {{$thread->replies_count}} {{ $str}}.
                    </p>                    
                           
                </div>
            </div>
        </div>
    </div>

    </div>


              
      
@endsection
