import React from 'react';
import ReactDOM from 'react-dom/client';
import ReactRouter from "./ReactRouter";

function Layout() {
  return (
    <div>
        <div className="layout-w">
            <ReactRouter />
        </div>
    </div>
  );
}

export default Layout;

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
    <React.StrictMode>
        <Layout />
    </React.StrictMode>
);
