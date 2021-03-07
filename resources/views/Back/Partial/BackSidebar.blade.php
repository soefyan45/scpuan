<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="">@yield('siteName')</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">BS</a>
        </div>
        <ul class="sidebar-menu">
            @hasrole('admin')
                @include('Back.Partial.AdminMenu')
            @endrole
            @hasrole('seller')
                @include('Back.Partial.SellerMenu')
            @endrole
        </ul>
    </aside>
</div>