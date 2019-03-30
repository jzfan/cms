<nav class="nav flex-column nav-pills" id='menu-nav'>
    <a class="nav-link" href="/admin">首页</a>
    <a class="nav-link" href="/admin/users">用户</a>
</nav>
@push('js')
<script>
// toggleMenuNav()

function toggleMenuNav() {
    $('#menu-nav > .nav-link').removeClass('active')
    $(`[data-link="${NAV}"]`).addClass('active')
}

</script>
@endpush
