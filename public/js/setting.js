const outerDiv = document.getElementById("outer-div");
const innerDiv = document.getElementById("inner-div");
const tokensa = document.getElementById('tokensa');
const tokensb = document.getElementById('tokensb');
const statusa = document.getElementById('statusa');
const statusb = document.getElementById('statusb');

let companyModeActive = false; 

outerDiv.addEventListener("click", () => {
    const confirmMessage = companyModeActive
        ? "Do you want to go back to Normal Mode?"
        : "Do you want to switch to Company Mode?";

    if (window.confirm(confirmMessage)) {
        if (innerDiv.classList.contains("move-right")) {
            // Switch to Normal Mode
            innerDiv.classList.remove("move-right");
            outerDiv.classList.remove("move-right");
            tokensa.classList.add('hide-this');
            tokensb.classList.add('hide-this');
            statusa.textContent = "Inactive";
            statusb.textContent = "Inactive";
            statusa.classList.add('text-merah');
            statusb.classList.add('text-merah');
            statusa.classList.remove('text-hijau');
            statusb.classList.remove('text-hijau');
        } else {
            // Switch to Company Mode
            innerDiv.classList.add("move-right");
            outerDiv.classList.add("move-right");
            tokensa.classList.remove('hide-this');
            tokensb.classList.remove('hide-this');
            statusa.textContent = "Active";
            statusb.textContent = "Active";
            statusa.classList.remove('text-merah');
            statusb.classList.remove('text-merah');
            statusa.classList.add('text-hijau');
            statusb.classList.add('text-hijau');
        }
        companyModeActive = !companyModeActive; // Toggle the company mode flag
    }
});
