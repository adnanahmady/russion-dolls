@cache($card)
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ $card->title }}</h2>
        </div>
    </div>
    <div class="card-body">
        <ul class="list-group">
            @foreach($card->notes as $note)
                @include('cards/_note')
            @endforeach
        </ul>
    </div>
</div>
@endcache
