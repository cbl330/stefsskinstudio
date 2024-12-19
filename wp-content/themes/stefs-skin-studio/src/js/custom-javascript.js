// document.addEventListener("DOMContentLoaded", function () {
//     const dropdowns = document.querySelectorAll(".dropdown");

//     dropdowns.forEach((dropdown) => {
//         const menu = dropdown.querySelector(".dropdown-menu");

//         // Triggered when the dropdown is about to show
//         dropdown.addEventListener("show.bs.dropdown", function () {
//             menu.classList.add("animate-show");
//             menu.style.display = "block"; // Ensure dropdown is visible
//             setTimeout(() => {
//                 menu.classList.add("show"); // Bootstrap's default "show"
//             }, 10);
//         });

//         // Triggered when the dropdown is about to hide
//         dropdown.addEventListener("hide.bs.dropdown", function () {
//             menu.classList.remove("show"); // Bootstrap's default "show"
//             menu.classList.add("animate-hide");
//             setTimeout(() => {
//                 menu.classList.remove("animate-show", "animate-hide");
//                 menu.style.display = ""; // Reset to Bootstrap's default
//             }, 300); // Match the CSS transition duration
//         });
//     });
// });


// document.addEventListener("DOMContentLoaded", function () {
//     const dropdowns = document.querySelectorAll(".dropdown");

//     dropdowns.forEach((dropdown) => {
//         dropdown.addEventListener("show.bs.dropdown", function () {
//             const menu = this.querySelector(".dropdown-menu");
//             menu.style.display = "block";
//             setTimeout(() => {
//                 menu.classList.add("show");
//             }, 10);
//         });

//         dropdown.addEventListener("hide.bs.dropdown", function () {
//             const menu = this.querySelector(".dropdown-menu");
//             menu.classList.remove("show");
//             setTimeout(() => {
//                 menu.style.display = "";
//             }, 300); // Match CSS transition duration
//         });
//     });
// });


// Mobile Toggle
// jQuery(document).ready(function ($) {
//     const toggleButton = $(".wrap-menu-toggle");
//     const navMenu = $(".wrap-nav");

//     toggleButton.on("click", function () {
//         const isExpanded = toggleButton.attr("aria-expanded") === "true";

//         // Toggle ARIA attributes
//         toggleButton.attr("aria-expanded", !isExpanded);

//         if (isExpanded) {
//             // Collapse menu
//             navMenu.removeClass("is-visible");
//             setTimeout(() => navMenu.css("visibility", "hidden"), 300); // Match CSS transition duration
//         } else {
//             // Expand menu
//             navMenu.css("visibility", "visible").addClass("is-visible");
//         }

//         // Toggle X animation
//         toggleButton.toggleClass("is-active");
//     });
// });





// jQuery(document).ready(function ($) {
//     const toggleButton = $(".wrap-menu-toggle");
//     const navMenu = $(".wrap-nav");

//     toggleButton.on("click", function () {
//         const isExpanded = toggleButton.attr("aria-expanded") === "true";

//         // Toggle ARIA attributes
//         toggleButton.attr("aria-expanded", !isExpanded);

//         // Smoothly toggle menu visibility
//         navMenu.toggleClass("is-visible");

//         // Toggle X animation on the hamburger menu
//         toggleButton.toggleClass("is-active");
//     });
// });