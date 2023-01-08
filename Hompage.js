//const { header } = require("express/lib/request");
// Class For Header that will be used 
class Header extends HTMLElement
{
    constructor(){
        super();
}
//Function that sets up everyting that is needed for the header
connectedCallback()
{
    this.innerHTML = `
    <header>
         <h1><span>RowdyHealth</span> </h1>
    <button id="navbut" onclick="openNav()"><i id="menu-bars" class="fa fa-bars" aria-hidden="true"> </i></button>
        </header>

<div id="mySidenav" class="sideNav">
<a href="javascript:void(0)" class="closeBtn" onclick="closeNav()">&times;</a>
<a href="#">About</a>
<a href="#">Services</a>
<a href="login.html">Login</a>
<a href="usrReg.html">Create an Account</a>
<a href="#">Contact</a>
</div>
`;
}
}
//Functions for opening and closing of the side nav bar
function openNav()
{
   document.getElementById("mySidenav").style.width = "250px";
}
function closeNav()
{
  document.getElementById("mySidenav").style.width = "0";
}

customElements.define('header-component', Header);

// Code for the google maps
function initMap()
{
  var options = {
    center:{lat: 35.368713, lng: -118.99526},
    zoom: 8
 };
  var map = new google.maps.Map(document.getElementById('map'), options);
};
