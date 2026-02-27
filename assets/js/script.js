document.addEventListener('DOMContentLoaded', () => {

  /* ---- Theme Toggle ---- */
  const themeToggle = document.querySelector('.theme-toggle');
  const themeIcon   = document.getElementById('theme-icon');
  const body        = document.body;

  if (localStorage.getItem('theme') === 'dark') {
    body.setAttribute('data-theme', 'dark');
    themeIcon.classList.replace('fa-moon', 'fa-sun');
  }

  themeToggle.addEventListener('click', () => {
    const isDark = body.getAttribute('data-theme') === 'dark';
    body.setAttribute('data-theme', isDark ? 'light' : 'dark');
    themeIcon.classList.replace(isDark ? 'fa-sun' : 'fa-moon', isDark ? 'fa-moon' : 'fa-sun');
    localStorage.setItem('theme', isDark ? 'light' : 'dark');
  });

  /* ---- Mobile Menu ---- */
  const mobileBtn = document.querySelector('.mobile-menu-btn');
  const navLinks  = document.querySelector('.nav-links');

  if (mobileBtn && navLinks) {
    mobileBtn.addEventListener('click', () => {
      navLinks.classList.toggle('active');
      const icon = mobileBtn.querySelector('i');
      icon.classList.toggle('fa-bars');
      icon.classList.toggle('fa-times');
    });

    document.addEventListener('click', (e) => {
      if (!mobileBtn.contains(e.target) && !navLinks.contains(e.target)) {
        navLinks.classList.remove('active');
        const icon = mobileBtn.querySelector('i');
        icon.classList.add('fa-bars');
        icon.classList.remove('fa-times');
      }
    });
  }

  /* ---- Active Nav Link ---- */
  const currPage = location.pathname.split('/').pop() || 'index.php';
  document.querySelectorAll('.nav-links a').forEach(a => {
    if (a.getAttribute('href') === currPage) a.classList.add('active');
  });

  /* ---- Typewriter Effect ---- */
  const el = document.getElementById('typewriter');
  if (el) {
    const phrases = [
      'Full-Stack Developer',
      'MERN Stack Developer',
      'Data Science Enthusiast',
      'MCA Student'
    ];
    let pIdx = 0, cIdx = 0, deleting = false;

    function type() {
      const current = phrases[pIdx];
      el.textContent = deleting
        ? current.slice(0, --cIdx)
        : current.slice(0, ++cIdx);

      let delay = deleting ? 60 : 100;
      if (!deleting && cIdx === current.length)  { delay = 1800; deleting = true; }
      if (deleting  && cIdx === 0)               { deleting = false; pIdx = (pIdx + 1) % phrases.length; delay = 400; }

      setTimeout(type, delay);
    }
    setTimeout(type, 800);
  }

  /* ---- Counter Animation ---- */
  function animateCounter(el) {
    const target = +el.dataset.target;
    const duration = 1400;
    const step = target / (duration / 16);
    let current = 0;
    const timer = setInterval(() => {
      current += step;
      if (current >= target) { el.textContent = target + '+'; clearInterval(timer); }
      else                    el.textContent = Math.ceil(current) + '+';
    }, 16);
  }

  const statNums = document.querySelectorAll('.stat-num');
  if (statNums.length) {
    const counterObs = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          animateCounter(e.target);
          counterObs.unobserve(e.target);
        }
      });
    }, { threshold: 0.5 });
    statNums.forEach(n => counterObs.observe(n));
  }

  /* ---- Scroll Reveal ---- */
  const revealEls = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');
  if (revealEls.length) {
    const revealObs = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add('visible');
          revealObs.unobserve(e.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    revealEls.forEach(el => revealObs.observe(el));
  }

});
