<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">



        @if ( $role == 'super admin' )
            <li class="nav-item">
                <a href="{{ route('organization.index') }}"
                    class="nav-link {{ $route == 'organization' ? 'active' : 'collapsed' }}"
                    data-bs-target="#components-nav">
                    <i class="bi bi-menu-button-wide"></i><span>Organization</span>
                </a>
            </li><!-- End Components Nav -->
        @else
            <li class="nav-item">
                <a href="{{ route('category.index') }}"
                    class="nav-link {{ $route == 'category' ? 'active' : 'collapsed' }}" data-bs-target="#forms-nav">
                    <i class="bi bi-journal-text"></i><span>Category</span>
                </a>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a href="{{ route('campaign.index') }}"
                    class="nav-link {{ $route == 'campaign' ? 'active' : 'collapsed' }}" data-bs-target="#forms-nav">
                    <i class="bi bi-journal-text"></i><span>Campaign</span>
                </a>
            </li><!-- End Forms Nav -->
        @endif


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('logout') }}">
                <i class="bi bi-person"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Profile Page Nav -->





    </ul>

</aside>

<!-- End Sidebar-->
