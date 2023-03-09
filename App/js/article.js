
// Ajax to retieve a users health conditions incase they want to see personalized articles
// $.ajax({
//   url: 'get_probs.php',
//   type: 'GET',
//   dataType: 'json',
//   success: function(response) {
//       $.each(response, function(index, prob) {
//           $('#user-prob').append('<li>' + prob.userID + ' - ' + prob.medical_problem + '</li>');
//       });
//   },
//   error: function(xhr, status, error) {
//       alert('Error: ' + error);
//   }
// });


// My own personal attempt at retrieving and parsing the json recieved from the database
// Ajax might not be needed since we can display the personalized articles as soon as they click the webpage
// fetch('get_probs.php')
// .then(response => {
// 	if (response.ok) {
// 		return response.json();
// 	}
// 	throw new Error('error retreiving data from get_probs');
// })
// .then(data => {
// })
// .catch(error => {
// 	console.error('Error:', error);
// });
var category;
$(document).ready(function() {
    $("#myInput").on("keyup", function() {
    category = $(this).val().toLowerCase();
    console.log(category);
    $(".dropdown-menu li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(category) > -1)
    });
  });
});

apikey = 'c87b1359e7115d43ca071dba973b1931';
// category = 'health';
url = 'https://gnews.io/api/v4/top-headlines?category=' + category + '&lang=en&country=us&max=10&apikey=' + apikey;

fetch(url)
.then(response => {
	// If the response is successful, parse the JSON data
	if (response.ok) {
		return response.json();
	}
	throw new Error('Network response was not ok.');
})
.then(data => {
	// Loop through the articles array
	data.articles.forEach(function(article) {
		// Extract the title, description, and image for each article
		var title = article.title;
		var description = article.description;
		var image = article.image;
		var url = article.url;

		// Create a div to hold the article
		var article_div = document.createElement("div");
		article_div.className = "article";

		// Create an img element for the image
		var image_element = document.createElement("img");
		image_element.src = image;

		// Create a div for the title and description
		var text_div = document.createElement("div");

		// Create an h3 element for the title
		var title_element = document.createElement("h3");
		title_element.innerHTML = title;

		// Create a p element for the description
		var description_element = document.createElement("p");
		description_element.innerHTML = description;

		// Create an element for the url
		var url_element = document.createElement("a");
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
})
.catch(error => {
	console.error('Error:', error);
});
