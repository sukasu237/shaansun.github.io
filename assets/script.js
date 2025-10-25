// Small JS for nav toggle, animate on scroll, year updates
(function(){
  // Mobile nav toggle (handles multiple hamburger IDs)
  const hamburgers = ['hamburger','hamburger2','hamburger3','hamburger4','hamburger5'];
  const navLinks = document.getElementById('navLinks');
  hamburgers.forEach(id => {
    const el = document.getElementById(id);
    if(el) el.addEventListener('click', ()=>{
      if(navLinks) navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
    });
  });

  // Animate on scroll
  const observer = new IntersectionObserver((entries)=>{
    entries.forEach(entry=>{
      if(entry.isIntersecting) entry.target.classList.add('is-visible');
    });
  },{threshold:0.12});
  document.querySelectorAll('[data-animate]').forEach(el => observer.observe(el));

  // Footer years
  const y = new Date().getFullYear();
  ['year','year2','year3','year4','year5'].forEach(id=>{ const e=document.getElementById(id); if(e) e.textContent=y });
})();