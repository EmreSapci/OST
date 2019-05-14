var page = 0;

function getEvents(page) {

  $('#events-panel').show();
  $('#attraction-panel').hide();

  if (page < 0) {
    page = 0;
    return;
  }
  if (page > 0) {
    if (page > getEvents.json.page.totalPages-1) {
      page=0;
      return;
    }
  }
  
  $.ajax({
    type:"GET",
	//Her bir sayfadaki event sayısı size ile belirleniyor.
	//&keyword= ile gelen kelime search için kullanılır.
    url:"https://app.ticketmaster.com/discovery/v2/events.json?apikey=6ZaPohqMGa8hTm7s3F4nuzmk2J29DzD4&size=5&page="+page,
    async:true,
    dataType: "json",
    success: function(json) {
          getEvents.json = json;
  			  showEvents(json);
  		   },
    error: function(xhr, status, err) {
  			  console.log(err);
  		   }
  });
}

function showEvents(json) {
  var items = $('#events .list-group-item');
  items.hide();
  var events = json._embedded.events;
  var item = items.first();
    
  $('.loading').hide();   
  $('.panel-body').show();
  
  for (var i=0;i<events.length;i++) {
    item.children('.list-group-item-heading').text(events[i].name);
    item.children('.list-group-item-text').text(events[i].dates.start.localDate);
    try {
      item.children('.venue').text(events[i]._embedded.venues[0].name + " in " + events[i]._embedded.venues[0].city.name);
    } catch (err) {
      console.log(err);
    }
    item.show();
    item.off("click");
    item.click(events[i], function(eventObject) {
      console.log(eventObject.data);
      try {
        getAttraction(eventObject.data._embedded.attractions[0].id, eventObject.data.dates.start.localDate);
      } catch (err) {
      console.log(err);
      }
    });
    item=item.next();
  }
}

$('#prev').click(function() {
  getEvents(--page);
});

$('#next').click(function() {
  getEvents(++page);
});

function getAttraction(id,date) {
  $.ajax({
    type:"GET",
    url:"https://app.ticketmaster.com/discovery/v2/attractions/"+id+".json?apikey=6ZaPohqMGa8hTm7s3F4nuzmk2J29DzD4",
    async:true,
    dataType: "json",
    success: function(json) {
          showAttraction(json,date);
  		   },
    error: function(xhr, status, err) {
  			  console.log(err);
  		   }
  });
}




function showAttraction(json,date) {
  $('#events-panel').hide();
  $('#attraction-panel').show();
  
  $('#back-all-list').click(function() {
    getEvents(page);
  });
  
  var jsonDetailed = json;
  var sellingMessage = "Purchase Completed Successfully";
  
  $('#attraction .list-group-item-heading').first().text(jsonDetailed.name);
  $('#attraction img').first().attr('src',jsonDetailed.images[0].url);
  $('#classification').text(jsonDetailed.classifications[0].segment.name + " - " + jsonDetailed.classifications[0].genre.name + " - " + jsonDetailed.classifications[0].subGenre.name);
  
  
  $('#buyButton').click(function() {				
                $.ajax({
                type: "POST",
                url: "insert.php",
                data: 'att_name=' + jsonDetailed.name+ '&att_detail=' + jsonDetailed.classifications[0].segment.name + '&att_date=' + date,
                success: function(result) {
                   //alert(date);
				   setTimeout(function() {
					  window.location.href = "index.php";
					}, 3000);
                }
            });
  }); 
}

getEvents(page);