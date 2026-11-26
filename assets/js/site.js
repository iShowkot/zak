/* Zak site script: menu, header state, sticky action bar, reveal on scroll. */
(function () {
	'use strict';

	var doc = document.documentElement;
	doc.classList.add('js');

	// Mobile menu.
	var toggle = document.querySelector('[data-menu-toggle]');
	var nav = document.querySelector('[data-nav]');

	function setMenu(open) {
		if (!toggle || !nav) { return; }
		toggle.setAttribute('aria-expanded', String(open));
		nav.classList.toggle('is-open', open);
		document.body.classList.toggle('menu-open', open);
	}

	if (toggle && nav) {
		toggle.addEventListener('click', function () {
			setMenu(toggle.getAttribute('aria-expanded') !== 'true');
		});
		document.addEventListener('keydown', function (event) {
			if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
				setMenu(false);
				toggle.focus();
			}
		});
		nav.addEventListener('click', function (event) {
			if (event.target.closest('a')) { setMenu(false); }
		});
		window.matchMedia('(min-width: 861px)').addEventListener('change', function (event) {
			if (event.matches) { setMenu(false); }
		});
	}

	// Header shadow and action bar appear once the visitor starts scrolling.
	var header = document.querySelector('[data-header]');
	var bar = document.querySelector('[data-action-bar]');
	var ticking = false;

	function onScroll() {
		var y = window.scrollY;
		if (header) { header.classList.toggle('is-scrolled', y > 8); }
		if (bar) { bar.classList.toggle('is-visible', y > 320); }
		ticking = false;
	}

	window.addEventListener('scroll', function () {
		if (!ticking) {
			ticking = true;
			window.requestAnimationFrame(onScroll);
		}
	}, { passive: true });
	onScroll();

	// Reveal on scroll.
	var targets = document.querySelectorAll('[data-reveal]');
	if (targets.length && 'IntersectionObserver' in window) {
		var observer = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-in');
					observer.unobserve(entry.target);
				}
			});
		}, { rootMargin: '0px 0px -10% 0px' });
		targets.forEach(function (el) { observer.observe(el); });
	} else {
		targets.forEach(function (el) { el.classList.add('is-in'); });
	}
})();
