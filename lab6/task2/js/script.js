export async function isAuth() {
  try {
    const response = await fetch("phpBack/checkLogin.php");
    const data = await response.json();
    return data["logged"];
  } catch (error) {
    console.error(error);
  }
}
