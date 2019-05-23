<div id='notice-div' class="position-fixed" style="top:15px; right: 15px; z-index: 99; display: none;">
    <div class="alert alert-success font-weight-bold notice-alert">
        @if (session()->has('notice'))
        {{ session()->get('notice') }}
        @endif
    </div>
</div>
