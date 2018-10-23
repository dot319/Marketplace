<div class="outer" id="loggedout">
    Logged out.
<?php 
session_unset();
echo("<script type='text/javascript'>
if (!window.location.hash) {
    window.location = window.location + '#loggedout';
    window.location.reload();
}
</script>");
?>

</div>