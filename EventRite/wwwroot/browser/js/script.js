$(document).ready(function() {
  let locationArray = [];
  let nameArray = [];

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
});
