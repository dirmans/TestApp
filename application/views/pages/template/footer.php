<div style="padding-bottom: 100px">

</div>
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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