<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
          <img src="{{asset('assets/img/logo-small.png')}}">
          </div>
        </a>
        <a href="{{url('/admin')}}" class="simple-text logo-normal" style="font-weight: bold; color: #ffff;">
          Admin
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="sidemenu" id="dashboard">
            <a href="/admin/home">
              <i class="ti-dashboard"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @hasanyrole('SAdmin|Pemdes')
          <li class="sidemenu" id="berita">
            <a href="/admin/berita">
              <i class="nc-icon nc-paper"></i>
              <p>Berita</p>
            </a>
          </li>
          <li class="sidemenu" id="pelayanan">
            <a href="/admin/pelayanan">
              <i class="ti-headphone-alt"></i>
              <p>Pelayanan</p>
            </a>
          </li>
          <li class="sidemenu" id="aspirasi">
            <a href="/admin/aspirasi">
              <i class="ti-comment-alt"></i>
              <p>Aspirasi</p>
            </a>
          </li>
          <li class="sidemenu" id="profil">
            <a href="/admin/profil">
              <i class="nc-icon nc-bank"></i>
              <p>Profil Desa</p>
            </a>
          </li>
          @endhasanyrole
          @hasanyrole('SAdmin|Bumdes')
          <li class="sidemenu" id="usaha">
            <a href="/admin/usaha">
              <i class="ti-home"></i>
              <p>Unit Usaha</p>
            </a>
          </li>
          <li class="sidemenu" id="kategori_produk">
            <a href="/admin/kategori_produk">
              <i class="ti-list"></i>
              <p>Kategori Produk</p>
            </a>
          </li>
          {{-- <li class="sidemenu" id="produk">
            <a href="/admin/produk">
              <i class="ti-shopping-cart "></i>
              <p>Produk</p>
            </a>
          </li> --}}
          @endhasanyrole
          @hasrole('SAdmin')
          <hr>
          <li class="sidemenu" id="roles">
            <a href="/admin/roles">
              <i class="nc-icon nc-badge"></i>
              <p>Roles</p>
            </a>
          </li>
          <li class="sidemenu" id="user">
            <a href="/admin/user">
              <i class="nc-icon nc-single-02"></i>
              <p>User</p>
            </a>
          </li>
          @endhasrole
        </ul>
      </div>
    </div>
    <div class="main-panel">