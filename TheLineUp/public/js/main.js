let searchContainer = document.querySelector('.search-container');
let searchBtn = document.querySelector('.search-btn');
let searchQuery = [];

let categoryList = () => {
  fetch(`http://localhost:8888/events/categories`, {
      method: "post",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json"
      }
    })
    .then(res => res.json())
    .then((data) => {
      // console.log(data);
      data.forEach(el => {
        document.querySelector('.category-search').innerHTML += `<option value=${el.category_id}>${el.name}</option>`;
      });
    })
}

let searchResults = (query) => {
  // console.log(searchQuery);
  searchContainer.innerHTML = `<h1>Upcoming Events</h1>
                               <div class="lds-ring"><div></div><div></div><div></div><div></div></div>`;
  fetch(`http://localhost:8888/events/${query}`, {
      method: "post",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json"
      },
      body: JSON.stringify({
        name: searchQuery.name,
        location: searchQuery.location,
        category: searchQuery.category
      })
    })
    .then(res => res.json())
    .then((data) => {
      // console.log(data);
      searchContainer.innerHTML = `<h1>Upcoming Events</h1>`
      if (data.length < 1) {
        searchContainer.innerHTML += '<p>No results found</p>';
      } else {

        data.forEach(el => {
          searchContainer.innerHTML +=
            `<div class="event-card col-lg-8">
          <div class="card-image">
          <img src="../img/events/${el.event_image}" alt="Card image for: ${el.event_name}" />
        </div>
        <div class="card-content">
          <div class="card-title">${el.event_name}</div>
          <div class="card-description">
            ${truncate_text(el.event_description)} <a href="#">Find out more</a>
          </div>
          <div class="event-details">
            <p>${el.start_date}</p>
            <p>${el.suburb}</p>
            <p>${el.event_price}</p>
          </div>
          </div>
        </div>`
        });
      }
    });
}

searchBtn.addEventListener('click', (e) => {
  e.preventDefault();
  searchQuery.name = document.querySelector('.name-search').value;
  searchQuery.location = document.querySelector('.location-search').value;
  searchQuery.category = document.querySelector('.category-search').value;

  if (searchQuery.name === '' && searchQuery.location === '' && searchQuery.category === 'All') {
    searchResults('all');
  } else {
    searchResults('search');
  }
})

categoryList();

let truncate_text = (str, length, ending) => {
  if (length == null) {
    length = 150;
  }
  if (ending == null) {
    ending = '...';
  }
  if (str.length > length) {
    return str.substring(0, length - ending.length) + ending;
  } else {
    return str;
  }
};