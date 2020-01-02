<div id='notice-div' class="position-fixed" style="top:80px; right: 15px; width: 180px; z-index: 99;">
    <div class="{{ flash()->class }} font-weight-bold notice-alert" style="padding:1rem 2rem;">
        @if (flash()->message)
        {{ flash()->message }}
        @endif
    </div>
</div>
