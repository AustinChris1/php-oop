
<?php
if (isset($_SESSION['message']))
{

?>
<div id="msg" class="alert alert-warning alert-dismissable fade show" role="alert">
    <?= $_SESSION['message'];?>
    <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
unset($_SESSION['message']);
}
?>
<script src="../js/bootstrap5.bundle.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script>
    const msg = document.getElementById("msg");
        window.onload = function() {
        msg.style.display = "block";
        setTimeout(function(){
            msg.style.display = "none";
        }, 2000);
}

</script>