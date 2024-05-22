import React from "react";
import { Droppable, Draggable } from "react-beautiful-dnd";

const DragDropAreaSectionComponent = ({
    sectionId,
    title,
    type,
    items,
    style,
}) => {
    return (
        <div className="circle-item" style={style}>
            <h5 className="text-center">{title}</h5>
            <Droppable droppableId={sectionId} type={type}>
                {(provided) => (
                    <div
                        {...provided.droppableProps}
                        ref={provided.innerRef}
                        style={{}}
                    >
                        {items.length > 0 ? (
                            items.map((item, index) => (
                                <div
                                    key={item.id}
                                    // draggableId={item.id}
                                    index={index}
                                >
                                    {/* {(provided) => (
                                        <div
                                            ref={provided.innerRef}
                                            {...provided.draggableProps}
                                            {...provided.dragHandleProps}
                                            className="mb-2 p-2 border bg-light"
                                        > */}
                                    {item.content}
                                </div>
                                // )}
                                // </div>
                            ))
                        ) : (
                            <>{/* <p>Drop item here</p> */}</>
                        )}
                        {provided.placeholder}
                    </div>
                )}
            </Droppable>
        </div>
    );
};

export default DragDropAreaSectionComponent;
