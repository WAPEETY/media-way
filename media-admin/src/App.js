import logo from './logo.svg';
import './App.css';
import{
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";

import Login from './pages/Login'
import NotFound from './pages/NotFound'
import Home from './pages/Home'
import Events_calendar from './pages/Events_calendar';
import Devices from './pages/Devices';

function App() {
  return (
    <Router>
      <Switch>
        <Route exact path="/login">
          <Login />
        </Route>
        <Route exact path="/">
          <Home />
        </Route>
        <Route exact path="/devices">
          <Devices /> 
        </Route>
        <Route exact path="/users">
          pagina per gestire utenti da accettare
          <users /> 
        </Route>
        <Route exact path="/event/:id">
          pagina lista dispositivi per ogni evento
          <event /> 
        </Route>
        <Route exact path="/events_calendar">
          <Events_calendar />
        </Route>
        <Route path="*">
          <NotFound />
        </Route>
      </Switch>
    </Router>
  );
}

export default App;
