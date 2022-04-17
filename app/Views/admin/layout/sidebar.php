<?php
function isActive($path) {
    $urlPath = current_url(true)->getPath();
    if ($path == $urlPath) {
        return "active";
    } else {
        return "";
    }
}

function inActive($path, $index) {
    $urlPath = current_url(true)->getSegments();
    try {
        $segment = $urlPath[$index];
        if ($path == $segment) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $ext) {
        return false;
    }
}
?>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?= base_url('syperpus.billalxcode.my.id') ?>">
                        SyPerpus
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item <?= isActive('/admin') ?>">
                    <a href="<?= base_url('admin') ?>" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item <?php if (inActive('master', 1) != false) { echo 'active'; } ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="submenu <?php if (inActive('master', 1) != false && (inActive('anggota', 2) == true || inActive('petugas', 2) || inActive('buku', 2) || inActive("kategori", 2) || inActive("tamu", 2))) { echo 'active'; } ?>">
                        <li class="submenu-item <?php if (inActive('anggota', 2) && (inActive('create', 3) || inActive('update', 3))) { echo 'active'; } ?>">
                            <a href="<?= base_url('admin/master/anggota') ?>">Anggota</a>
                        </li>
                        <li class="submenu-item <?php if (inActive('petugas', 2) && (inActive('create', 3) || inActive('update', 3))) { echo 'active'; } ?>">
                            <a href="<?= base_url('admin/master/petugas') ?>">Petugas</a>
                        </li>
                        <li class="submenu-item <?= isActive('/admin/master/buku') ?>">
                            <a href="<?= base_url('admin/master/buku') ?>">Buku</a>
                        </li>
                        <li class="submenu-item <?= isActive('/admin/master/kategori') ?>">
                            <a href="<?= base_url('admin/master/kategori') ?>">Kategori</a>
                        </li>
                        <li class="submenu-item <?= isActive('/admin/master/petugas/tamu') ?>">
                            <a href="<?= base_url('admin/master/tamu') ?>">Tamu</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Data</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="<?= base_url('admin/pinjaman') ?>">Pinjaman</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url('admin/pengembalian') ?>">Pengembalian</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url('admin/buku') ?>">Buku</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url('admin/rak') ?>">Rak</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url('admin/kategori') ?>">Kategori</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  ">
                    <a href="<?= base_url('admin/settings') ?>" class='sidebar-link'>
                        <i class="fas fa-cog"></i>
                        <span>Pengaturan</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="<?= base_url('logout') ?>" class='sidebar-link'>
                        <i class="fa fa-arrow-right"></i>
                        <span>Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>