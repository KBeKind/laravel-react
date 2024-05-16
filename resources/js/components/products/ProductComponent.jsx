import React from "react";
import ReactDOM from "react-dom/client";

const ProductComponent = ({ product }) => {
    return (
        <div>
            <h2>PRODUCTS COMPONENT</h2>
            <strong>{product.name}</strong>
            <br />
            Count: {product.count}
            <br />
            Price: ${product.price}
            <br />
            Description: {product.description}
        </div>
    );
};

if (document.getElementById("productsIndex")) {
    const element = document.getElementById("productsIndex");
    const product = JSON.parse(element.dataset.product);

    const root = ReactDOM.createRoot(element);
    root.render(
        <React.StrictMode>
            <ProductComponent product={product} />
        </React.StrictMode>
    );
}
