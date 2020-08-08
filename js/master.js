function myFunction(imgs) {
  // Get the expanded image
  var expandImg = document.getElementById("expandedImg");
  // Get the image text
  var imgText = document.getElementById("imgtext");
  // Use the same src in the expanded image as the image being clicked on from the grid
  expandImg.src = imgs.src;
  // Use the value of the alt attribute of the clickable image as text inside the expanded image
  imgText.innerHTML = imgs.alt;
  // Show the container element (hidden with CSS)
  expandImg.parentElement.style.display = "block";
}

const reviews = [
  {
    id: 1,
    name: "Ashish Don",
    job: "farmer",
    img: "images/p1.jpg",
    texts:
      "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
  },
  {
    id: 2,
    name: "ravi khanal",
    job: "farmer",
    img: "images/p2.jpg",
    texts:
      "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.",
  },
];

const img = document.getElementById("tImg");
const tex = document.getElementById("mytext");
const nam = document.getElementById("name");
const job = document.getElementById("jobtitle");

var prevBtn = document.querySelector(".prev");
var nextBtn = document.querySelector(".next");

let currentItem = 0;

//load initial item
window.addEventListener("DOMContentLoaded", onLoad);

function onLoad() {
  const item = reviews[currentItem];
  img.src = item.img;
  tex.textContent = item.texts;
  nam.textContent = item.name;
  job.textContent = item.job;
}

nextBtn.addEventListener("click", nextTestimonial);
prevBtn.addEventListener("click", prevTestimonial);

function nextTestimonial() {
  currentItem++;
  if (currentItem > reviews.length - 1) {
    currentItem = 0;
  }
  showPerson(currentItem);
}

function prevTestimonial() {
  currentItem--;
  if (currentItem < 0) {
    currentItem = reviews.length - 1;
  }
  showPerson(currentItem);
}

function showPerson(person) {
  const item = reviews[person];
  img.src = item.img;
  tex.textContent = item.texts;
  nam.textContent = item.name;
  job.textContent = item.job;
}
