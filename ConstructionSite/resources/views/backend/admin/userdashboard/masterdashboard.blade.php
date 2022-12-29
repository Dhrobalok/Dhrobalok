<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:900&display=swap">
    <title>Document</title>


    <style>
    /* * {
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
} */

:root {
  --image-slider-width: min(80vw, 768px);
  --image-slider-handle-width: 50px;
}

body {
  width: 100%;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: sans-serif;
}

#image-slider {
  position: relative;
  width: var(--image-slider-width);
  overflow: hidden;
  border-radius: 1em;
  box-shadow: -4px 5px 10px 1px gray;
  cursor: col-resize;
}

#image-slider img {
  display: block;
  width: var(--image-slider-width);
  height: auto;
  max-height: 80vh;
  object-fit: cover;
  pointer-events: none;
  user-select: none;
}

#image-slider .img-wrapper {
  position: absolute;
  top: 0;
  right: 0;
  height: 100%;
  width: 50%;
  overflow: hidden;
  z-index: 1;
}

#image-slider .img-wrapper img {
  position: absolute;
  top: 0;
  right: 0;
  height: 100%;
  filter: grayscale(100%);
  transform: scale(1.2);
}

#image-slider .handle {
  border: 0px solid red;
  position: absolute;
  top: 0;
  left: calc(50% - var(--image-slider-handle-width)/2);
  width: var(--image-slider-handle-width);
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  user-select: none;
  z-index: 2;
}

#image-slider .handle-circle {
  width: var(--image-slider-handle-width);
  height: var(--image-slider-handle-width);
  color: white;
  border: 2px solid white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
}

#image-slider .handle-line {
  width: 2px;
  flex-grow: 1;
  background: red;
}

@media (max-width: 768px) {
  :root {
    width: 100%;
    --image-slider-width: 190vw;
  }
}
    </style>
</head>
<body>
    
    <!-- Images from Unsplash -->
<div class="slider-container">
    
	<h1><br/>
		</h1>
        <div id="image-slider">
            <img src="{{ asset('images/slider-2.jpg') }}" height="140" style="border-radius: 11px;" alt="CoolBrand">
        <div class="img-wrapper">
          <img src="{{ asset('images/slider-1.jpg') }}" height="140" style="border-radius: 11px;" alt="CoolBrand">
        </div>
        <div class="handle">
          <div class="handle-line"></div>
          <div class="handle-circle">
            &#171 &#187
          </div>
          <div class="handle-line"></div>
        </div>
      </div>
</div>
</body>
</html>

<script>

const slider = document.querySelector('#image-slider');
const wrapper = document.querySelector('.img-wrapper');
const handle = document.querySelector('.handle');

slider.addEventListener("mousemove", sliderMouseMove);
slider.addEventListener("touchmove", sliderMouseMove);

function sliderMouseMove(event) {

  if(isSliderLocked) return;

  const sliderLeftX = slider.offsetLeft;
  const sliderWidth = slider.clientWidth;
  const sliderHandleWidth = handle.clientWidth;

  let mouseX = (event.clientX || event.touches[0].clientX) - sliderLeftX;
  if(mouseX < 0) mouseX = 0;
  else if(mouseX > sliderWidth) mouseX = sliderWidth;

  wrapper.style.width = `${((1 - mouseX/sliderWidth) * 100).toFixed(4)}%`;
  handle.style.left = `calc(${((mouseX/sliderWidth) * 100).toFixed(4)}% - ${sliderHandleWidth/2}px)`;
}

let isSliderLocked = false;

slider.addEventListener("mousedown", sliderMouseDown);
slider.addEventListener("touchstart", sliderMouseDown);
slider.addEventListener("mouseup", sliderMouseUp);
slider.addEventListener("touchend", sliderMouseUp);
slider.addEventListener("mouseleave", sliderMouseLeave);

function sliderMouseDown(event) {
  if(isSliderLocked) isSliderLocked = false;
  sliderMouseMove(event);
}

function sliderMouseUp() {
  if(!isSliderLocked) isSliderLocked = true;
}

function sliderMouseLeave() {
  if(isSliderLocked) isSliderLocked = true;
}

</script>