document.addEventListener("DOMContentLoaded", function() {
    let changed = "no";
    if (sessionStorage.getItem("color-changed")) {
        changed = sessionStorage.getItem("color-changed");
    }

    function updateColors() {
        if (changed == "yes") {
            document.getElementsByTagName("body")[0].style.setProperty("--primary", "#373737");
            document.getElementsByTagName("body")[0].style.setProperty("--list-bg", "#424242");
            document.getElementsByTagName("footer")[0].style.backgroundColor = "#424242";
        } else {
            document.getElementsByTagName("body")[0].style.setProperty("--primary", "#151515");
            document.getElementsByTagName("body")[0].style.setProperty("--list-bg", "#151515");
            document.getElementsByTagName("footer")[0].style.backgroundColor = "#151515";
        }
    }

    updateColors();

    document.getElementsByTagName("header")[0].addEventListener("click", function() {
        if (changed == "no") {
            document.getElementsByTagName("body")[0].style.setProperty("--primary", "#373737");
            document.getElementsByTagName("body")[0].style.setProperty("--list-bg", "#424242");
            changed = "yes";
            sessionStorage.setItem("color-changed", "yes");
        } else {
            document.getElementsByTagName("body")[0].style.setProperty("--primary", "#151515");
            document.getElementsByTagName("body")[0].style.setProperty("--list-bg", "#151515");
            changed = "no";
            sessionStorage.setItem("color-changed", "no");
        }

        updateColors();
    });
});
