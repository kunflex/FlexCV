let clone = () => {
    let template = document.getElementById("myTemplate");
    let clone = document.importNode(template.content, true);

    let div = document.getElementById("mydiv");
    div.appendChild(clone);
};

function closeTemplate(element) {
    element.classList.add('hidden');
}