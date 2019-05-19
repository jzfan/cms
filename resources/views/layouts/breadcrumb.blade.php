<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item"></li>
    </ol>
</nav>
@push('js')
<script>
$('.breadcrumb-item').removeClass('active')
if (nav === '/admin') {
    $('.breadcrumb-item:first').addClass('active').html(`Index`)
        .next().hide()
} else {
    $('.breadcrumb-item:first').html(`<a href='/admin'>Index</a>`)
        .next().html(getNavText()).addClass('active').show()
}

function getNavText() {
    return $(`nav > .nav-link[href='${nav}']`).html()
}

</script>
@endpush
