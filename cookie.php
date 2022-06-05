<?php

if (isset ($cookie_tmp)) {
    $uid = $cookie_tmp;
} else {
    srand(time());
    $uid = md5(uniqid(""));
    setcookie("cookie_tmp", $uid, time() + 604800, "/");
}
?>