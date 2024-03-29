<reply inline-template>


<div id="reply-{{$reply->id}}" class="card my-2">
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
<div class="" v-if="editing">
    <textarea name="" id="" cols="30" rows="10"></textarea>
</div>
<div class="card-body" v-else>{{$reply->body}}</div>
@can('update', $reply)
<div class="card-footer level">
    
    <button class="btn btn-xs mr-1" @click ="editing = !editing">Edit</button>
    <form method="POST" action="/replies/{{$reply->id}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-xs">
            Delete
        </button>
    </form>
</div>
@endcan
</div>
</reply> 