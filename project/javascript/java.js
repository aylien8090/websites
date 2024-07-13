document.getElementById("searchform").addEventListener("submit", function (event) {
  // Check if anything inputted
  var inputValue = document.getElementById("query").value;
  if (!inputValue) {
      event.preventDefault(); // Prevent form submission
      document.getElementById("errormsg").style.display = "block";
  }
});