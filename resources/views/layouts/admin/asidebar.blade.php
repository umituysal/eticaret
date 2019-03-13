<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{url('/')}}/assets/admin/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
           
            <div class="info">
              <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
            
          </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{url('/')}}/admin" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                           Ürünler
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/')}}/admin/urunler" class="nav-link active">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Ürünler Listesi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/')}}/admin/kategoriler" class="nav-link active">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Kategori Listesi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-open">
                        <a href="{{url('/')}}/admin" class="nav-link active">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                               Siparişler
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/')}}/admin/siparis_yeni" class="nav-link active">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Yeni Siparişler</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/')}}/admin/siparisler/Onaylandı" class="nav-link active">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Onaylı Siparişler</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                    <a href="{{url('/')}}/admin/siparisler/Kargoda" class="nav-link active">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Kargoda Olan Siparişler</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                        <a href="{{url('/')}}/admin/siparisler/Tamamlandı" class="nav-link active">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Tamamlanan Siparişler</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/')}}/admin/siparisler/Iptal" class="nav-link active">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>İptal Olan Siparişler</p>
                                        </a>
                                    </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/')}}/admin/kullanicilar" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Kullanıcılar
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="{{url('/')}}/admin/mesajlar" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                           Mesajlar
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/')}}/admin/mesajlar/Okunmadı" class="nav-link active">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Mesajlar Listesi Okunmayanlar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/')}}/admin/mesajlar/Okundu" class="nav-link active">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Mesajlar Listesi Okunanlar </p>
                            </a>
                        </li>
                    </ul>
                </li>
               
                <li class="nav-item">
                    <a href="{{url('/')}}/admin/settings" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Ayarlar
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/')}}/admin/logout" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                           Çıkış
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>