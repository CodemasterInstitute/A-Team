const searchContainer = document.querySelector(".search-container");
const searchBtn = document.querySelector(".search-btn");
const categoryGridList = document.querySelectorAll("a.gallery");
const nameField = document.querySelector(".name-search");
const nameAutocomplete = document.querySelector("#name-autocomplete");
const locationField = document.querySelector(".location-search");
const locationAutocomplete = document.querySelector("#location-autocomplete");
let names;
let locations;
let searchQuery = [];
const baseUrl = window.location.origin;

//Add search functionality to category grid

categoryGridList.forEach(el => {
  el.addEventListener("click", e => {
    e.preventDefault();
    searchQuery.category = el.dataset.categoryId;
    searchResults("search");
  });
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
    .then(data => {
      data.forEach(el => {
        document.querySelector(
          ".category-search"
        ).innerHTML += `<option value=${el.category_id}>${el.name}</option>`;
      });
    });
};

//Search database from search input

let searchResults = query => {
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
    .then(data => {
      searchContainer.innerHTML = `<h1>Upcoming Events</h1>`;
      if (data.length < 1) {
        searchContainer.innerHTML += "<p>No results found</p>";
      } else {
        data.forEach(el => {
          searchContainer.innerHTML += `<div class="event-card col-lg-8">
              <div class="card-image">
              <img src="../img/events/${el.event_image}" alt="Card image for: ${
            el.event_name
          }" />
            </div>
            <div class="card-content">
              <div class="card-title">${el.event_name}</div>
              <div class="card-description">
                ${truncate_text(
                  el.event_description
                )} <a href="${baseUrl}/pages/event?id=${
            el.event_id
          }">Find out more</a>
              </div>
              <div class="event-details">
                <p>${el.start_date}</p>
                <p>${el.suburb}</p>
                <p>$${el.event_price}</p>
              </div>
              </div>
            </div>`;
        });
      }
    });
};

//Add autocomplete to search fields from database
if (nameField) {
  nameField.addEventListener("input", () => searchNames(nameField.value));
  locationField.addEventListener("input", () =>
    searchLocations(locationField.value)
  );
}


const getNames = async () => {
  const res = await fetch(`${baseUrl}/events/eventNames`, {
    method: "post",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json"
    }
  });
  names = await res.json();
};

const searchNames = input => {
  let matches = names.filter(name => {
    const regex = new RegExp(`^${input}`, "gi");
    return name.event_name.match(regex);
  });

  if (input.length === 0) {
    matches = [];
    nameAutocomplete.innerHTML = "";
  }

  outputName(matches);
  let nameOptions = document.querySelectorAll(".autocomplete-name");

  nameOptions.forEach(el => {
    el.addEventListener("click", () => {
      // console.log(el.previousSibling);
      nameField.value = el.innerHTML;
      nameAutocomplete.innerHTML = "";
    });
  });
};

const getLocations = async () => {
  const res = await fetch(`${baseUrl}/events/locations`, {
    method: "post",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json"
    }
  });
  locations = await res.json();
};

const searchLocations = input => {
  let matches = locations.filter(location => {
    const regex = new RegExp(`^${input}`, "gi");
    return location.suburb.match(regex);
  });

  if (input.length === 0) {
    matches = [];
    locationAutocomplete.innerHTML = "";
  }

  outputLocation(matches);
  let locationOptions = document.querySelectorAll(".autocomplete-location");

  locationOptions.forEach(el => {
    el.addEventListener("click", () => {
      // console.log(el.previousSibling);
      locationField.value = el.innerHTML;
      locationAutocomplete.innerHTML = "";
    });
  });
};

const outputName = matches => {
  if (matches.length > 0) {
    const html = matches
      .map(
        match => `
      <div class="autocomplete-name">${match.event_name}</div>
    `
      )
      .join("");

    nameAutocomplete.innerHTML = html;
  }
};

const outputLocation = matches => {
  if (matches.length > 0) {
    const html = matches
      .map(
        match => `
      <div class="autocomplete-location">${match.suburb}</div>
    `
      )
      .join("");

    locationAutocomplete.innerHTML = html;
  }
};

