<li class="menu-header">Dashboard</li>
<li class="{{ (Request::url() === route('seller')) ? 'active' : '' }}"><a class="nav-link"
        href="{{ route('seller') }}"><i class="fas fa-fire"></i>
        <span>Dashboard</span></a></li>
<li class="menu-header">Manage Item</li>
<li class="{{ (Request::url() === route('seller.Item')) ? 'active' : '' }}"><a class="nav-link"
        href="{{ route('seller.Item') }}"><i class="fas fa-fire"></i>
        <span>Manage Item</span></a></li>
<li class="{{ (Request::url() === route('seller.shop')) ? 'active' : '' }}"><a class="nav-link"
        href="{{ route('seller.shop') }}"><i class="fas fa-fire"></i>
        <span>Shop</span></a></li>
<li class="menu-header">Info</li>
<li class="menu-header">Manage Item</li>
<li class="{{ (Request::url() === route('seller.list.order')) ? 'active' : '' }}"><a class="nav-link"
        href="{{ route('seller.list.order') }}"><i class="fas fa-fire"></i>
        <span>List Order</span></a></li>
<li class="{{ (Request::url() === route('seller.balance')) ? 'active' : '' }}"><a class="nav-link"
        href="{{ route('seller.balance') }}"><i class="fas fa-fire"></i>
        <span>Balance</span></a></li>