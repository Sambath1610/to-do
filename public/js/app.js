
(function () {
const alertEl = document.getElementById('sessionSuccess');
if (!alertEl) return;

const closeBtn = document.getElementById('sessionSuccessClose');

function dismissAlert() {
    // Add a hide class so CSS transition can run
    alertEl.classList.add('session-alert--hidden');
    // remove from DOM after animation to keep it clean
    setTimeout(() => {
    if (alertEl && alertEl.parentNode) alertEl.parentNode.removeChild(alertEl);
    }, 220);
}

// close on click
closeBtn?.addEventListener('click', dismissAlert);

// auto-dismiss after 5 seconds (5000ms)
setTimeout(dismissAlert, 5000);
})();