window.addEventListener("keydown", e => {
  if (e.keyCode === 9) {
    if (nameField === document.activeElement && nameAutocomplete.children.length > 0) {
      nameAutocomplete.innerHTML = '';
    }
    if (locationField === document.activeElement && locationAutocomplete.children.length > 0) {
      locationAutocomplete.innerHTML = '';
    }
  }

  switch (e.keyCode) {
    case 38:
      moveUp();
      break;
    case 40:
      moveDown();
      break;
  }
});

let moveUp = () => {
  let list;
  if (nameField === document.activeElement) {
    list = nameAutocomplete.children;
  }
  if (locationField === document.activeElement) {
    list = locationAutocomplete.children;
  }
  list = Array.from(list);
  for (let i = 0; i < list.length; i++) {
    if (!list[i].nextElementSibling && !list[i].classList.contains('selected-check')) {
      list[i].classList.add('selected');
      return;
    }
    if (list[i].nextElementSibling && list[i].nextElementSibling.classList.contains('selected')) {
      list[i].classList.add('selected');
      list[i].nextElementSibling.classList.remove('selected');
      return;
    }
    if (list.length === 1) {
      list[i].classList.toggle('selected');
      return;
    }
    if (!list[i].previousElementSibling && list[i].classList.contains('selected')) {
      list[list.length - 1].classList.add('selected');
      list[i].classList.remove('selected');
      return;
    }
  };
};

let moveDown = () => {
  let list;
  if (nameField === document.activeElement) {
    list = nameAutocomplete.children;
  }
  if (locationField === document.activeElement) {
    list = locationAutocomplete.children;
  }
  list = Array.from(list);
  for (let i = 0; i < list.length; i++) {
    if (!list[i].previousElementSibling && !list[i].classList.contains('selected-check')) {
      list[i].classList.add('selected');
      list[i].classList.add('selected-check');
      return;
    }
    if (list[i].previousElementSibling && list[i].previousElementSibling.classList.contains('selected')) {
      list[i].classList.add('selected');
      list[i].previousElementSibling.classList.remove('selected');
      return;
    }
    if (list.length === 1) {
      list[i].classList.toggle('selected');
      return;
    }
    if (!list[i].nextElementSibling) {
      list[0].classList.add('selected');
      list[i].classList.remove('selected');
      return;
    }
  };
};

//Add event listener if the button exists

if (searchBtn) {
  searchBtn.addEventListener("click", e => {
    e.preventDefault();
    searchQuery.name = document.querySelector(".name-search").value;
    searchQuery.location = document.querySelector(".location-search").value;
    searchQuery.category = document.querySelector(".category-search").value;

    if (
      searchQuery.name === "" &&
      searchQuery.location === "" &&
      searchQuery.category === "All"
    ) {
      searchResults("all");
    } else {
      searchResults("search");
    }
  });
  document.addEventListener('keypress', (e) => {
    if (e.keyCode === 13) {
      if (nameField === document.activeElement && nameAutocomplete.children.length > 0) {
        if (document.querySelector('.selected')) {
          e.preventDefault();
          nameField.value = document.querySelector('.selected').innerHTML;
        }
        nameAutocomplete.innerHTML = '';
      }
      if (locationField === document.activeElement && locationAutocomplete.children.length > 0) {
        if (document.querySelector('.selected')) {
          e.preventDefault();
          locationField.value = document.querySelector('.selected').innerHTML;
        }
        locationAutocomplete.innerHTML = '';
      }

    }
  });
  document.addEventListener('click', () => {
    if (nameField === document.activeElement) {
      locationAutocomplete.innerHTML = '';
    }
    if (locationField === document.activeElement) {
      nameAutocomplete.innerHTML = '';
    }
  });

}

if (categoryGridList.length > 0) {
  window.addEventListener("DOMContentLoaded", () => {
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
    ending = "...";
  }
  if (str.length > length) {
    return str.substring(0, length - ending.length) + ending;
  } else {
    return str;
  }
};