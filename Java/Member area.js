document.addEventListener("DOMContentLoaded", () => {
  const sidePanel = document.getElementById("side-panel");
  const menuBtn = document.getElementById("menu-btn");

  // Toggle Side Panel
  menuBtn.addEventListener("click", () => {
    sidePanel.classList.toggle("active");
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const sidePanel = document.getElementById("side-panel");
  const menuBtn = document.getElementById("menu-btn");
  const subscriptionPopup = document.getElementById("subscription-popup");
  const messageBtns = document.querySelectorAll(".message-btn, .photo-btn");

  // Toggle Side Panel
  menuBtn.addEventListener("click", () => {
    const isPanelOpen = sidePanel.style.left === "0px";
    sidePanel.style.left = isPanelOpen ? "-300px" : "0px";
  });

  // Show Subscription Pop-Up
  messageBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      subscriptionPopup.classList.add("show");
    });
  });

  // Close Subscription Pop-Up on Outside Click
  document.addEventListener("click", (e) => {
    if (!subscriptionPopup.contains(e.target) && !e.target.matches(".message-btn, .photo-btn")) {
      subscriptionPopup.classList.remove("show");
    }
  });
});
