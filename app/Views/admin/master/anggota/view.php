<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $page ?></h3>
                <p class="text-subtitle text-muted"><?= $desc ?></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                        <?php foreach ($breadcrumbs as $breadcrumb): ?>
                            <?php if ($breadcrumb['active']): ?>
                                <li class="breadcrumb-item active" aria-current="page"><?= $breadcrumb['name'] ?></li>
                            <?php else: ?>
                                <li class="breadcrumb-item"><a href="<?= $breadcrumb['link'] ?>"><?= $breadcrumb['name'] ?></a></li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data anggota
                <div class="float-end">
                    <a href="<?= base_url('admin/master/anggota/create') ?>"><button class="btn btn-primary btn-sm">Tambah data</button></a>
                    <a href="<?= base_url('admin/master/anggota/import') ?>"><button class="btn btn-primary btn-sm">Import data</button></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>Nama lengkap</th>
                            <th>Email</th>
                            <th>Kelamin</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user['name'] ?></td>
                                <td><?= ($user['email'] == "" ? "Tidak diketahui" : $user['email']) ?></td>
                                <td>
                                    <?php if (strtolower($user['gender']) == "l"): ?>
                                        Laki-laki
                                    <?php elseif (strtolower($user['gender']) == "p"): ?>
                                        Perempuan
                                    <?php else: ?>
                                        Tidak diketahui
                                    <?php endif ?>
                                </td>
                                <td><?= ($user['address'] == "" ? "Tidak diketahui" : $user['address']) ?></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="<?= base_url('admin/master/anggota/update?id=' . $user['id'] . '&redirect_url=' . base_url('admin/master/anggota')) ?>"><button class="btn btn-primary btn-sm d-inline mx-1">Update</button></a>
                                        <form action="<?= base_url('admin/master/anggota/delete') ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                            <input type="hidden" name="redirect_url" value="<?= current_url() ?>">
                                            <button class="btn btn-danger btn-sm d-inline mx-1">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<script>
    let jquery_datatable = $("#table").DataTable()
</script>