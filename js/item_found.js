function loadData(page) {
  var form = document.getElementById("filterForm");
  var formData = new FormData(form);
  formData.append("page", page);

  var xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    "../actions/retrieve_item_found.php?" +
    new URLSearchParams(formData).toString(),
    true
  );
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log(xhr.responseText);
      var itemsContainer = document.querySelector(".lost");
      itemsContainer.innerHTML = "";
      var items = JSON.parse(xhr.responseText);
      items.forEach(function (item) {
        var itemHTML =
          '<div class="item">' +
          '<img src="../uploads/' + item.file_name +
          '" alt=Item Image" class="image">' +
          '<h3><a href="../view/items_details_found.php?itemid=' +
          item.itemid +
          '">' +
          item.item_name +
          "</a></h3>" +
          "<p>" +
          item.description +
          "</p>" +
          "<p> Status: " +
          item.sname +
          "</p>" +
          // '<p>' + item.interaction_time + '</p>' +
          "</div>";
        itemsContainer.innerHTML += itemHTML;
      });
    }
  };
  xhr.send();
}
