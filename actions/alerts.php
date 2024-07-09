
<?php
    if(isset($_SESSION['vide'])){ ?>
        <script>
                Swal.fire({
                icon: 'warning',
                title: 'Champs vides',
                text: ' <?= $_SESSION['vide'] ?>',
                timer: 5000
            })
        </script>

<?php } unset($_SESSION['vide']);?>


<?php
    if(isset($_SESSION['error'])){ ?>
        <script>
                Swal.fire({
                icon: 'error',
                title: 'Erreur de connexion',
                text: ' <?= $_SESSION['error'] ?>',
                timer: 5000
            })
        </script>

<?php } unset($_SESSION['error']);?>

