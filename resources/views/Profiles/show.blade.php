@extends('layouts.app')
@section('content')
<div class="container">
<div class="page-header">
    <h1>
        {{ $ProfileUser->name}}
        <small>Since {{$ProfileUser->created_at->diffForHumans()}} </small>
    </h1>
</div>
@foreach ($threads as $thread)
    
<div class="card mb-4">
    <div class="card-header">
        <div class="level">
        <span class="flex">
            <a href="#">{{$thread->creator->name}}</a> posted:
            {{$thread->title}}
        </span>    
        <span> {{$thread->created_at->diffForHumans()}}</span>
        </div> 
        </div>

    <div class="card-body">
        
                <article>
               
                <div class="body">{{$thread->body}}</div>
                </article>
    </div>
</div>
@endforeach
{{$threads->links()}}
</div>
@endsection