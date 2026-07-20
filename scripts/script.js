//outdated and doesn't connect to anything, probably need to edit it
const searchForm = document.getElementById('searchForm');
const searchInput = document.getElementById('searchInput');


searchForm.addEventListener('submit', function(event) {
    
    event.preventDefault();

  
    const query = searchInput.value.trim();

    if (query !== "") {
        executeSearch(query);
    }
});

// code below may not actually do anything at this point
const dropdowns = document.querySelectorAll(".dropdown > a");

dropdowns.forEach(link => {
    link.addEventListener("click", function(e) {

        if (window.innerWidth <= 768) {
            e.preventDefault();

            const submenu = this.nextElementSibling;

            submenu.style.display =
                submenu.style.display === "block"
                    ? "none"
                    : "block";
        }

    });
});