// Script to toggle the sidebar

let btn = document.querySelector('#btn')
let sidebar = document.querySelector('.sidebar')

btn.onclick = function () {
    sidebar.classList.toggle('active')
}

// Script to toggle the action button

function toggleDropdown(icon) {
  const dropdown = icon.nextElementSibling;
  dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
}
  
window.onclick = function (event) {
  if (!event.target.matches(".dropdown") && !event.target.matches("i")) {
    const allDropdowns = document.querySelectorAll(".dropdown");
    allDropdowns.forEach((dropdown) => {
      dropdown.style.display = "none";
    });
  }
};


// Add button outside form

let addButton = document.querySelector('.add-button');
addButton.addEventHandler('click', () => myForm.submit());