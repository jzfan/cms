@extends('wx.main')
@slot('title')
        Forbidden
@endslot
@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="card-title text-center">
            {{ $article->title }}
        </h3>
        
        <h6 class="card-subtitle mb-2 text-muted text-right">{{ $article->created_at->diffForHumans() }}</h6>
        <div class="card-text mt-4">
            <?php
    $Parsedown = new Parsedown();
    echo $Parsedown->text($article->content); 
    ?>
    </div>
    </div>
</div>
@endsection