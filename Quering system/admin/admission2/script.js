const numInput = document.getElementById("number");

numInput.addEventListener("input", () => {
    if (numInput.value > 1000) {
        numInput.value = 1000;
    } else if (numInput.value < 1) {
        numInput.value = "";
    }
});
function clearInput() {
    document.getElementById("number").value = "";
}
