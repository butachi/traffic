<ul class="nav pull-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown">
            <span class="label label-danger pull-left">0</span>
            <i class="fa fa-bell fa-lg"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-right alerts-dropdown">
            <li class="dropdown-header">Orders</li>
            <li>
                <a href="" style="display: block; overflow: auto;">
                    <span class="label label-warning pull-right">1</span>Pending</a>
            </li>
            <li>
                <a href=""><span class="label label-success pull-right">1</span>Completed</a></li>
            <li><a href=""><span class="label label-danger pull-right">1</span>Returns</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Customers</li>
            <li><a href=""><span class="label label-success pull-right">1</span>Customers Online</a></li>
            <li><a href=""><span class="label label-danger pull-right">1</span>Pending Approval</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Products</li>
            <li><a href=""><span class="label label-danger pull-right">1</span>Out of stock</a></li>
            <li><a href=""><span class="label label-danger pull-right">1</span>Review</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Affiliates</li>
            <li><a href=""><span class="label label-danger pull-right">1</span>Pending approval</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-home fa-lg"></i></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li class="dropdown-header">Stores</li>
            <li><a href="" target="_blank">The Opencart demo store</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-life-ring fa-lg"></i></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li class="dropdown-header">Help</li>
            <li><a href="http://www.opencart.com" target="_blank">Home page</a></li>
            <li><a href="http://docs.opencart.com" target="_blank">Document</a></li>
            <li><a href="http://forum.opencart.com" target="_blank">Support</a></li>
        </ul>
    </li>
    <li>
        <a href="{{ URL::route('logout') }}">
            <span class="hidden-xs hidden-sm hidden-md">{{trans('core::core.general.sign out')}}</span> <i class="fa fa-sign-out fa-lg"></i>
        </a>
    </li>
</ul>
