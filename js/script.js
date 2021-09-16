function isInViewport(element) {
  const rect = element.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <=
      (window.innerHeight + rect.height ||
        document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

function toggleAnimation(elementId, animatedCssClassName) {
  console.log("Element id->", elementId);
  const element = document.getElementById(elementId);
  var offsets = element.getBoundingClientRect();
  var top = offsets.top + window.pageYOffset;
  var bottom = offsets.bottom;
  console.log("top->", top);
  console.log("bottom->", bottom);
  var positionTop = $(document).scrollTop();
  console.log("positionTop->", positionTop);
  if (positionTop > top && positionTop < bottom) {
    console.log("on focus");
    $("#" + elementId).addClass(animatedCssClassName);
  }
}
