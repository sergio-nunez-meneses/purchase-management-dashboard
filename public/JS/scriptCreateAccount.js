let sideNav = document.getElementById("sidenavCreateAccount");
let info_Create = document.getElementById("infoCreate");

function openNav() {
  if (window.innerWidth < 992) {
    sideNav.style.width = "100%";
    sideNav.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
    if (info_Create != null) {
      sideNav.style.transition = "0s";
    }
  }
  else if (window.innerWidth < 1500) {
    sideNav.style.width = "50%";
    sideNav.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
    if (info_Create != null) {
      sideNav.style.transition = "0s";
    }
  }
  else {
    sideNav.style.width = "50%";
    sideNav.style.backgroundColor = "rgba(0, 0, 0, 0.6)"
    if (info_Create != null) {
      sideNav.style.transition = "0s";
    }
  }
}

function closeNav() {
  sideNav.style.width = "0";
}


if (info_Create != null) {
  openNav();
}
