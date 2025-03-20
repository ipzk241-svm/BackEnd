import { isAuth } from "./script";

window.onload = async () => {
  const isLogged = await isAuth();
  if (isLogged) {
    document.location.href = "notes.php";
  }
};

document.querySelector("#reg").addEventListener("click", async () => {
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  if (!name || !email || !password) {
    alert("Please fill all fields");
  }
  const response = await fetch("phpBack/register.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ name, email, password }),
  });

  const result = await response.json();
  if (response.status === 201) {
    alert(result.message);
    window.location.href = "loginForm.php";
  } else {
    alert(result.message);
  }
});
