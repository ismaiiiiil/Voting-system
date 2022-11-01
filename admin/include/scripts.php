

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="./../js/handleEye.js"></script>


 <script>
    <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] != '')
    {
        ?>
        swal({
                title: "<?php echo $_SESSION['status'] ?>",
                // text: "You clicked the button!",
                icon: "<?php echo $_SESSION['status_code'] ?>",
                cancel: true,
        });
        <?php 
        
    };
    ?>
</script>
<!-- script SweetAlert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>