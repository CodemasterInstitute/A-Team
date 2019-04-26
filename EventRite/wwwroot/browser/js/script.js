$(document).ready(function () {
  let locationArray = [];
  let nameArray = [];

  let renderEventCards = () => {

    $('#event-list').empty();

    if ($('#event-list').children().length == 0) {
      $('#event-list').append('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>');
    }
    searchQuery = [];
    searchQuery.push($('#eventName').val(), $('#eventLocation').val(), $('#eventCategory').val());
    $('#event-list').load("server/view-helper/search-results.php", {
      searchQuery: searchQuery,
      array: array
    });
  }

  renderEventCards();

  if (array) {
    array.forEach(el => {
      nameArray.push(el.event_name);
      locationArray.push(el.address);
    });

    $(".name-search").autocomplete({
      source: nameArray
    });

    $(".location-search").autocomplete({
      source: locationArray
    });
  }

  $('#search-btn').click(function (e) {
    e.preventDefault();
    renderEventCards();
  });

});