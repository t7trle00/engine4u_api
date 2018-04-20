function getListing(format)
{
  alert('ok');
    /* this.format = format ; */
    var url = "http://localhost/engine4u_api/index.php/api/host/listing";
    /* url += '.'+ this.format ; */
 	var xhttp = new XMLHttpRequest();
    xhttp.open("GET", url,true);
    var jsonData = "" ;
    var cover_url = "http://localhost/engine4u_api/cover_gallery/" ;
    var data = '<table border="1" align="center" class="getListing">'+
                '<tr>'+
                    '<th>CarID</th>' +
                    '<th>TITLE</th>' +
                    '<th>COVER PHOTO</th>' +
                    '<th>CANCELLATION POLICY</th>' +
                    '<th>SHOW</th>'
                '</tr>' ;
    xhttp.onreadystatechange=function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            jsonData=JSON.parse(xhttp.responseText) ;
            for( x in jsonData)
            {
                data+=
                '<tr>'+
                '<td>'+  jsonData[x].carID + '</td>' +
                '<td>' + jsonData[x].title + '</td>' +
                '<td><img src="' + cover_url + jsonData[x].cover_photo + '" width="100px" height="100px"></td>' +
                '<td>' + jsonData[x].cancellation_policy + '</td>' +
                '<td><button class="btn btn-info" onclick="ShowSpeListing(' +
                        jsonData[x].carID + ')">SHOW</button></td>' +
                '</tr>' ;
            }
            data += '</table>' ;
            document.getElementById("results").innerHTML = data ;
        }
    }
    xhttp.send();
}
function getListingDelete(format)
{
      var url = "http://localhost/engine4u_api/index.php/api/host/listing";
   	  var xhttp = new XMLHttpRequest();
      xhttp.open("GET", url,true);
      var jsonData = "" ;
      var data = '<table border="1" align="center" class="getListing">'+
                  '<tr>'+
                      '<th>CarID</th>' +
                      '<th>TITLE</th>' +
                      '<th>DELETE</th>'
                  '</tr>' ;
      xhttp.onreadystatechange=function()
      {
          if(this.readyState == 4 && this.status == 200)
          {
              jsonData=JSON.parse(xhttp.responseText) ;
              for( x in jsonData)
              {
                  data+=
                  '<tr>'+
                  '<td>'+  jsonData[x].carID + '</td>' +
                  '<td>' + jsonData[x].title + '</td>' +
                  '<td><button class="btn btn-danger" onclick="deleteListing(' +
                          jsonData[x].carID + ')">DELETE</button></td>'
              } ;
              data += '</table>' ;
              document.getElementById("results").innerHTML = data ;
          }
      }
      xhttp.send();
}
function getListingUpdate(format)
{
      var url = "http://localhost/engine4u_api/index.php/api/host/listing";
   	  var xhttp = new XMLHttpRequest();
      xhttp.open("GET", url,true);
      var jsonData = "" ;
      var data = '<table border="1" align="center" class="getListing">'+
                  '<tr>'+
                      '<th>CarID</th>' +
                      '<th>TITLE</th>' +
                      '<th>EDIT</th>'
                  '</tr>' ;
      xhttp.onreadystatechange=function()
      {
          if(this.readyState == 4 && this.status == 200)
          {
              jsonData=JSON.parse(xhttp.responseText) ;
              for( x in jsonData)
              {
                  data+=
                  '<tr>'+
                  '<td>'+  jsonData[x].carID + '</td>' +
                  '<td>' + jsonData[x].title + '</td>' +
                  '<td><button class="btn btn-warning" onclick="deleteListing(' +
                          jsonData[x].carID + ')">EDIT</button></td>'
              } ;
              data += '</table>' ;
              document.getElementById("results").innerHTML = data ;
          }
      }
      xhttp.send();
}
function deleteListing(carID)
{
    this.del_id = carID ;
    var url = "http://localhost/engine4u_api/index.php/api/host/listing/carid/" + this.del_id ;
	var xhttp = new XMLHttpRequest();
    xhttp.open("DELETE", url,true);

    xhttp.onreadystatechange = function()
    {
        if(xhttp.readyState == 4 && xhttp.status == 200)
        {
            document.getElementById("results").innerHTML = "User deleted successfully" ;
        }
        else
        {
            document.getElementById("results").innerHTML = "Somthing went wrong" ;
        }
    } ;
    xhttp.send() ;
}
function ShowSpeListing(carID)
{
    this.carID = carID ;
    var url = "http://localhost/engine4u_api/index.php/api/host/listing/carid/" + this.carID ;
    var xhttp = new XMLHttpRequest() ;
    xhttp.open("GET",url,true) ;

    var jsonData = "" ;
    var data = "" ;
    var cover_url = "http://localhost/engine4u_api/cover_gallery/" ;
    var other_url = "http://localhost/engine4u_api/other_gallery/" ;
    xhttp.onreadystatechange = function()
    {
        if(xhttp.readyState == 4 && xhttp.status == 200)
        {

            jsonData= JSON.parse(xhttp.responseText) ;
                data += '<div style="text-align:center">' +
                        '<img src="' + cover_url + jsonData[0].cover_photo + '" width="900px" height="450px">' +
                        '</div>' +
                        '<div class="show_detail">' +
                        '<h2>' + jsonData[0].title + '</h2>' +
                        '<h3>DESCRIPTION  </h3>' +
                        jsonData[0].description + '<br>' +
                        '<h3>OTHER PHOTOS</h3>' ;
                        for (x in jsonData)
                        {
                           data += '<img src="' + other_url + jsonData[x].photo + '" width="300px" height="300px">' + '<br>' ;
                        }

                        data +=
                        '<h3>TYPE OF CAR </h3>' + jsonData[0].type_of_car + '<br>' +
                        '<h3>YEAR </h3>' + jsonData[0].year + '<br>' +
                        '<h3>CANCELLATION POLICY </h3>' + jsonData[0].cancellation_policy +
                        '</div>';
            document.getElementById('results').innerHTML = data ;
        }
        else
        {
            document.getElementById('results').innerHTML = 'SOME THING WRONG' ;
        }
    }
    xhttp.send() ;
}

