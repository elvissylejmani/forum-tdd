<div class="card my-2">
<div class="panel panel-default">
<div class="card-header">
    <a href="#">{{$repy->owner->name}}</a>  {{$repy->created_at->diffForHumans()}}...</div>
</div>
<article>    
    <div class="card-body">{{$repy->body}}</div>
</article>
</div>