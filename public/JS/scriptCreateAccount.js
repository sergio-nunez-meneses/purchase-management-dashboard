let sideNav = document.getElementById("sidenavCreateAccount");

function openNav() {
  if (window.innerWidth < 992) {
    sideNav.style.width = "100%";
    sideNav.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
  }
  else if (window.innerWidth < 1500) {
    sideNav.style.width = "50%";
    sideNav.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
  }
  else {
    sideNav.style.width = "50%";
    sideNav.style.borderLeft = "none";
  }
}

function closeNav() {
  sideNav.style.width = "0";
}
