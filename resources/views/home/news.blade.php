@extends('home.main')
@section('content')
<div class="bg-secondary">
    <div class="container py-5">
        <div class="row">
            <div class="card-group">
                <div class="card mx-2">
                    <img class="card-img-top" src="/img/stub.svg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card mx-2">
                    <img class="card-img-top" src="/img/stub.svg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card mx-2">
                    <img class="card-img-top" src="/img/stub.svg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-4">
    <div class="row">
        <div class="col mb-4">
            <div class="media">
                <img class="align-self-start mr-3" src="/img/stub.svg" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0">News One</h5>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, .</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="media">
                <img class="align-self-start mr-3 order-lg-1 order-md-2" src="/img/stub.svg" alt="Generic placeholder image">
                <div class="media-body  order-lg-2 order-md-1">
                    <h5 class="mt-0">News Two</h5>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus vi.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
