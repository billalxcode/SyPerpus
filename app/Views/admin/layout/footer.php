
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Version 1.0.0 DEV</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="<?= base_url('vendors/fontawesome/js/all.min.js') ?>"></script>
    <script src="<?= base_url('vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

    <script src="<?= base_url('js/mazer.js') ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <?php if (session()->getFlashdata('error')): ?>
        <script>
            toastr.error('<?= session()->getFlashdata('error') ?>', "ERROR")
        </script>
    <?php elseif (session()->getFlashdata('errors')): ?>
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <script>
                toastr.error('<?= $error ?>', "ERROR")
            </script>
        <?php endforeach ?>
    <?php elseif (session()->getFlashdata('success')): ?>
        <script>
            toastr.success('<?= session()->getFlashdata('success') ?>', "INFO")
        </script>
    <?php endif ?>
</body>
</html>