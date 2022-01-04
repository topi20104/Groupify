let min = document.getElementById("sliderWithValue");
let max = document.getElementById("sliderWithValue1");

min.addEventListener("change", function() {
    max.min = min.value;
    if (max.value < min.value) {
        max.value = max.min;
    }

})