import { isAuth } from "./script.js";

window.onload = async () => {
  const isLogged = await isAuth();
  if (!isLogged) {
    document.location.href = "loginForm.php";
  } else {
    const urlParams = new URLSearchParams(window.location.search);
    const noteId = urlParams.get("id");
    fetchNote(noteId);
  }
};

async function fetchNote(noteId) {
  if (!noteId) {
    alert("Немає ID нотатки");
    window.location.href = "notes.php";
    return;
  }

  try {
    const response = await fetch(`phpBack/get_note.php?id=${noteId}`, {
      credentials: "include",
    });
    if (!response.ok) throw new Error("Нотатка не знайдена");

    const note = await response.json();
    document.getElementById("noteId").value = note.id;
    document.getElementById("noteTitle").value = note.title;
    document.getElementById("noteContent").value = note.content;
  } catch (error) {
    alert(error.message);
    window.location.href = "notes.php";
  }
}

document.getElementById("updateNote").addEventListener("click", updateNote);

async function updateNote() {
  const id = document.getElementById("noteId").value;
  const title = document.getElementById("noteTitle").value;
  const content = document.getElementById("noteContent").value;

  try {
    const response = await fetch("phpBack/update_note.php", {
      method: "POST",
      credentials: "include",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        id,
        title,
        content,
      }),
    });

    const data = await response.json();
    if (!response.ok) throw new Error(data.message);

    console.log(data.message);
    window.location.href = "notes.php";
  } catch (error) {
    console.log(error.message);
  }
}
