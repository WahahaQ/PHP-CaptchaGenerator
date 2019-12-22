<!-- #region header -->
<?php
include_once "_header.php";
?>
<!-- #endregion -->

<div class="d-flex justify-content-center captcha-container">
    <img id="captcha" class="captcha-image" src="_captcha.php" width="200px" height="auto">
    <button class="btn btn-primary captcha-button" onclick="changeImage()"><i class="fa fa-refresh"></i> Refresh Captcha</button>
</div>

<script language="javascript">
    function changeImage() {
            document.getElementById("captcha").src = "_captcha.php";
    }
</script>

<!-- #region footer -->
<?php
include_once "_scripts.php";
include_once "_footer.php";
?>
<!-- #endregion -->

