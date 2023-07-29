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
const singleContactBtn = document.querySelector("#single-contact-btn");
const categoriesBtn = document.querySelector(".categories-btn");
const categoriesList = document.querySelector(".categories-list");
const formatsBtn = document.querySelector(".formats-btn");
const formatsList = document.querySelector(".formats-list");
const sortBtn = document.querySelector(".sort-btn");
const sortList = document.querySelector(".sort-list");
const categoriesChevron = document.querySelector(".categories-chevron");
const formatsChevron = document.querySelector(".formats-chevron");
const sortChevron = document.querySelector(".sort-chevron");
const photoRefInput = document.querySelector(".form-photo-ref");
const singlePhotoRef = document.querySelector(".single-photo-ref");

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
  singleContactBtn.addEventListener("click", openContactmodal);
}

//Filter buttons
function toggleDropdown(list, btn, chevron) {
  list.classList.toggle("show-list");
  btn.classList.toggle("dropDownBtnOpened");
  chevron.classList.toggle("chevron-up");
}

//open close categories dropdown
if (categoriesBtn) {
  categoriesBtn.addEventListener("click", () => {
    toggleDropdown(categoriesList, categoriesBtn, categoriesChevron);
  });
  // Check if the click is outside the dropdown
  document.addEventListener("click", function (event) {
    if (
      !categoriesList.contains(event.target) &&
      event.target !== categoriesBtn
    ) {
      // Check if the dropdown is currently open
      if (categoriesBtn.classList.contains("dropDownBtnOpened")) {
        toggleDropdown(categoriesList, categoriesBtn, categoriesChevron);
      }
    }
  });
}

//open close formats dropdown
if (formatsBtn) {
  formatsBtn.addEventListener("click", () => {
    toggleDropdown(formatsList, formatsBtn, formatsChevron);
  });
  // Check if the click is outside the dropdown
  document.addEventListener("click", function (event) {
    if (!formatsList.contains(event.target) && event.target !== formatsBtn) {
      // Check if the dropdown is currently open
      if (formatsBtn.classList.contains("dropDownBtnOpened")) {
        toggleDropdown(formatsList, formatsBtn, formatsChevron);
      }
    }
  });
}

//open close sort by date dropdown
if (sortBtn) {
  sortBtn.addEventListener("click", () => {
    toggleDropdown(sortList, sortBtn, sortChevron);
  });
  // Check if the click is outside the dropdown
  document.addEventListener("click", function (event) {
    if (!sortList.contains(event.target) && event.target !== sortBtn) {
      // Check if the dropdown is currently open
      if (sortBtn.classList.contains("dropDownBtnOpened")) {
        toggleDropdown(sortList, sortBtn, sortChevron);
      }
    }
  });
}

//Set color for active drop down list item
function toggleListItem(listitem) {
  listitem.classList.toggle("activeListItem");
}

//Categories
const categoriesListItems = Array.from(
  document.getElementsByClassName("categoriesListItem")
);
categoriesListItems.forEach((listItem) => {
  listItem.addEventListener("click", () => {
    categoriesListItems.forEach((listItem) =>
      listItem.classList.remove("activeListItem")
    );
    toggleListItem(listItem);
  });
});

//Formats
const formatsListItems = Array.from(
  document.getElementsByClassName("formatsListItem")
);
formatsListItems.forEach((listItem) => {
  listItem.addEventListener("click", () => {
    formatsListItems.forEach((listItem) =>
      listItem.classList.remove("activeListItem")
    );
    toggleListItem(listItem);
  });
});

//Sort by date
const sortListItems = Array.from(
  document.getElementsByClassName("sortListItem")
);

sortListItems.forEach((listItem) => {
  listItem.addEventListener("click", () => {
    sortListItems.forEach((listItem) =>
      listItem.classList.remove("activeListItem")
    );
    toggleListItem(listItem);
  });
});

//Prefill photo réf field input on single post contact form
if (singlePhotoRef) {
  photoRefInput.value = singlePhotoRef.innerHTML.replace("Référence : ", "");
}

// JavaScript function to load more posts via AJAX
function loadMorePosts() {
  const ajaxurl = '/wp-admin/admin-ajax.php';

  // AJAX request
  jQuery.ajax({
    url: ajaxurl,
    type: 'post',
    data: {
      action: 'load_more_posts', // The WordPress AJAX action hook
     
    },
    success: function(response) {
      // Append the new photos to the container
      jQuery('.gallery-section').append(response);

    },
    error: function(error) {
      console.log(error);
    }
  });
}

//Add eventlistener to load more photos
const loadMoreButton = document.querySelector('.load-more-btn');
loadMoreButton.addEventListener('click', loadMorePosts);