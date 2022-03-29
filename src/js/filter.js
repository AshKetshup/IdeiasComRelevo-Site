moradia = document.getElementById("checkMoradia");
apartam = document.getElementById("checkApartment");

acc_nPisos = document.getElementById("nPisos");
acc_piso = document.getElementById("Piso");

function switch_visibility() {
    function untoggle(element) {
        element.querySelectorAll('input[type="checkbox"]').forEach(el => {
            el.checked = false;
        });
        for (el in element.querySelectorAll('input')) {
            el.disable = true;
        };

        element.hidden = true;
    };
    
    function toggle(element) {
        for (el in element.querySelectorAll('input')) {
            el.disable = false;
        };

        element.hidden = false;
    };

    if ((!apartam.checked && !moradia.checked) || (apartam.checked && moradia.checked)) {
        acc_nPisos.hidden = false;
        acc_piso.hidden = false;
    } else if (moradia.checked) {
        toggle(acc_nPisos);
        untoggle(acc_piso);
    } else if (apartam.checked) {
        untoggle(acc_nPisos);
        toggle(acc_piso);
    }
};

moradia.addEventListener("click", () => {
    switch_visibility();
});

apartam.addEventListener("click", () => {
    switch_visibility();
});