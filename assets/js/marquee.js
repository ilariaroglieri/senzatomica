function marquee(element) {
  const marquees = document.querySelectorAll(element);

  marquees.forEach(function(element) {
    let tick = 1;
    let value = element.dataset.speed;
    element.innerHTML += element.innerHTML;
    element.innerHTML += element.innerHTML;

    const innerTags = element.querySelectorAll("div.inner");
    innerTags.forEach((inner, index) => {
      inner.style.left = inner.offsetWidth * index + "px";
    });

    const ticker = function() {
      tick += parseInt(value);

      innerTags.forEach((inner, index) => {
        let width = inner.offsetWidth;
        let normalizedMarqueeX = ((tick % width) + width) % width;
        let pos = width * (index - 1) + normalizedMarqueeX;

        inner.style.left = pos + "px";
      });
      requestAnimationFrame(ticker);
    };
    ticker();
  });
}

marquee('div.marquee');
