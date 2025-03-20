import { isAuth } from "./script.js";

window.onload = async () => {
  const isLogged = await isAuth();
  console.log(isLogged);
  if (!isLogged) {
    document.location.href = "loginForm.php";
  }

  const response = await fetch("phpBack/users.php", {
    method: "GET",
    headers: { "Content-Type": "application/json" },
  });

  if (response.ok) {
    const users = await response.json();
    const tbody = document.querySelector("#usersTable tbody");
    users.forEach((user) => {
      const row = document.createElement("tr");
      Object.values(user).forEach((value) => {
        const cell = document.createElement("td");
        cell.textContent = value;
        row.appendChild(cell);
      });

      const actionsCell = document.createElement("td");

      const changeButton = document.createElement("button");
      changeButton.textContent = "change";
      changeButton.addEventListener("click", () => userEdit(user.id));
      actionsCell.appendChild(changeButton);

      const deleteButton = document.createElement("button");
      deleteButton.textContent = "delete";
      deleteButton.addEventListener("click", () => {
        userDelete(user.id);
        tbody.removeChild(row);
      });
      actionsCell.appendChild(deleteButton);
      row.appendChild(actionsCell);

      tbody.appendChild(row);
    });
  } else if (response.status === 401) {
    window.location.href = "loginForm.php";
  }
};

document.querySelector("#toggleTable").addEventListener("click", () => {
  const tbody = document.querySelector("#usersTable tbody");
  if (tbody.classList.contains("hidden")) {
    tbody.classList.remove("hidden");
  } else {
    tbody.classList.add("hidden");
  }
});

document.querySelector("#logout").addEventListener("click", async () => {
  const response = await fetch("phpBack/logout.php", {
    method: "POST",
  });

  if (response.ok) {
    window.location.href = "loginForm.php";
  } else {
    console.error("Failed to logout");
  }
});

const userDelete = async (id) => {
  const response = await fetch("phpBack/users.php", {
    method: "DELETE",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ id }),
  });
  const data = await response.json();
  console.log(data);
  if (response.status === 200) {
    if (data["isCurrentUser"] === true) {
      window.location.href = "loginForm.php";
    }
  }
};

const userEdit = (id) => {
  window.location.href = `editUser.php?id=${id}`;
};
