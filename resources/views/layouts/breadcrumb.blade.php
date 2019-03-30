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
    $('.breadcrumb-item:first').addClass('active').html(`首页`)
        .next().hide()
} else {
    $('.breadcrumb-item:first').html(`<a href='/admin'>首页</a>`)
        .next().html(getNavText()).addClass('active').show()
}

function getNavText() {
    return $(`nav > .nav-link[href='${nav}']`).html()
}

</script>
@endpush
