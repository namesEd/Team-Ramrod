
// Html for the appearnce of the articles should be dynammically created within this java script file
fetch("https://newsapi.org/v2/top-headlines?country=us&apiKey=fa866543d18b41079d52374abb103298")
    .then(response => {
        if (response.status === 200) {
            return response.json();
        } else {
            throw new Error("Failed to retrieve news article");
        }
    })
    .then(data => {
        // Loop through the articles array
        data.articles.forEach(function(article) {
            // Html for for the articles appearnece should be placed here  
            //
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