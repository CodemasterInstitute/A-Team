<div class="search-sec">
  <div class="container">
    <form action="index.php" method="post" novalidate="novalidate">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
              <input type="text" name="eventName" class="form-control search-field name-search"
                placeholder="Event Name" autocomplete="off">
                <div id="name-autocomplete" class="hidden"></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
              <input type="text" name="eventLocation" class="form-control search-field location-search"
                placeholder="City">
                <div id="location-autocomplete" class="hidden"></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
              <select name="category" class="form-control search-field category-search" id="exampleFormControlSelect1">
                <option>All</option>
              </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
              <button name="submit" type="submit" value="submit" class="btn btn-danger wrn-btn search-btn">Search</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>