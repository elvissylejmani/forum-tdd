<div class="card mb-4">
    <div class="card-header">
        <div class="level">
            <span class="flex">
                {{$ProfileUser->name}} created a thread
        </span>    
        {{-- <span> {{$activity->created_at->diffForHumans()}}</span> --}}
        </div> 
        </div>

    <div class="card-body">
              {{$activity->subject->body}}
    </div>
</div>