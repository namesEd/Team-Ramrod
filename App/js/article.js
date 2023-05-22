let category = '';
var apikey = 'c87b1359e7115d43ca071dba973b1931';
var login;
class article extends HTMLElement{
    constructor(){
      super();
    }
  
    getLoginStatus() {
      login = this.getAttribute('loginStatus');
      return this.getAttribute('loginStatus');
    }
    
    connectedCallback(){
      $(document).ready(function() {
      //console.log("here")
        //console.log(getLoginStatus());
        console.log("login:",login);
        
        if (login == 1) {
          $.ajax({
          url: "get_user_medical_probs.php",
          method: "GET",
          dataType: "json",
          success: function(response) {
            console.log("user-medial-problems")
            console.log(response);
            $.each(response,function (index, medprob) {
              // console.log("index:", index, ", medprob:",medprob.medical_problem );
              $('#mySelect').append('<option value="' + medprob.medical_problem + '">'+ medprob.medical_problem + '</option>')
            });
          }
          })
        } else {
          $.ajax({
            url: "get_medical_probs.php",
            method: "GET",
            dataType: "json",
            success: function(response) {
              console.log("medical_problem")
              console.log(response);
              $.each(response,function (index, medprob) {
                // console.log("index:", index, ", medprob:",medprob.medical_problem );
                $('#mySelect').append('<option value="' + medprob.medical_problem + '">'+ medprob.medical_problem + '</option>')
              });
            }
          })
        }
 
        $('#mySelect').select2();
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
        //---------------------------------------Display articles without selecting  filter
        normal_articles('health');
      })        
      // console.log(this.getLoginStatus());
    }
}
    customElements.define('article-component', article);

//------------------------------------------------------------------------
// Functions for articles
//------------------------------------------------------------------------
function update_articles(category) {
  category = 'health AND '+ category;
  var url = 'https://gnews.io/api/v4/search?q=' + category + '&lang=en&country=us&max=10&apikey=' + apikey;
  //console.log(url);
  // Clear existing articles
  document.getElementById("articles").innerHTML = "";
  get_articles(url);
}

//Function retrieve normal articles-----------------------
function normal_articles(category) {
  //var url = 'https://newsapi.org/v2/everything?q=' + category + '&searchIn=description&sortBy=relevancy&apiKey=fa866543d18b41079d52374abb103298'
  var url = 'https://gnews.io/api/v4/top-headlines?category=' + category + '&lang=en&country=us&max=10&apikey=' + apikey;
  get_articles(url);
}


// function to retrieve articles------------------------------ 
function get_articles(url) {
  fetch(url)
    .then(function (response) {
      return response.json();
    })
    .then(function (data) {
      // var $art = $('#articles')
      articles = data.articles;
      var dynamic = document.querySelector('#articles');
      console.log(articles.length)
      for (i = 0; i < articles.length; i++) {
        var current_content = dynamic.innerHTML;
        // Html that will hold the article contents
        dynamic.innerHTML = `
        <div class="card">
          <img class="card-img" src="${articles[i].image}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"> ${articles[i].title} </h5>
            <p class="card-text">${articles[i].description}</p>
            <a href="${articles[i].url}" class="btn btn-primary"> Read More </a>
          </div>
        </div>` + current_content;
      }
    })
}

