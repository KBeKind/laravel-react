import React from "react";
import { Droppable, Draggable } from "react-beautiful-dnd";
import DragDropSidebarSectionComponent from "./DragDropSidebarSectionComponent";

const DragDropSidebarComponent = ({ sections }) => {
    const half = Math.ceil(sections.length / 2);
    const firstColumnSections = sections.slice(0, half);
    const secondColumnSections = sections.slice(half);

    return (
        <div className="row p-2">
            <div className="col-md-6">
                {firstColumnSections.map((section) => (
                    <DragDropSidebarSectionComponent
                        key={section.id}
                        sectionId={section.id}
                        title={section.title}
                        items={section.items}
                    />
                ))}
            </div>
            <div className="col-md-6">
                {secondColumnSections.map((section) => (
                    <DragDropSidebarSectionComponent
                        key={section.id}
                        sectionId={section.id}
                        title={section.title}
                        items={section.items}
                    />
                ))}
            </div>
        </div>
    );
};

export default DragDropSidebarComponent;
