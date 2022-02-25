$admin_user_pass = document.getElementById("admin_user_pass");
$show_pass = document.getElementById("show-pass");

$show_pass.addEventListener("click", (e) => {
  e.preventDefault();
  $admin_user_pass.classList.remove("hidden");
  $show_pass.classList.add("hidden");
});
