import { isAuth } from "./script";

window.onload = async () => {
  const isLogged = await isAuth();
  if (isLogged) {
    document.location.href = "notes.php";
  }
};

document.querySelector("#auth").addEventListener("click", async () => {
  var email = document.querySelector("#email").value;
  var password = document.querySelector("#password").value;

  if (!email || !password) {
    alert("Please fill all fields");
  }

  const response = await fetch("phpBack/login.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ email, password }),
  });

  const result = await response.json();
  if (response.status === 200) {
    alert(result.message);
    window.location.href = "notes.php";
  } else {
    alert(result.message);
  }
});
