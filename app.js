  // Set current year in footer
  document.getElementById('year').textContent = new Date().getFullYear();

  // --- Scroll reveal
const reveals = document.querySelectorAll('.reveal');
const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry, i) => {
    if (entry.isIntersecting) {
      setTimeout(() => entry.target.classList.add('visible'), i * 80);
    }
  });
}, { threshold: 0.1 });
reveals.forEach(el => observer.observe(el));

// --- Slider
const track = document.getElementById('track');
const cards = track.querySelectorAll('.testimonio-card');
let current = 0;
let perView = window.innerWidth < 700 ? 1 : window.innerWidth < 1000 ? 2 : 3;
const total = Math.ceil(cards.length / perView);

function buildDots() {
  const dotsEl = document.getElementById('dots');
  dotsEl.innerHTML = '';
  for (let i = 0; i < total; i++) {
    const d = document.createElement('div');
    d.className = 'dot' + (i === current ? ' active' : '');
    d.onclick = () => goTo(i);
    dotsEl.appendChild(d);
  }
}

function goTo(n) {
  current = Math.max(0, Math.min(n, total - 1));
  const cardW = cards[0].offsetWidth + 24;
  track.style.transform = 'translateX(-' + (current * perView * cardW) + 'px)';
  buildDots();
}

function slide(dir) { goTo(current + dir); }

window.addEventListener('resize', () => {
  perView = window.innerWidth < 700 ? 1 : window.innerWidth < 1000 ? 2 : 3;
  goTo(0);
});

buildDots();

// Auto-slide
setInterval(() => slide(1), 5000);

// --- Form submit
function submitForm() {
  const name = document.getElementById('fname').value;
  const phone = document.getElementById('phone').value;
  if (!name || !phone) {
    alert('Por favor ingresa al menos tu nombre y teléfono.');
    return;
  }
  document.getElementById('formContent').style.display = 'none';
  document.getElementById('formSuccess').style.display = 'block';
}

// --- Mobile menu
function toggleMenu() {
  const links = document.querySelector('.nav-links');
  if (!links.style.display || links.style.display === 'none') {
    links.style.display = 'flex';
    links.style.flexDirection = 'column';
    links.style.position = 'absolute';
    links.style.top = '72px';
    links.style.left = '0'; links.style.right = '0';
    links.style.background = 'rgba(17,29,53,0.98)';
    links.style.padding = '24px 40px';
    links.style.gap = '20px';
    links.style.borderBottom = '1px solid rgba(201,168,76,0.2)';
  } else {
    links.style.display = 'none';
  }
}

// Close menu on link click
document.querySelectorAll('.nav-links a').forEach(a => {
  a.addEventListener('click', () => {
    document.querySelector('.nav-links').style.display = 'none';
  });
});
