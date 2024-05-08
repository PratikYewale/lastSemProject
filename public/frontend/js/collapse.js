// {{-- Collapse code --}}

    var viewmore = false;

    function myFunction() {
        var btn = document.getElementById("collapseData");

        if (viewmore == true) {
            viewmore = false;
            btn.innerHTML = "Read More";
            btn.setAttribute('aria-expanded', 'false');
        } else {
            viewmore = true;
            btn.innerHTML = "Read Less";
            btn.setAttribute('aria-expanded', 'true');
        }
    }

// {{-- /Collapse code --}}