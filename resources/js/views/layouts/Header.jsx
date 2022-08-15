import React from "react";
import '../../../css/NavBar.css'
class Header extends React.Component {
  render() {
    return(
      <header id="nav-wrapper">
      <nav id="nav">
        <div className="nav left">
          <span className="gradient skew"><h1 className="logo un-skew"><a href="#home">Logo</a></h1></span>
          <button id="menu" className="btn-nav"><span className="fas fa-bars"></span></button>
        </div>
        <div className="nav right">
          <a href="/" className="nav-link active"><span className="nav-link-span"><span className="u-nav">Inicio</span></span></a>
          <a href="/acerca" className="nav-link"><span className="nav-link-span"><span className="u-nav">Acerca de</span></span></a>
          <a href="/prueba" className="nav-link"><span className="nav-link-span"><span className="u-nav">Trabajo</span></span></a>
          <a href="#contact" className="nav-link"><span className="nav-link-span"><span className="u-nav">Contact</span></span></a>
          <a href="/login" className="nav-link"><span className="nav-link-span"><span className="u-nav">Login</span></span></a>
        </div>
      </nav>
    </header>
    
    
    );
  }
}
export default Header;