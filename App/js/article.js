// const observer = new IntersectionObserver((entries) => {
// 	enteries.forEach((entry) => {
// 		console.log(entry)
// 		if(entry.isIntersecting) {
// 			// entry.target.clssList.toggle('.show',entry.isIntersecting);
// 			entry.target.classList.add('show');
// 		} 
// 	});
// });

// const hiddenElements = document.querySelectorAll('.hidden');
// hiddenElements.forEach((el) => observer.observe(el));

fetch("https://newsapi.org/v2/top-headlines?country=us&apiKey=YOUR_API_KEY")
    .then(response => {
        if (response.status === 200) {
            return response.json();
        } else {
            throw new Error("Failed to retrieve news article")
        }
    })
    .then(response => response.json())
    .then(data => {
        // Loop through the articles array
        data.articles.forEach(function(article) {
        // Extract the title, description, and image for each article
        var title = article.title;
        var description = article.description;
        var image = article.urlToImage;

        // Create a div to hold the article
        var article_div = document.createElement("div");

        // Create an h3 element for the title
        var title_element = document.createElement("h3");
        title_element.innerHTML = title;

        // Create a p element for the description
        var description_element = document.createElement("p");
        description_element.innerHTML = description;

        // Create an img element for the image
        var image_element = document.createElement("img");
        image_element.src = image;

        // Append the title, description, and image to the article div
        article_div.appendChild(title_element);
        article_div.appendChild(description_element);
        article_div.appendChild(image_element);

        // Append the article div to the document
        document.body.appendChild(article_div);
    });
  })
  .catch(error => {
    // Handle the error here
    console.error(error);
  });