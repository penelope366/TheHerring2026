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

