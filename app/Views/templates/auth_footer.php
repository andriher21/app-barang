    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/js/sb-admin-2.min.js"></script>
    <?php
        if (isset($content_scripts)) {
            foreach ($content_scripts as $path) :

                $path = preg_match('/http/', $path) ? $path : base_url() . $path;
                echo '<script src="' . $path . '"></script>';

            endforeach;
}
?>
    </body>

    </html>