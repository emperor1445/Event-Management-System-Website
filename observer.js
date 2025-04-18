const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in-view');
        entry.target.classList.remove('not-in-view');
      } else {
        entry.target.classList.remove('in-view');
        entry.target.classList.add('not-in-view');
      }
    });
  },
  {
    rootMargin: '0px',
    threshold: [0, 0.1, 1],
  }
);

const tags = document.querySelectorAll('figure, h2, div, h1');
tags.forEach((tag) => {
  observer.observe(tag);
});