const registrati = document.querySelector("#register form");
const login = document.querySelector("#login form");
const linkLogin = document.querySelector("#linkLog");
const linkRegister = document.querySelector("#linkReg");
const messaggio = document.createElement("div");

linkRegister.addEventListener("click", (event) => {
  event.preventDefault();
  login.parentElement.parentElement.classList.add("d-none");
  registrati.parentElement.parentElement.classList.remove("d-none");
});

linkLogin.addEventListener("click", (event) => {
  event.preventDefault();
  login.parentElement.parentElement.classList.remove("d-none");
  registrati.parentElement.parentElement.classList.add("d-none");
});

registrati.addEventListener("submit", (event) => {
  if (registrati.checkValidity()) {
    event.preventDefault();
    const datiForm = new FormData(registrati);
    fetch("register.php", {
      method: "POST",
      body: datiForm,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        messaggio.innerHTML = data;
        registrati.append(messaggio);
        //   console.log(data);
      })
      .catch();
  } else {
    event.preventDefault();
    registrati.classList.add("was-validated");
  }
});

login.addEventListener("submit", (event) => {
  if (login.checkValidity()) {
    event.preventDefault();
    const datiForm = new FormData(login);
    fetch("login.php", {
      method: "POST",
      body: datiForm,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        if (data === "yes") {
          window.location.href = "gestionale.php";
        } else {
          messaggio.innerHTML = data;
          login.append(messaggio);
        }
        // console.log(data);
      })
      .catch((error) => {
        console.log(error);
      });
  } else {
    event.preventDefault();
    login.classList.add("was-validated");
  }
});
