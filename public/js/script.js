// Header and footer are now included via Blade templates, no need to fetch

// for map

// form submit thank you start

const form = document.getElementById("feedbackForm");
if (form) {
  form.addEventListener("submit", function (e) {
    e.preventDefault(); // form ka default submit rokta hai
    // redirect to thank you page
    window.location.href = "thankyou.html";
  });
}

// form submit thank you end

// Close modal when clicking outside
const videoModal = document.getElementById("videoModal");
if (videoModal) {
  videoModal.addEventListener("click", (e) => {
    if (e.target === videoModal) {
      youtubeFrame.src = "";
      videoModal.classList.add("hidden");
    }
  });
}
// youtube video end

// water ppp resources page script start

const gradients = [
  "bg-gradient-to-br from-[#0E1C62] to-[#2CBFA0]",
  "bg-gradient-to-br from-[#0E4473] to-[#25B3D8]",
  "bg-gradient-to-br from-[#44107A] to-[#FF1361]",
  "bg-gradient-to-br from-[#2A0845] to-[#6441A5]",
  "bg-gradient-to-br from-[#16222A] to-[#3A6073]",
  "bg-gradient-to-br from-[#1E3C72] to-[#2A5298]",
  "bg-gradient-to-br from-[#134E5E] to-[#71B280]",
  "bg-gradient-to-br from-[#373B44] to-[#4286f4]",
  "bg-gradient-to-br from-[#20002c] to-[#cbb4d4]",
];

const cardsData = Array.from({ length: 36 }, (_, i) => ({
  title: `Title of guide or document can go here over multiple line here`,
  publisher: "Publisher name here",
  type: ["Guide", "Video", "Podcast", "Case Study"][i % 4],
  gradient: gradients[i % gradients.length],
  icon: ["book", "video", "mic", "lightbulb"][i % 4],
}));

const cardsPerPage = 12;
let currentPage = 1;

function renderCards() {
  const container = document.getElementById("card-container");
  if (container) {
    container.innerHTML = "";
    const start = (currentPage - 1) * cardsPerPage;
    const end = start + cardsPerPage;
    const visibleCards = cardsData.slice(start, end);

    visibleCards.forEach((card) => {
      container.innerHTML += `
          <div class="bg-white shadow-md p-4 rounded-[25px] flex flex-col justify-between">
            <div class="${card.gradient} text-white p-6 rounded-[15px] flex flex-col justify-between flex-grow shadow-[0_8px_15px_-4px_rgba(0,0,0,0.50)] ">
              <div>
                <h3 class="font-semibold text-lg leading-snug">${card.title}</h3>
                <p class="text-sm mt-2 opacity-90">${card.publisher}</p>
              </div>
              <div class="flex items-center space-x-2 mt-12">
                <i data-lucide="${card.icon}" class="w-4 h-4"></i>
                <span class="text-sm">${card.type}</span>
              </div>
            </div>
            <div class="flex justify-between pt-6 pb-3  border-t border-white/30 text-black/80">
              <i data-lucide="maximize-2" class="w-4 h-4 cursor-pointer"
                onclick="openModal('${card.title}', '${card.publisher}', '${card.type}', '${card.gradient}', '${card.icon}')"></i>
              <i data-lucide="download" class="w-4 h-4 cursor-pointer"></i>
              <i data-lucide="bookmark" class="w-4 h-4 cursor-pointer"></i>
              <i data-lucide="share-2" class="w-4 h-4 cursor-pointer"></i>
            </div>
          </div>`;
    });
     if (window.lucide) lucide.createIcons();
  }
}

function changePage(page) {
  currentPage = page;
  renderCards();
  document
    .querySelectorAll("button[id^='btn']")
    .forEach((btn) => btn.classList.remove("bg-blue-600", "text-white"));
  const activeBtn = document.getElementById(`btn${page}`);
  if (activeBtn) activeBtn.classList.add("bg-blue-600", "text-white");
}

function openModal(title, publisher, type, gradient, icon) {
  const modal = document.getElementById("productModal");
  modal.classList.remove("hidden");
  modal.classList.add("flex");
  document.getElementById("modalTitle").innerText = title;
  document.getElementById("modalPublisher").innerText = publisher;
  document.getElementById("modalType").innerText = type;
  const colorBox = document.getElementById("modalColorBox");
  colorBox.className = `${gradient} p-8 text-white w-full md:w-1/2 flex flex-col justify-between min-h-[360px]`;
  document.getElementById("modalIcon").setAttribute("data-lucide", icon);
  lucide.createIcons();
}

function closeproductModal() {
  const modal = document.getElementById("productModal");
  modal.classList.add("hidden");
  modal.classList.remove("flex");
}

// function toggleMenu(id) {
//   const menu = document.getElementById(id);
//   const icon = document.getElementById(`icon-${id}`);
//   if (menu.classList.contains("hidden")) {
//     menu.classList.remove("hidden");
//     icon.classList.add("rotate-0");
//   } else {
//     menu.classList.add("hidden");
//     icon.classList.remove("rotate-0");
//   }
// }

document.addEventListener("DOMContentLoaded", () => {
  renderCards();
  if (window.lucide) {
    lucide.createIcons();
  }
});

// water ppp resources page script end

// contact us page form start

function validateForm(event) {
  event.preventDefault(); // Prevent the form from submitting if validation fails

  // Get form elements
  const name = document.getElementById("name");
  const organisation = document.getElementById("organisation");
  const email = document.getElementById("email");
  const message = document.getElementById("message");

  // Get error elements
  const nameError = document.getElementById("name-error");
  const organisationError = document.getElementById("organisation-error");
  const emailError = document.getElementById("email-error");
  const messageError = document.getElementById("message-error");

  let isValid = true;

  // Clear previous error messages
  nameError.textContent = "";
  organisationError.textContent = "";
  emailError.textContent = "";
  messageError.textContent = "";

  // Name validation
  if (name.value.trim() === "") {
    nameError.textContent = "Please enter your name";
    isValid = false;
  }

  // Organisation validation
  if (organisation.value.trim() === "") {
    organisationError.textContent = "Please enter your organisation";
    isValid = false;
  }

  // Email validation
  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  if (email.value.trim() === "") {
    emailError.textContent = "Please enter your email";
    isValid = false;
  } else if (!emailPattern.test(email.value.trim())) {
    emailError.textContent = "Please enter a valid email address";
    isValid = false;
  }

  // Message validation
  if (message.value.trim() === "") {
    messageError.textContent = "Please enter your message";
    isValid = false;
  }

  // If all fields are valid, submit the form
  if (isValid) {
    alert("Form submitted successfully!");
    // Here you can add code to submit the form data if needed
  }
}

// contact us page form end

// home page card scroll horizontal strat

const slider = document.getElementById("cardSlider");
const progress = document.getElementById("progressFill");
if (slider && progress) {
slider.addEventListener("scroll", () => {
  const scrollLeft = slider.scrollLeft;
  const maxScroll = slider.scrollWidth - slider.clientWidth;

  const percent = (scrollLeft / maxScroll) * 100;
  progress.style.width = percent + "%";
});
}
// home page card scroll horizontal end

