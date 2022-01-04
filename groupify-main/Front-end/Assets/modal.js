var rootEl = document.documentElement;
var $modals = document.querySelectorAll(".modal");
var $modalButtons = document.querySelectorAll(".modal-button");
var $modalCloses = document.querySelectorAll(
  ".modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button"
);

if ($modalButtons.length > 0) {
  $modalButtons.forEach(function (el) {
    el.addEventListener("click", function () {
      var $target = el.dataset.target;
      openModal($target);
    });
  });
}

if ($modalCloses.length > 0) {
  $modalCloses.forEach(function (el) {
    el.addEventListener("click", function () {
      closeModals();
    });
  });
}

function openModal(target) {
  var $target = document.getElementById(target);
  rootEl.classList.toggle("is-clipped");
  $target.classList.toggle("is-active");
}

function closeModals() {
  rootEl.classList.remove("is-clipped");
  $modals.forEach(function ($el) {
    $el.classList.remove("is-active");
  });
}
