import { isAuth } from "./script.js";

window.onload = async () => {
  const isLogged = await isAuth();
  if (!isLogged) {
    document.location.href = "loginForm.php";
  } else {
    displayNotes();
  }
};

const displayNotes = async () => {
  try {
    const response = await fetch("phpBack/get_notes.php", {
      method: "GET",
      headers: { "Content-Type": "application/json" },
    });

    const result = await response.json();
    if (response.status === 200) {
      const notes = result.notes;
      console.log(notes);
      if (notes === undefined || notes?.length == 0) {
        const notesDiv = document.getElementById("notes");
        notesDiv.innerHTML = "<h1>No notes found</h1>";
        return;
      }
      const notesDiv = document.getElementById("notes");
      notesDiv.innerHTML = "";
      notes.forEach((note) => {
        const noteDiv = document.createElement("div");
        noteDiv.className = "note";
        noteDiv.innerHTML = `
            <h2>${note.title}</h2>
            <p>${note.content}</p>
            `;

        const actionsDiv = document.createElement("div");
        actionsDiv.className = "actions";

        const editButton = document.createElement("button");
        editButton.textContent = "Edit";
        editButton.addEventListener("click", () => editNote(note.id));

        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Delete";
        deleteButton.addEventListener("click", () => deleteNote(note.id));

        actionsDiv.appendChild(editButton);
        actionsDiv.appendChild(deleteButton);
        noteDiv.appendChild(actionsDiv);

        notesDiv.appendChild(noteDiv);
      });
    } else {
      console.log(result.message);
    }
  } catch (error) {
    console.error(error);
  }
};

document.querySelector("#addNote").addEventListener("click", async () => {
  var title = document.querySelector("#title").value;
  var content = document.querySelector("#content").value;
  console.log(title, content);

  if (!title || !content) {
    alert("Please fill all fields");
  }

  const response = await fetch("phpBack/addNote.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ title, content }),
  });

  const result = await response.json();
  if (response.status === 201) {
    console.log(result.message);
    displayNotes();
  } else {
    console.log(result.message);
  }
});

const editNote = async (id) => {
  window.location.href = `editNote.php?id=${id}`;
};

const deleteNote = async (id) => {
  const response = await fetch("phpBack/delete_note.php", {
    method: "DELETE",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ id }),
  });

  const result = await response.json();
  if (response.status === 200) {
    displayNotes();
  } else {
    console.log(result.message);
  }
};
