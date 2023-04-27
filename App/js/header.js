/************BEGINNING OF HEADER CLASS AND FUNCTION****************/

// Class For Header that will be used 
class Header extends HTMLElement{
    constructor(){
      super();
    }
  
    getLoginStatus() {
      return this.getAttribute('loginStatus');
    }
  
    //Function that sets up everyting that is needed for the header
    connectedCallback(){
      
      
      let html = `
      <header>
      <h1><span>RowdyHealth</span> </h1>
      <button id="navbut" onclick="openNav()"><i id="menu-bars" class="fa fa-bars" aria-hidden="true"> </i></button>
      </header>
      
      <div id="mySidenav" class="sideNav">
      <a href="javascript:void(0)" class="closeBtn" onclick="closeNav()">&times;</a>
      <a href="home.php">Home</a>
      <a href="display_articles.php">Articles</a>
      <a href="vendor_reg.php">Vendors</a>
      <a href="about.php">About Us</a>
      `;
        
      console.log(this.getLoginStatus());
      if (this.getLoginStatus() == true) {
        html += `<a href="user_profile.php">Profile</a>`
        html += `<a href="logout.php">Logout</a>`;
      } else {
        html +=`<a href="user_login.php">Login</a>`;
      }
          
      html += `</div>`;
      this.innerHTML = html;
      
  
    }
  }
  //Functions for opening and closing of the side nav bar
  function openNav(){
    document.getElementById("mySidenav").style.width = "250px";
  }
  function closeNav(){
    document.getElementById("mySidenav").style.width = "0";
  }
  
  customElements.define('header-component', Header);
  
  // customElements.define('header-component', Header);
  /********** End OF HEADER ****************/