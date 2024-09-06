<?php
session_start();
session_destroy();
echo"
<script>
alert('you logged out successfully!' );
window.location.replace('login.html');
</script>";

?>