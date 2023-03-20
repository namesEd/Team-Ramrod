let category = '';
var apikey = 'c87b1359e7115d43ca071dba973b1931';

// functionality of filter box
$(document).ready(function() {
  console.log("here")
  $.ajax({
    url: "get_medical_probs.php",
    method: "GET",
    dataType: "json",
    success: function(response) {
      console.log("here2")
      console.log(response);
      $.each(response,function (index, medprob) {
        console.log("index:", index, ", medprob:",medprob.medical_problem );
        $('#mySelect').appened('<option value="' + medprob.medical_problem + '">'+ medprob.medical_problem + '</option>')
      });
    }
  })
  // Initialize Select2
  $('#mySelect').select2();

  // Add search placeholder
  $('.select2-search__field').attr('placeholder', 'Search...');

  // Filter options based on search query
  $('#mySelect').on('select2:open', function() {
    $('.select2-results__options').on('keyup', function() {
      var query = $('.select2-search__field').val().toLowerCase();
      $('.select2-results__options').find('li').each(function() {
        var text = $(this).text().toLowerCase();
        if (text.indexOf(query) > -1) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    });
  });

  // Get selected option value
  $('#mySelect').on('change', function() {
    category = $('#mySelect').val();
    $('#category').text('You selected ' + category);
    //console.log(category);
    update_articles(category);
  });
  //normal_articles('health');
})

//------------------------------------------------------------------------
// Functions for articles
//------------------------------------------------------------------------
// url = 'https://gnews.io/api/v4/top-headlines?category=' + 'health' + '&lang=en&country=us&max=10&apikey=' + apikey;
function update_articles(category) {
  //console.log("entered update_articles");
  //console.log("update_articles:", category);
  
  category = 'health AND '+ category;
  //console.log("update_articles new category: ", category);
  var url = 'https://gnews.io/api/v4/search?q=' + category + '&lang=en&country=us&max=10&apikey=' + apikey;
  //console.log(url);
  // Clear existing articles
  document.getElementById("articles").innerHTML = "";
  get_articles(url);
}

//Function retrieve normal articles-----------------------
function normal_articles(category) {
  var url = 'https://gnews.io/api/v4/top-headlines?category=' + category + '&lang=en&country=us&max=10&apikey=' + apikey;
  get_articles(url);
}


// function to retrieve articles------------------------------ 
// console.log(url);
function get_articles(url) {
  console.log("caling url");
  // Create a new XMLHttpRequest object
  const xhr = new XMLHttpRequest();
  
  // Initialize a GET request with the specified URL
  xhr.open('GET', url);

  // Set up a callback function to execute when the server responds
  xhr.onload = function() {
    // Check if the response was successful
    if (xhr.status === 200) {
      // Parse the JSON response
      const data = JSON.parse(xhr.responseText);

      // Loop through the articles array
      data.articles.forEach(function(article) {
        // Extract the title, description, and image for each article
        const title = article.title;
        const description = article.description;
        const image = article.image;
        const url = article.url;

        // Create a div to hold the article
        const article_div = document.createElement("div");
        article_div.className = "article";

        // Create an img element for the image
        const image_element = document.createElement("img");
        image_element.src = image;

        // Create a div for the title and description
        const text_div = document.createElement("div");

        // Create an h3 element for the title
        const title_element = document.createElement("h3");
        title_element.innerHTML = title;

        // Create a p element for the description
        const description_element = document.createElement("p");
        description_element.innerHTML = description;

        // Create an element for the url
        const url_element = document.createElement("a");
        url_element.href = url;
        url_element.innerHTML = "Read More"

        // Append the title, description, and url to the text div
        text_div.appendChild(title_element);
        text_div.appendChild(description_element);
        text_div.appendChild(url_element);

        // Append the image and text div to the article div
        article_div.appendChild(image_element);
        article_div.appendChild(text_div);

        // Append the article div to the document
        document.getElementById("articles").appendChild(article_div);
      });
    } else {
      // If the response was not successful, log an error message
      console.error('Error:', xhr.statusText);
    }
  };

  // Send the request to the server
  xhr.send();
}
