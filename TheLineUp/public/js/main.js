const searchContainer = document.querySelector('.search-container');
const searchBtn = document.querySelector('.search-btn');
const categoryGridList = document.querySelectorAll('a.gallery');
const nameField = document.querySelector('.name-search');
const nameAutocomplete = document.querySelector('#name-autocomplete');
const locationField = document.querySelector('.location-search');
const locationAutocomplete = document.querySelector('#location-autocomplete');
let names;
let locations;
let searchQuery = [];
const baseUrl = window.location.origin;

//Add search functionality to category grid

categoryGridList.forEach(el => {
  el.addEventListener('click', (e) => {
    e.preventDefault();
    searchQuery.category = el.dataset.categoryId;
    searchResults('search');
  })
});

//Populate category options from database

let categoryList = () => {
  fetch(`${baseUrl}/events/categories`, {
      method: "post",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json"
      }
    })
    .then(res => res.json())
    .then((data) => {
      data.forEach(el => {
        document.querySelector('.category-search').innerHTML += `<option value=${el.category_id}>${el.name}</option>`;
      });
    })
}

//Search database from search input

let searchResults = (query) => {
  searchContainer.innerHTML = `<h1>Upcoming Events</h1>
                               <div class="lds-ring"><div></div><div></div><div></div><div></div></div>`;
  fetch(`${baseUrl}/events/${query}`, {
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
                ${truncate_text(el.event_description)} <a href="${baseUrl}/pages/event?id=${el.event_id}">Find out more</a>
              </div>
              <div class="event-details">
                <p>${el.start_date}</p>
                <p>${el.suburb}</p>
                <p>$${el.event_price}</p>
              </div>
              </div>
            </div>`
        });
      }
    });
}

//Add autocomplete to search fields from database

nameField.addEventListener('input', () => searchNames(nameField.value));
locationField.addEventListener('input', () => searchLocations(locationField.value));

const getNames = async () => {
  const res = await fetch(`${baseUrl}/events/eventNames`)
  names = await res.json();
}

const searchNames = input => {

  let matches = names.filter(name => {
    const regex = new RegExp(`^${input}`, 'gi');
    return name.event_name.match(regex);
  });

  if (input.length === 0) {
    matches = [];
    nameAutocomplete.innerHTML = '';
  }

  outputName(matches);
};

const getLocations = async () => {
  const res = await fetch(`${baseUrl}/events/locations`)
  locations = await res.json();
}

const searchLocations = input => {
  let matches = locations.filter(location => {
    const regex = new RegExp(`^${input}`, 'gi');
    return location.suburb.match(regex);
  });

  if (input.length === 0) {
    matches = [];
    locationAutocomplete.innerHTML = '';
  }

  outputLocation(matches);
  // console.log(matches);
};

const outputName = matches => {
  if (matches.length > 0) {
    const html = matches.map(match => `
      <div>${match.event_name}<div>
    `).join('');

    nameAutocomplete.innerHTML = html;
  }
}

const outputLocation = matches => {
  if (matches.length > 0) {
    const html = matches.map(match => `
      <div>${match.suburb}<div>
    `).join('');

    locationAutocomplete.innerHTML = html;
  }
}

//Add event listener if the button exists

if (searchBtn) {
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
}


if (categoryGridList.length > 0) {
  window.addEventListener('DOMContentLoaded', () => {
    getNames();
    getLocations();
    categoryList();
  });
}


//Truncate function to trim paragraph lengths

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