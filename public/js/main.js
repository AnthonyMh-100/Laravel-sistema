const openModalBtn = document.querySelectorAll("#open-modal");
const closeModalBtn = document.querySelectorAll("#close-modal");
const modalOverlay = document.querySelector(".modal-overlay");

openModalBtn.forEach(role =>{
    role.addEventListener("click", () => {
        modalOverlay.style.display = "flex";

      });
})

closeModalBtn.forEach(btn =>{
    btn.addEventListener("click", () => {
        modalOverlay.style.display = "none";
      });
})

