<div class="card my-2">
<div class="panel panel-default">
<div class="card-header">

   <div class="level">

      <h5 class="flex">  <a href="{{route('profile', $reply->owner)}}"> {{$reply->owner->name}}</a>  {{$reply->created_at->diffForHumans()}}... </h5>
   <div >
       <form method="POST" action="/replies/{{$reply->id}}/favorites">
        @csrf
           <button type="submit" class="btn btn-success" @auth(){{$reply->isFavorited() ? 'disabled' : ''}} @endauth>{{$reply->favorites_count ?? 0}} Favorited</button>
       </form>
   </div>
</div>
</div>
</div>
<article>    
    <div class="card-body">{{$reply->body}}</div>
</article>
</div>