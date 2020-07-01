<footer>
        <div class="footer-container">
            <div class="container">
                <a href="#">
                    <img src="<?= base_url('assets/pages/') ?>images/logo-white.svg" class="logo" alt="logo">
                </a>
                <p class="address">Melrose Place, 90210<br>USA</p>
                <ul class="footer-links">
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </footer>


    <script>
    
        var menu = document.getElementById('menu');
        var nav = document.getElementById('nav');
        var exit = document.getElementById('exit');

        menu.addEventListener('click', function(e) {
            nav.classList.toggle('hide-mobile');
            e.preventDefault();
        });

        exit.addEventListener('click', function(e) {
            nav.classList.add('hide-mobile');
            e.preventDefault();
        });

    </script>

</body>
</html>