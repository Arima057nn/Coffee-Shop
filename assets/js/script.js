let menu = document.querySelector("#menu-btn");
let navbar = document.querySelector(".header .flex .navbar");

menu.onclick = () => {
  menu.classList.toggle("fa-times"); // chuyern thành dấu x
  navbar.classList.toggle("active"); //Thêm hoạt động active
};

//! Hoặc cách như thế này
// ?function addEvent() {
// ?  menu.classList.toggle("fa-times");
// ?  navbar.classList.toggle("active");
// ?}
// ?menu.addEventListener("click", addEvent);

window.onscroll = () => {
  menu.classList.remove("fa-times");
  navbar.classList.remove("active");
};
