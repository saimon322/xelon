const scrollContainer = document.querySelectorAll(".inline-scroll");

scrollContainer && scrollContainer.forEach(container => {
    container.addEventListener("wheel", (evt) => {
        evt.preventDefault();
        container.scrollLeft += evt.deltaY;
    });
});