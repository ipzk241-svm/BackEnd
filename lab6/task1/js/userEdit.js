import { isAuth } from "./script";

document.addEventListener("DOMContentLoaded", async () => {
  const isLogged = await isAuth();
  console.log(isLogged);
  if (!isLogged) {
    document.location.href = "loginForm.php";
  }

  const userId = new URLSearchParams(window.location.search).get("id");
  const response = await fetch(`phpBack/getUserById.php?id=${userId}}`, {
    method: "GET",
    headers: { "Content-Type": "application/json" },
  });

  if (response.ok) {
    const user = await response.json();
    console.log(user);
    document.querySelector("#name").value = user.name;
    document.querySelector("#email").value = user.email;
  } else if (response.status === 401) {
    window.location.href = "loginForm.php";
  }
});

document.querySelector("#editUser").addEventListener("click", async () => {
  const name = document.querySelector("#name").value;
  const email = document.querySelector("#email").value;
  const userId = new URLSearchParams(window.location.search).get("id");

  const response = await fetch("phpBack/editUser.php", {
    method: "PATCH",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ userId, name, email }),
  });

  const data = await response.json();
  console.log(data);
  window.location.href = "usersTable.php";
});
