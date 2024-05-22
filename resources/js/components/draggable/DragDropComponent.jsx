import React, { useState } from "react";
import ReactDOM from "react-dom/client";
import { DragDropContext } from "react-beautiful-dnd";
import DragDropSidebarComponent from "./sidebar/DragDropSidebarComponent";
import DragDropAreaComponent from "./dragDropArea/DragDropAreaComponent";

const DragDropComponent = () => {
    const masterSidebarSections = [
        {
            id: "custom-section",
            title: "Custom",
            items: [
                { id: "custom-1", content: "Recharge", type: "custom" },
                { id: "custom-2", content: "Setup", type: "custom" },
                { id: "custom-3", content: "XXXXX", type: "custom" },
            ],
        },
        {
            id: "taxes-section",
            title: "Taxes",
            items: [
                { id: "taxes-1", content: "TaxJar", type: "taxes" },
                { id: "taxes-2", content: "Avalara", type: "taxes" },
                { id: "taxes-3", content: "QuickBooks", type: "taxes" },
            ],
        },
        {
            id: "shipping-section",
            title: "Shipping",
            items: [
                { id: "shipping-1", content: "ShipStation", type: "shipping" },
                { id: "shipping-2", content: "Sendcloud", type: "shipping" },
                { id: "shipping-3", content: "Shippo", type: "shipping" },
            ],
        },
        {
            id: "payment-section",
            title: "Payment",
            items: [
                { id: "payment-1", content: "Square", type: "payment" },
                { id: "payment-2", content: "Stripe", type: "payment" },
                { id: "payment-3", content: "Clover", type: "payment" },
            ],
        },
    ];
    const [sidebarSections, setSidebarSections] = useState(
        masterSidebarSections
    );

    const [mainAreaSections, setMainAreaSections] = useState([
        {
            id: "main-custom-section",
            title: "Custom",
            type: "custom",
            items: [],
        },
        {
            id: "main-taxes-section",
            title: "Taxes",
            type: "taxes",
            items: [],
        },
        {
            id: "main-shipping-section",
            title: "Shipping",
            type: "shipping",
            items: [],
        },
        {
            id: "main-payment-section",
            title: "Payment",
            type: "payment",
            items: [],
        },
    ]);

    const filterSidebarSections = (mainAreaSections) => {
        const mainAreaItemIds = mainAreaSections.flatMap((section) =>
            section.items.map((item) => item.id)
        );
        return masterSidebarSections.map((section) => ({
            ...section,
            items: section.items.filter(
                (item) => !mainAreaItemIds.includes(item.id)
            ),
        }));
    };

    const onDragEnd = (result) => {
        const { source, destination } = result;

        if (!destination) return;

        const sourceSections = source.droppableId.startsWith("main-")
            ? Array.from(mainAreaSections)
            : Array.from(sidebarSections);
        const destSections = destination.droppableId.startsWith("main-")
            ? Array.from(mainAreaSections)
            : Array.from(sidebarSections);

        const sourceSectionIndex = sourceSections.findIndex(
            (section) => section.id === source.droppableId
        );
        const destSectionIndex = destSections.findIndex(
            (section) => section.id === destination.droppableId
        );

        if (sourceSectionIndex === -1 || destSectionIndex === -1) return;

        const [movedItem] = sourceSections[sourceSectionIndex].items.splice(
            source.index,
            1
        );

        let replacedItem = null;
        if (destination.droppableId.startsWith("main-")) {
            if (destSections[destSectionIndex].items.length > 0) {
                replacedItem = destSections[destSectionIndex].items.splice(
                    0,
                    1
                )[0];
            }
        }

        destSections[destSectionIndex].items.splice(
            destination.index,
            0,
            movedItem
        );

        setMainAreaSections((mainAreaSections) =>
            destination.droppableId.startsWith("main-")
                ? destSections
                : sourceSections
        );

        // Update the sidebar sections based on the items in the main area
        setSidebarSections(filterSidebarSections(destSections));
    };

    return (
        <DragDropContext onDragEnd={onDragEnd}>
            <div className="container">
                <div className="row">
                    <div className="col-md-2">
                        <DragDropSidebarComponent sections={sidebarSections} />
                    </div>
                    <div className="col-md-6">
                        <div className="circular-container">
                            <DragDropAreaComponent
                                sections={mainAreaSections}
                            />
                        </div>
                    </div>
                </div>
            </div>
        </DragDropContext>
    );
};

export default DragDropComponent;

if (document.getElementById("dragDropComponent")) {
    const Index = ReactDOM.createRoot(
        document.getElementById("dragDropComponent")
    );
    Index.render(<DragDropComponent />);
}
