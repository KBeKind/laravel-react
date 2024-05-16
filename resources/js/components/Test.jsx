import React from "react";
import ReactDOM from "react-dom/client";

const Test = () => {
    return <div>Test COMPONENTETSETTSETSET</div>;
};

export default Test;

if (document.getElementById("test")) {
    const Index = ReactDOM.createRoot(document.getElementById("test"));

    Index.render(
        <React.StrictMode>
            <Test />
        </React.StrictMode>
    );
}
