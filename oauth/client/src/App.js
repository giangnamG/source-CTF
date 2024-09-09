import './App.css';
import 'bootstrap/dist/css/bootstrap.min.css';

import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';

import HomePage from './views/HomePage'
import NotFound from './views/NotFound'
import NavbarComponent from './components/NavbarComponent';

function App() {
  return (
    <div className='container'>
      <NavbarComponent />
      <Router>
        <Routes>
          <Route path="/" element={<HomePage />} />
          <Route path="*" element={<NotFound />} />
        </Routes>
      </Router>
    </div>
  );
}

export default App;
