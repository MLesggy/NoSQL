document.addEventListener("DOMContentLoaded", function () {
  const viewButtons = document.querySelectorAll(".btn-view");
  const modal = document.getElementById("viewModal");
  const closeBtn = document.querySelector(".close-view");

  const viewNom = document.getElementById("viewNom");
  const viewQuantite = document.getElementById("viewQuantite");
  const viewPrix = document.getElementById("viewPrix");

  viewButtons.forEach(btn => {
    btn.addEventListener("click", () => {
      viewNom.textContent = btn.getAttribute("data-nom");
      viewQuantite.textContent = btn.getAttribute("data-quantite");
      viewPrix.textContent = btn.getAttribute("data-prix");
      modal.style.display = "block";
    });
  });

  closeBtn.addEventListener("click", () => {
    modal.style.display = "none";
  });

  window.addEventListener("click", (event) => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
});