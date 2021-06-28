import React from 'react';
import './App.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import Particles from 'react-particles-js';
import Navbar from './components/Navbar';
import Header from './components/Header';
import Main from './components/Main';
import Services from './components/Services';
import Exp from './components/Exp';
import Portfolio from './components/Portfolio';
import Contact from './components/Contact';
import FooterPage from './components/FooterPage';

function App() {
  return (
    <>
    <div className="backcolor"></div>
    <Navbar />
    <Header />
    <Main />
    <Services />
    <Exp />
    <Portfolio />
    <Contact />
    <FooterPage />
    
    </>
    
  );
}


export default App;
