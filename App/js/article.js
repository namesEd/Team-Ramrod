
// Make a request to the News API for health articles
fetch('https://newsapi.org/v2/top-headlines?q=health&apiKey=fa866543d18b41079d52374abb103298')
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
		var image = article.urlToImage;
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

// Needed search bar for people can see what types of articles to view
// document.querySelector('form').addEventListener('submit', function(e) {
// 	e.preventDefault();
// 	let searchInput = document.querySelector('#search-input').value;
// 	// perform search using the searchInput value
//   });
  