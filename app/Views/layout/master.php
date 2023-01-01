<!-- Haeder -->
<?= $this->include('layout/header') ?>
<!--/Haeder -->

<body>
    <div id="app">
        <?= $this->include('layout/sidebar')?>
        <div id="main">
        <?= $this->renderSection('content') ?>
        </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
  <!-- container-scroller -->

    <!-- Global Script -->
    <?= $this->include('layout/globalscript') ?>
    <!--/Global Script -->

    <!-- PageScript-->
    <?= $this->renderSection("pageScript") ?>
    <!-- /PageScript-->


  
  
</body>

</html>