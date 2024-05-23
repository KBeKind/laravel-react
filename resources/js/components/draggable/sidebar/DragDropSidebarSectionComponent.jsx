import React from "react";
import DragDropSidebarSectionItemComponent from "./DragDropSidebarSectionItemComponent";
import { Droppable, Draggable } from "react-beautiful-dnd";

const DragDropSidebarSectionComponent = ({ sectionId, title, items }) => {
    return (
        <div className="bg-secondary p-2 text-center dragDropSidebarSection">
            <h6>{title}</h6>
            <Droppable
                droppableId={sectionId}
                type={items[0].type}
                isDropDisabled={true}
            >
                {(provided) => (
                    <div {...provided.droppableProps} ref={provided.innerRef}>
                        {items.map((item, index) => (
                            <Draggable
                                key={item.id}
                                draggableId={item.id}
                                index={index}
                            >
                                {(provided) => (
                                    <div
                                        ref={provided.innerRef}
                                        {...provided.draggableProps}
                                        {...provided.dragHandleProps}
                                        className="mb-2 p-2 border bg-light rounded w-1/2"
                                    >
                                        {item.content}
                                    </div>
                                )}
                            </Draggable>
                        ))}
                        {provided.placeholder}
                    </div>
                )}
            </Droppable>
        </div>
    );
};

export default DragDropSidebarSectionComponent;
