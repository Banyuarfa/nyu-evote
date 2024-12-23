import axios from "axios";

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

document.querySelector("#burger").addEventListener("click", (e) => {
    document.querySelector("#menu").classList.toggle("hidden");
    document.querySelector("#menu").classList.toggle("menu");
});
