<li class="menu-header">Dashboard</li>
<li class="{{ (Request::url() === route('admin')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin') }}"><i
            class="fas fa-fire"></i>
        <span>Dashboard</span></a>
</li>
<li class="menu-header">Manage Item</li>
<li class="{{ (Request::url() === route('admin.category')) ? 'active' : '' }}">
    <a href="{{ route('admin.category') }}" class="nav-link"><i class="fas fa-rocket"></i>
        <span>Category</span></a>
</li>
<li class="{{ (Request::url() === route('admin.itemtypes')) ? 'active' : '' }}">
    <a href="{{ route('admin.itemtypes') }}" class="nav-link"><i class="fas fa-rocket"></i> <span>Type Item</span></a>
</li>
<li class="{{ (Request::url() === route('admin.coloritem')) ? 'active' : '' }}">
    <a href="{{ route('admin.coloritem') }}" class="nav-link"><i class="fas fa-rocket"></i> <span>Color Item</span></a>
</li>
<li class="menu-header">Seller</li>
<li class="{{ (Request::url() === route('admin.sellershop')) ? 'active' : '' }}">
    <a href="{{ route('admin.sellershop') }}" class="nav-link"><i class="fas fa-rocket"></i> <span>List
            Seller</span></a>
</li>
<li class="menu-header">Payment</li>
<li class="{{ (Request::url() === route('admin.payment.Confirm')) ? 'active' : '' }}">
    <a href="{{ route('admin.payment.Confirm') }}" class="nav-link"><i class="fas fa-rocket"></i> <span>Payment
            Confirm</span></a>
</li>
<li class="{{ (Request::url() === route('admin.proses.withdraw.confirm')) ? 'active' : '' }}">
    <a href="{{ route('admin.proses.withdraw.confirm') }}" class="nav-link"><i class="fas fa-rocket"></i> <span>Withdraw
            Request</span></a>
</li>

{{--
<li class="menu-header">Article</li>
<li class="dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-rocket"></i> <span>Post
            Article</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="#">Posting</a></li>
        <li><a class="nav-link" href="#">Tag</a></li>
        <li><a class="nav-link" href="">Draft</a></li>
        <li><a class="nav-link" href="">Archive</a></li>
    </ul>
</li>
--}}