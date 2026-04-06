<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="align-middle">#Admin Panel</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Modüller
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Ana Sayfa</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('pages') }}">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Sayfa
                        Yönetimi</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('activity') }}">
                    <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Etkinlik
                        Yönetimi</span>
                </a>
            </li>
            <li class="sidebar-item ">
                <a class="sidebar-link" href="{{ route('notice') }}">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Duyuru
                        Yönetimi</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link collapsed d-flex align-items-center justify-content-between"
                    href="#corporateSubmenu" data-bs-toggle="collapse" aria-expanded="false">
                    <span>
                        <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Kurumsal Yapı</span>
                    </span>
                    <i class="align-middle" data-feather="chevron-down"
                        style="width:16px;height:16px;transition:transform .2s;"></i>
                </a>
                <ul id="corporateSubmenu" class="sidebar-dropdown list-unstyled collapse" style="padding-left: 20px;">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('staff-group') }}">
                            <i class="align-middle" data-feather="folder"></i> <span class="align-middle">Personel
                                Grupları</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('staff') }}">
                            <i class="align-middle" data-feather="users"></i> <span
                                class="align-middle">Personeller</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item ">
                <a class="sidebar-link" href="{{ route('suggestion') }}">
                    <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Talep & Öneri
                        Formu</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link collapsed d-flex align-items-center justify-content-between" href="#projectMenu"
                    data-bs-toggle="collapse" aria-expanded="false">
                    <span>
                        <i class="align-middle" data-feather="database"></i> <span class="align-middle">Proje
                            Yönetimi</span>
                    </span>
                    <i class="align-middle" data-feather="chevron-down"
                        style="width:16px;height:16px;transition:transform .2s;"></i>
                </a>
                <ul id="projectMenu" class="sidebar-dropdown list-unstyled collapse" style="padding-left: 20px;">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('project-category') }}">
                            <i class="align-middle" data-feather="folder"></i> <span class="align-middle">Proje
                                Kategorileri</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('project') }}">
                            <i class="align-middle" data-feather="briefcase"></i> <span
                                class="align-middle">Projelerimiz</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item ">
                <a class="sidebar-link" href="{{ route('condolence') }}">
                    <i class="align-middle" data-feather="feather"></i> <span class="align-middle">Taziye ve
                        Başsağlığı</span>
                </a>
            </li>
            <li class="sidebar-item ">
                <a class="sidebar-link" href="{{ route('news') }}">
                    <i class="align-middle" data-feather="type"></i> <span class="align-middle">Haber Yönetimi</span>
                </a>
            </li>
            <li class="sidebar-item ">
                <a class="sidebar-link" href="{{ route('photo') }}">
                    <i class="align-middle" data-feather="camera"></i> <span class="align-middle">Foto Galeri</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a class="sidebar-link" href="{{ route('message') }}">
                    <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Mesajlar</span>
                </a>
            </li>
            <li class="sidebar-item ">
                <a class="sidebar-link" href="{{ route('newsletter') }}">
                    <i class="align-middle" data-feather="at-sign"></i> <span class="align-middle">E-Bülten</span>
                </a>
            </li>

            @if (Sentinel::inRole('admin'))
                <li class="sidebar-header">
                    Site Yönetimi
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link" href="{{ route('settings') }}">
                        <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Site
                            Ayarları</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link" href="{{ route('mainmenu') }}">
                        <i class="align-middle" data-feather="menu"></i> <span class="align-middle">Menu
                            Ayarları</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link" href="{{ route('footermenu') }}">
                        <i class="align-middle" data-feather="arrow-down"></i> <span class="align-middle">Footer Menu
                            Ayarları</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link" href="{{ route('quickmenu') }}">
                        <i class="align-middle" data-feather="fast-forward"></i> <span class="align-middle">Hızlı
                            Menu Ayarları</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link" href="{{ route('limit') }}">
                        <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Limit
                            Ayarları</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link" href="{{ route('theme') }}">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Tema Renk
                            Ayarları</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link" href="{{ route('module') }}">
                        <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Anasayfa Modul
                            Ayarları</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link" href="{{ route('users') }}">
                        <i class="align-middle" data-feather="users"></i> <span class="align-middle">Yönetici
                            Ayarları</span>
                    </a>
                </li>
            @endif

    </div>
</nav>

<style>
    .sidebar-link[data-bs-toggle="collapse"]:not(.collapsed) .feather-chevron-down {
        transform: rotate(180deg);
    }
</style>
