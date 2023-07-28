const burgerMenu = document.querySelector(".burger-menu");
const mobileCloseMenuBtn = document.querySelector(".mobile-close-menu-btn");
const mobileHeaderNav = document.querySelector(".mobile-header-nav");
const contactModal = document.querySelector(".contact-modal");
const contactModalBtn = document.querySelector(".menu-item-11");
const contactModalBtnMobile = document.querySelector(
  ".mobile-header-nav .menu-item-11"
);
const contactModalHeader = document.querySelector(".contact-modal-header");
const contactModalForm = document.querySelector(".wpcf7-form");
const singlePrevArrow = document.querySelector(".single-prev-photo-arrow");
const singleNextArrow = document.querySelector(".single-next-photo-arrow");
const prevNavThumbnail = document.querySelector(".previous-nav-thumbnail");
const nextNavThumbnail = document.querySelector(".next-nav-thumbnail");
const singleContactBtn = document.querySelector("#single-contact-btn")

//Mobile menu handling
burgerMenu.addEventListener("click", openMobileMenu);
function openMobileMenu() {
  mobileCloseMenuBtn.style.display = "block";
  burgerMenu.style.display = "none";
  mobileHeaderNav.style.display = "flex";
}

mobileCloseMenuBtn.addEventListener("click", closeMobileMenu);
function closeMobileMenu() {
  mobileCloseMenuBtn.style.display = "none";
  burgerMenu.style.display = "block";
  mobileHeaderNav.style.display = "none";
}

//Contact modal handling
function openContactmodal() {
  contactModal.style.display = "flex";
}
contactModalBtn.addEventListener("click", openContactmodal);
contactModalBtnMobile.addEventListener("click", openContactmodal);

function closeContactmodal() {
  contactModal.style.display = "none";
}

document.addEventListener("click", function (event) {
  if (event.target == contactModal) {
    closeContactmodal();
  }
});

contactModalHeader.addEventListener("click", closeContactmodal);

//Close modal on successful form submission
document.addEventListener("wpcf7mailsent", closeContactmodal);

// //Single photo post navigation
function showPrevNavThumbnail() {
  prevNavThumbnail.style.opacity = "1";
}
function hidePrevNavThumbnail() {
  prevNavThumbnail.style.opacity = "0";
}

if (singlePrevArrow) {
singlePrevArrow.addEventListener("mouseover", showPrevNavThumbnail);
singlePrevArrow.addEventListener("mouseout", hidePrevNavThumbnail);
}
function showNextNavThumbnail() {
  nextNavThumbnail.style.opacity = "1";
}
function hideNextNavThumbnail() {
  nextNavThumbnail.style.opacity = "0";
}
if (singleNextArrow) {
singleNextArrow.addEventListener("mouseover", showNextNavThumbnail);
singleNextArrow.addEventListener("mouseout", hideNextNavThumbnail);
}

//Single contact button contbact modal handling
if (singleContactBtn) {
singleContactBtn.addEventListener('click', openContactmodal)
}