function AddListing()
{
    var url = "http://localhost/engine4u_api/index.php/api/host/listing";
	var xhttp = new XMLHttpRequest();
    xhttp.open("POST", url,true);
    var form = document.getElementById("AddForm") ;
    var formData = new FormData(form) ;
    xhttp.onreadystatechange = function()
    {
        if(xhttp.readyState == 4 && xhttp.status == 201)
        {
            alert('You have added a new car for rent') ;
            location.reload() ;
        }
        // else
        // {
        //     alert('Your car has not been added successfully. Try again') ;
        //     location.reload() ;
        // }
    }
    xhttp.send(formData) ;
}

function GetUpdateListing(carID,title,description,cover_photo,photo,type_of_car,year,cancellation_policy)
{
    this.carID = carID ;
    this.title = title ;
    this.description = description ;
    this.cover_photo = cover_photo ;
    this.other_photo = photo ;
    this.type_of_car = type_of_car ;
    this.year = year ;
    this.cancellation_policy = cancellation_policy ;

    var cover_url = "http://localhost/engine4u_api/cover_gallery/" ;
    var other_url = "http://localhost/engine4u_api/other_gallery/" ;

    var formData = '<form enctype="multipart/form-data" method="post" id="UpdateForm">' +
              '<input type="text" id="title" value="'+this.title+'">' + '<br>' +
              '<label>DESCRIPTION </label>' +
              '<textarea id="description" cols="30" rows="10">'+this.description+'</textarea>' + '<br>' +

              '<label>COVER PHOTO </label>' +
              '<img src="'+cover_url + this.cover_photo + '" width ="300px" height="300px">' +
              '<input type="file" id="cover_photo_update" name="cover_photo">' + '<br>' +

              '<label>OTHER PHOTO </label>' +
              '<img src="'+other_url + this.other_photo + '" width ="300px" height="300px">' +
              '<input type="file" multiple name="other_photo_update[]">' + '<br>' +

              '<label>TYPE OF CAR </label>' +
              '<input type="text" id="type_of_car" value="'+this.type_of_car+'">' + '<br>' +
              '<label>YEAR </label>' +
              '<input type="number" id="year" value="'+this.year+'">' + '<br>' +
              '<label>CANCELLATION POLICY </label>' +
              '<input type="text" id="cancellation_policy" value="'+this.cancellation_policy+'">' + '<br>' +
              '</form>'+
                '<button onclick="UpdateListing('+carID+')">UPDATE</button>';

    document.getElementById('results').innerHTML = formData ;

}
function addCover(carID)
{
    this.carID = carID ;
    var url = "http://localhost/engine4u_api/index.php/api/host/cover/carid/" + this.carID;
    var xhttp = new XMLHttpRequest();
    var cover = document.getElementById('UpdateForm') ;
    //this.cover=formData;
    var form = new FormData(cover) ;
    xhttp.open("POST", url,true);
/*     var cover_photo = document.getElementById("cover_photo_update").value ; */
    xhttp.onreadystatechange = function()
    {
        if(xhttp.readyState == 4 && xhttp.status == 201)
        {
            document.getElementById("results").innerHTML = "Cover photo added successfully" ;
        }
        else
        {
            document.getElementById("results").innerHTML = "stucked" ;
        }
    }
    xhttp.send(form) ;
}
function UpdateListing(carID)
{
    this.carID = carID
    var url = "http://localhost/engine4u_api/index.php/api/host/listing/carid/" + carID;
	var xhttp = new XMLHttpRequest();
    xhttp.open("PUT", url,true);

    var data = {} ;
    /* data.id=parseInt(document.getElementById("update_id").value) ; */
    data.title = document.getElementById("title").value ;
    data.description = document.getElementById("description").value ;
    data.cover_photo = document.getElementById("cover_photo_update").value ;
    /* data.photo = document.getElementById("other_photo[]").value ; */
    data.type_of_car = document.getElementById("type_of_car").value ;
    data.year = document.getElementById("year").value ;
    data.cancellation_policy = document.getElementById("cancellation_policy").value ;

    var jsonData = JSON.stringify(data) ;

    xhttp.onreadystatechange = function()
    {
        if(xhttp.readyState == 4 && xhttp.status == 201)
        {
            document.getElementById("results").innerHTML = "Listing updated successfully" ;
        }
        else
        {
            document.getElementById("results").innerHTML = "Somthing went wrong" ;
        }
    }
    xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhttp.send(jsonData) ;
    //addCover(carID);
}
