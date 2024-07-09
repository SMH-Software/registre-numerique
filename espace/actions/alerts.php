<?php
    if(isset($_SESSION['accuse'])){ ?>
        <script>
                Swal.fire({
                icon: 'error',
                title: 'Ajout impossible',
                text: ' <?= $_SESSION['accuse'] ?>',
                timer: 5000
            })
        </script>

<?php } unset($_SESSION['accuse']);?>


<?php
    if(isset($_SESSION['success'])){ ?>
        <script>
                Swal.fire({
                icon: 'success',
                title: 'Planification de séance',
                text: ' <?= $_SESSION['success'] ?>',
                timer: 5000
            })
        </script>

<?php } unset($_SESSION['success']);?>

<?php
    if(isset($_SESSION['success_delete'])){ ?>
        <script>
                Swal.fire({
                icon: 'success',
                title: 'Suppression',
                text: ' <?= $_SESSION['success_delete'] ?>',
                timer: 5000
            })
        </script>

<?php } unset($_SESSION['success_delete']);?>

<?php
    if(isset($_SESSION['seance'])){ ?>
        <script>
                Swal.fire({
                icon: 'success',
                title: '<?= $_SESSION['seance'] ?>',
                timer: 5000
            })
        </script>

<?php } unset($_SESSION['seance']);?>

<?php
    if(isset($_SESSION['nom_maj'],$_SESSION['maj'])){ ?>
        <script>
                Swal.fire({
                icon: 'warning',
                title: '<?= $_SESSION['nom_maj'] ?>',
                text: '<?= $_SESSION['maj'] ?>',
                timer: 5000
            })
        </script>

<?php } unset($_SESSION['nom_maj'],$_SESSION['maj']);?>

<?php
    if(isset($_SESSION['nom_pointer'],$_SESSION['statut'])){ ?>
        <script>
                Swal.fire({
                icon: 'success',
                title: '<?= $_SESSION['nom_pointer'] ?>',
                text: '<?= $_SESSION['statut'] ?>',
                timer: 5000
            })
        </script>

<?php } unset($_SESSION['nom_pointer'],$_SESSION['statut']);?>




