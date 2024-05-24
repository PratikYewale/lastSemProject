// collapse.js

function toggleCollapse(buttonId, targetId) {
    var btn = document.getElementById(buttonId);
    var targetElement = document.getElementById(targetId);

    if (targetElement.classList.contains('show')) {
        btn.innerHTML = "Read More";
        btn.setAttribute('aria-expanded', 'false');
    } else {
        btn.innerHTML = "Read Less";
        btn.setAttribute('aria-expanded', 'true');
    }
}

// Ensure the text is updated correctly when the collapse event completes
document.addEventListener('DOMContentLoaded', function () {
    var collapsibleElements = document.querySelectorAll('[data-bs-toggle="collapse"]');

    collapsibleElements.forEach(function (element) {
        var targetId = element.getAttribute('data-bs-target').substring(1); // Remove the # from the ID
        var targetElement = document.getElementById(targetId);

        targetElement.addEventListener('shown.bs.collapse', function () {
            element.innerHTML = 'Read Less';
            element.setAttribute('aria-expanded', 'true');
        });

        targetElement.addEventListener('hidden.bs.collapse', function () {
            element.innerHTML = 'Read More';
            element.setAttribute('aria-expanded', 'false');
        });
    });
});
