<nav class="nav flex-column nav-pills" id='menu-nav'>
    <a class="nav-link" href="/admin"><i class="iconfont icon-dashboard"></i>首页</a>
    <a class="nav-link" href="/admin/users"><i class="iconfont icon-user"></i>用户</a>
    <a class="nav-link" href="/admin/plugins"><i class="iconfont icon-wrench"></i>插件</a>
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
