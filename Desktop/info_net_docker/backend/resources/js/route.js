
import React from "react";
import ReactDOM from "react-dom";
import { BrowserRouter, Route, Switch } from "react-router-dom";
import ReactTest from "./pages/ReactTest";
import Home from './pages/Home';

function App() {
    return (
        <div>
            <Switch>
                <Route path='/reacttest' exact component={ReactTest} />
                <Route path='/' exact component={Home} />
            </Switch>
        </div>
    );
}

ReactDOM.render(
    <BrowserRouter>
        <App />
    </BrowserRouter>,
    document.getElementById("app")
);

