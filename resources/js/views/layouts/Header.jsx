import React from "react";
import '../../../css/NavBar.css'
class Header extends React.Component {
  render() {
    return(
      <header id="nav-wrapper">
      <nav id="nav">
        <div class="nav left">
          <span class="gradient skew"><h1 class="logo un-skew"><a href="#home">Logo Here</a></h1></span>
          <button id="menu" class="btn-nav"><span class="fas fa-bars"></span></button>
        </div>
        <div class="nav right">
          <a href="/home" class="nav-link active"><span class="nav-link-span"><span class="u-nav">Inicio</span></span></a>
          <a href="/acerca" class="nav-link"><span class="nav-link-span"><span class="u-nav">Acerca de</span></span></a>
          <a href="#work" class="nav-link"><span class="nav-link-span"><span class="u-nav">Trabajo</span></span></a>
          <a href="#contact" class="nav-link"><span class="nav-link-span"><span class="u-nav">Contact</span></span></a>
          <a href="/login" class="nav-link"><span class="nav-link-span"><span class="u-nav">Login</span></span></a>
        </div>
      </nav>
    </header>
    
    
    );
  }
}
export default Header;