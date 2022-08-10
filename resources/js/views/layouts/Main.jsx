import React from "react"
import Header from "./Header"
import Footer from "./Footer"
class Main extends React.Component {
  render(){
    return (
      <>
        <Header />
        <main>{this.props.children}</main>
        <Footer />
      </>
    )
  }
}
export default Main;