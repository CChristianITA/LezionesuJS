const bottoni = document.querySelectorAll(".btn-danger");








bottoni.forEach((bottone) => {
  bottone.addEventListener("click", (event) => {
    event.preventDefault();
    const id =
      bottone.parentElement.parentElement.firstElementChild.textContent;
    fetch(`cancella.php.?id=${id}`)
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        bottone.parentElement.parentElement.remove();
        console.log(data);
      })
      .catch((error) => {
        console.log(error);
      });
  });
});
