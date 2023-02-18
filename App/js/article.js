
//Html for the appearnce of the articles should be dynammically created within this java script file
// fetch("https://newsapi.org/v2/top-headlines?country=us&category=health&apiKey=fa866543d18b41079d52374abb103298")
//     .then(response => {
//         if (response.status === 200) {
//             return response.json();
//         } else {
//             throw new Error("Failed to retrieve news article");
//         }
//     })
//     // .then(data => {
//     //     // Handle the response data and display the news articles
//     //     let html = "<ul>";
//     //     data.articles.forEach(article => {
//     //       html += `
//     //         <li>
//     //           <h3>${article.title}</h3>
//     //           <p>${article.description}</p>
//     //         </li>
//     //       `;
//     //     });
//     //     html += "</ul>";
//     //     document.getElementById("news-articles").innerHTML = html;
//     //   })
//     .then(data => {
//         // Loop through the articles array
//         data.articles.forEach(function(article) {
//             // Html for for the articles appearnece should be placed here  
//             //
//             // Extract the title, description, and image for each article
//             var title = article.title;
//             var description = article.description;
//             var image = article.urlToImage;

//             // Create a div to hold the article
//             var article_div = document.createElement("div");

//             // Create an h3 element for the title
//             var title_element = document.createElement("h3");
//             title_element.innerHTML = title;

//             // Create a p element for the description
//             var description_element = document.createElement("p");
//             description_element.innerHTML = description;

//             // Create an img element for the image
//             var image_element = document.createElement("img");
//             image_element.src = image;

//             // Append the title, description, and image to the article div
//             article_div.appendChild(title_element);
//             article_div.appendChild(description_element);
//             article_div.appendChild(image_element);

//             // Append the article div to the document
//             document.body.appendChild(article_div);
//         });
//     })
//   .catch(error => {
//     // Handle the error here
//     console.error(error);
//   });
// console.log("Fetching health articles...");
// fetch("https://newsapi.org/v2/top-headlines?country=us&category=health&apiKey=fa866543d18b41079d52374abb103298")
//   .then(response => {
//     if (response.status === 200) {
//       return response.json();
//     } else {
//       throw new Error("Failed to retrieve news articles");
//     }
//   })
//   .then(data => {
//     // Handle the response data and display the health articles
//     let html = "";
//     data.articles.forEach(article => {
//       // Only include articles with "health" in the category
//       if (article.category === "health") {
//         html += `
//           <div class="article">
//             <h3>${article.title}</h3>
//             <p>${article.description}</p>
//             <a href="${article.url}" target="_blank">Read More</a>
//           </div>
//         `;
//       }
//     });
//     document.getElementById("news-articles").innerHTML = html;
//   })
//   .catch(error => {
//     console.error(error);
//   });
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

				// Append the title and description to the text div
				text_div.appendChild(title_element);
				text_div.appendChild(description_element);

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