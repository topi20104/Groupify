//Finds the select menu in the document
let currentCourse = document.getElementById("courses-select");

//Browser API
const query = new URLSearchParams(window.location.search);
//Event listener for the select menu
currentCourse.addEventListener("change", function () {
  query.set("course", currentCourse.value);
  setParameters();
});

//Function to set the parameters to the URL // To optimise the code in the event listener functions
function setParameters() {
  //Converts the parameters to a string value that can be used
  query.toString();
  //Sets the parameters to the URL and reloads
  window.location.search = query;
}
