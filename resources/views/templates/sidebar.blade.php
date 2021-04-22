
<div class="container-fluid page-body-wrapper">
   
   <nav class="sidebar sidebar-offcanvas" id="sidebar">
       <ul class="nav">
           <li class="nav-item">
               <a class="nav-link"  href="{{ URL::to('/dashboard') }}">
                   {{-- <i class="ti-home menu-icon"></i> --}}
                   <span class="menu-title">Dashboard</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link"  href="{{ URL::to('/invoice')}}">
                   <span class="menu-title">Sale</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link"  href="{{ URL::to('/purchas')}}">
                   <span class="menu-title">Purchase</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="{{ URL::to('/memo')}}">
                   <span class="menu-title">Memo</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link"  href="{{ URL::to('/payble')}}">
                   <span class="menu-title">Payble</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="{{ URL::to('/reciveable')}}">
                   {{-- <i class="ti-eraser menu-icon"></i> --}}
                   <span class="menu-title">Reciveable</span>
               </a>
           </li>
          
           <li class="nav-item">
               <a class="nav-link" href="{{ URL::to('/customer')}}">
                   <span class="menu-title">Customer</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="{{ URL::to('/broker')}}">
                   <span class="menu-title">Broker</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="{{ URL::to('/saler')}}">
                   <span class="menu-title">Saler</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="{{ URL::to('/purchaser')}}">
                   <span class="menu-title">Purchaser</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link"  href="{{ URL::to('/gia')}}">
                   <span class="menu-title">Stock List For GIA</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link"  href="{{ URL::to('/nogia')}}">
                   <span class="menu-title">Stock List For No GIA</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link"  href="{{ URL::to('/users')}}">
                   <span class="menu-title">System Users</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link"  href="{{ URL::to('/branch')}}">
                   <span class="menu-title">Branch</span>
               </a>
           </li>
            <li class="nav-item">
                <a class="nav-link"  href="{{ URL::to('/stock-transfer')}}">
                   <span class="menu-title">Stock Transfer</span>
                </a>
            </li>
       </ul>
   </nav>
   <div class="main-panel">
       <div class="content-wrapper">
           @yield('content')
       </div>
   </div>
</div>
