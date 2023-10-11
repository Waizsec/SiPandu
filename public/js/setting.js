const outerDiv = document.getElementById("outer-div");
const innerDiv = document.getElementById("inner-div");

outerDiv.addEventListener("click", () => {
    if (innerDiv.classList.contains("move-right")) {
        innerDiv.classList.remove("move-right");
        outerDiv.classList.remove("move-right");

        innerDiv.classList.add("move-left");
        outerDiv.classList.add("move-left");
    } else {
        innerDiv.classList.add("move-right");
        outerDiv.classList.add("move-right");

        innerDiv.classList.remove("move-left");
        outerDiv.classList.remove("move-left");
    }
});
