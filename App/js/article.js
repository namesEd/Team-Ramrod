apikey = 'c87b1359e7115d43ca071dba973b1931';
category = 'health';
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
// apikey = 'c87b1359e7115d43ca071dba973b1931';
// category = 'general';
// url = 'https://gnews.io/api/v4/top-headlines?category=' + category + '&lang=en&country=us&max=10&apikey=' + apikey;

// fetch(url)
//   .then(function (response) {
//     return response.json();
//   })
//   .then(function (data) {
//     articles = data.articles;

//     for (i = 0; i < articles.length; i++) {
//       // articles[i].title
//       console.log("Title: " + articles[i]['title']);
//       // articles[i].description
//       console.log("Description: " + articles[i]['description']);
//       // You can replace {property} below with any of the article properties returned by the API.
//       // articles[i].{property}
//       // console.log(articles[i]['{property}']);

//       // Delete this line to display all the articles returned by the request. Currently only the first article is displayed.
//       break;
//     }
//   });