<div class="card my-2">
<div class="panel panel-default">
<div class="card-header">

   <div class="level">

      <h5 class="flex">  <a href="#"> {{$reply->owner->name}}</a>  {{$reply->created_at->diffForHumans()}}... </h5>
   <div >
       <form method="POST" action="/replies/{{$reply}}/favorites">
        @csrf
           <button type="submit" class="btn btn-success">{{$reply->favorites()->count()}}</button>
       </form>
   </div>
</div>
</div>
</div>
<article>    
    <div class="card-body">{{$reply->body}}</div>
</article>
</div>