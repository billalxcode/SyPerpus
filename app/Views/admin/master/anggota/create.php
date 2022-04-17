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
                        <?php foreach ($breadcrumbs as $breadcrumb) : ?>
                            <?php if ($breadcrumb['active']) : ?>
                                <li class="breadcrumb-item active" aria-current="page"><?= $breadcrumb['name'] ?></li>
                            <?php else : ?>
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
                Tambah data
            </div>
            <div class="card-body">
                <form action="<?= current_url() ?>" method="post">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Username</label>
                            </div>
                            <div class="col-lg-12 mb-3 form-group">
                                <input type="text" id="username" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="col-md-4">
                                <label>Nama lengkap</label>
                            </div>
                            <div class="col-lg-12 mb-3 form-group">
                                <input type="text" id="name" class="form-control" name="name" placeholder="Nama lengkap">
                            </div>
                            <div class="col-md-4">
                                <label>Email</label>
                            </div>
                            <div class="col-lg-12 mb-3 form-group">
                                <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="col-md-4">
                                <label>Alamat</label>
                            </div>
                            <div class="col-lg-12 mb-3 form-group">
                                <input type="text" id="address" class="form-control" name="address" placeholder="Alamat lengkap">
                            </div>
                            <div class="col-md-4">
                                <label>Kelamin</label>
                            </div>
                            <div class="col-lg-12 mb-3 form-group">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Tidak diketahui</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Password</label>
                            </div>
                            <div class="col-lg-12 mb-3 form-group">
                                <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>