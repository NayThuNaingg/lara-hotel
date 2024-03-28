<div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li
                class="sidebar-item {{ request()->is('admin-backend/index') ? 'active' : '' }} ">
                <a href="{{route('index')}}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ request()->is('admin-backend/hotelSetting') ? 'active' : '' }} ">
                <a href="form-layout.html" class='sidebar-link'>
                <i class="fa-solid fa-gear"></i>
                    <span>Hotel Setting</span>
                </a>
                
            </li>

            <li class="sidebar-title">Forms &amp; Tables</li>
            
            <li
            class="sidebar-item has-sub {{ request()->is('admin-backend/view/*') ? 'active' : '' }}">
                <a href="#" class='sidebar-link'>
                <i class="fa-solid fa-street-view"></i>
                    <span>View</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="{{route('formView')}}" class="submenu-link">View</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="{{route('listingView')}}" class="submenu-link">Listing</a>
                        
                    </li>
                </ul>
                
            </li>

            <li
                class="sidebar-item  has-sub  {{ request()->is('admin-backend/bed/*') ? 'active' : '' }}">
                <a href="#" class='sidebar-link'>
                <i class="fa-solid fa-bed-pulse"></i>
                    <span>Bed</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="{{route('formBed')}}" class="submenu-link">Bed</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="{{route('listingBed')}}" class="submenu-link">Listing</a>
                        
                    </li>
                </ul>
                
            </li>

            <li
                class="sidebar-item  has-sub {{ request()->is('admin-backend/amenity/*') ? 'active' : '' }}">
                <a href="#" class='sidebar-link'>
                <i class="fa-brands fa-intercom"></i>
                    <span>Amenity</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="{{route('formAmenity')}}" class="submenu-link">Amenity</a>
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="{{ route('listingAmenity') }}" class="submenu-link">Listing</a>
                        
                    </li>
                </ul>
                
            </li>

            <li
                class="sidebar-item  has-sub {{ request()->is('admin-backend/special-feature/*') ? 'active' : '' }}">
                <a href="#" class='sidebar-link'>
                <i class="fa-solid fa-ship"></i>
                    <span>Special Feature</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="{{route('formSpecialFeature')}}" class="submenu-link">SpecialFeature</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="{{ route('listingSpecialFeature') }}" class="submenu-link">Listing</a>
                        
                    </li>
                </ul>
                
            </li>

            <li
                class="sidebar-item  has-sub {{ request()->is('admin-backend/room/*') ? 'active' : '' }}">
                <a href="#" class='sidebar-link'>
                <i class="fa-solid fa-hotel"></i>
                    <span>ROOM</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="{{route('formRoom')}}" class="submenu-link">Room</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="{{ route('listingRoom') }}" class="submenu-link">Listing</a>
                        
                    </li>
                </ul>
                
            </li>

            <li class="sidebar-title">Extra UI</li>

            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-bar-chart-fill"></i>
                    <span>Charts</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="ui-chart-chartjs.html" class="submenu-link">ChartJS</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="ui-chart-apexcharts.html" class="submenu-link">Apexcharts</a>
                        
                    </li>
                    
                </ul>
                

            </li>

            <li
                class="sidebar-item  ">
                <a href="ui-file-uploader.html" class='sidebar-link'>
                    <i class="bi bi-cloud-arrow-up-fill"></i>
                    <span>File Uploader</span>
                </a>
                

            </li>

            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-map-fill"></i>
                    <span>Maps</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="ui-map-google-map.html" class="submenu-link">Google Map</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="ui-map-jsvectormap.html" class="submenu-link">JS Vector Map</a>
                        
                    </li>
                    
                </ul>

            </li>
            
        </ul>
    </div>
</div>
</div>
</div>
    <div id="main">
    <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
    <i class="bi bi-justify fs-3"></i>
    </a>
</header>