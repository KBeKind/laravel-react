import React from "react";
import DragDropAreaSectionComponent from "./DragDropAreaSectionComponent";

const DragDropAreaComponent = ({ sections }) => {
    const positions = [
        { top: "15%", left: "50%", transform: "translate(-50%, -50%)" },
        { top: "50%", left: "15%", transform: "translate(-50%, -50%)" },
        { top: "50%", left: "85%", transform: "translate(-50%, -50%)" },
        { top: "85%", left: "50%", transform: "translate(-50%, -50%)" },
    ];

    return (
        <div>
            {sections.map((section, index) => (
                <DragDropAreaSectionComponent
                    key={section.id}
                    sectionId={section.id}
                    title={section.title}
                    type={section.type}
                    items={section.items}
                    style={positions[index % positions.length]}
                />
            ))}
        </div>
    );
};

export default DragDropAreaComponent;
