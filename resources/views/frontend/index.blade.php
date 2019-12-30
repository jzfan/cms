@extends('frontend.main')

@section('content')
@include('frontend.header')

  @include('frontend.home')
  @include('frontend.about')
  @include('frontend.services')
  @include('frontend.process')
  @include('frontend.projects')
  @include('frontend.work')
  @include('frontend.offers')
  @include('frontend.news')
  @include('frontend.clients')
  @include('frontend.footer')

    <a class="js-go-to u-go-to-v1" href="#" data-type="fixed" data-position='{
           "bottom": 15,
           "right": 15
         }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
      <i class="hs-icon hs-icon-arrow-top"></i>
    </a>
@endsection