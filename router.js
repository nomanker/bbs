"use strict";
function router(permissions){
    if (permissions=='') {
        window.location.href = "login.html";
        return;
    }
    var role = parseInt(permissions);
    switch (role) {
        case 0:
            window.location.href = "admin";
            break;
        case 1:
            window.location.href = "users/members.php";
            break;
        case 2:
            window.location.href = "users/common.php";
            break;
    }
}