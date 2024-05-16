import React from "react";
import ReactDOM from "react-dom/client";

const ProductsComponent = ({ products }) => {
    return (
        <div>
            <h2>PRODUCTS COMPONENT</h2>
            <ul>
                {products.map((product) => (
                    <li key={product.id}>
                        <strong>{product.name}</strong>
                        <br />
                        Count: {product.count}
                        <br />
                        Price: ${product.price}
                        <br />
                        Description: {product.description}
                    </li>
                ))}
            </ul>
        </div>
    );
};

if (document.getElementById("productsIndex")) {
    const element = document.getElementById("productsIndex");
    const products = JSON.parse(element.dataset.products);

    const root = ReactDOM.createRoot(element);
    root.render(
        <React.StrictMode>
            <ProductsComponent products={products} />
        </React.StrictMode>
    );
}
