import React from "react";
import { Droppable, Draggable } from "react-beautiful-dnd";
import DragDropSidebarSectionComponent from "./DragDropSidebarSectionComponent";

const DragDropSidebarComponent = ({ sections }) => {
    return (
        <div className="p-2">
            {sections.map((section) => (
                <DragDropSidebarSectionComponent
                    key={section.id}
                    sectionId={section.id}
                    title={section.title}
                    items={section.items}
                />
            ))}
        </div>
    );
};

export default DragDropSidebarComponent;
