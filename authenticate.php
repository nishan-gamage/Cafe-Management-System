<?php
// Ensure session_start() is called only if no session is already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['auth'])){

?>


<?php
} else {
	header('Location: sign_up.php');
	exit();
}
?>