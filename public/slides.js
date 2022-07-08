
const slides = {
	editor: false,

	ajax: {
		credentials: {},

		create_new: function () {
			const c = slides.ajax.credentials;
			return fetch('ajax/create-slides', { method: 'POST' })
			.then(response => response.json())
			.then(json => {
				c.id = json.id;
				c.encryption_key = json.encryption_key;
				c.admin_key = json.admin_key;
				history.pushState({}, '', `${c.id}_${c.encryption_key}/${c.admin_key}`);
				slides.editor = true;
			});
		},

		load: function () {
			return fetch('ajax/get-slides', {
				method: 'POST',
				body: new URLSearchParams({
					id: this.credentials.id,
					encryption_key: this.credentials.encryption_key
				})
			}).then(response => response.json());
		},

		update: function (content) {
			return fetch('ajax/update-slides', {
				method: 'POST',
				body: new URLSearchParams({
					md: content,
					id: this.credentials.id,
					encryption_key: this.credentials.encryption_key,
					admin_key: this.credentials.admin_key
				})
			});
		}
	},


	load: function () {
		const localpath = window.location.href.substr(document.baseURI.length);

		if (localpath === '') return this.ajax.create_new();

		const [id, ek, ak] = localpath.split(/[\/_]/);
		this.ajax.credentials = {
			id: id,
			encryption_key: ek,
			admin_key: ak
		};
		if (ak) this.editor = true;

		return this.ajax.load().catch(this.editor && this.ajax.create_new);
	},


	init_editor: function (initial_content) {
		const container = document.createElement('DIV');
		container.classList.add('editor');
		const E_IN = document.createElement('TEXTAREA');
		E_IN.placeholder = 'Markdown';
		E_IN.value = initial_content;
		const E_OUT = document.createElement('DIV');
		E_OUT.classList.add('slides-preview');
		container.append(E_IN);
		container.append(E_OUT);
		document.body.append(container);
		document.querySelector('.loading-placeholder').remove();

		if (E_IN.value.length > 0) renderSlides();
		else E_OUT.innerHTML = `<div class="slide">
				<h1>Welcome to<br>CampusSlides</h1>
				<p>enter some markdown on the left to get started</p>
			</div>`;

		const share_button = document.createElement('A');
		share_button.href = `${document.baseURI}${slides.ajax.credentials.id}_${slides.ajax.credentials.encryption_key}`;
		share_button.target = '_blank';
		share_button.innerText = 'share';
		document.querySelector('.cis-header').append(share_button);

		let timeout;
		E_IN.addEventListener('input', () => {
			renderSlides();
			focusActiveSlide();

			clearTimeout(timeout);
			timeout = setTimeout(async () => {
				console.log('saving…');
				await slides.ajax.update(E_IN.value);
				console.log('saved.');
			}, 1000);
		});
		E_IN.addEventListener('keydown', focusActiveSlide);
		E_IN.addEventListener('keyup', focusActiveSlide);
		E_IN.addEventListener('click', focusActiveSlide);

		E_IN.addEventListener('keydown', e => {
			if (e.keyCode == 9) {
				const start = E_IN.selectionStart;
				const end = E_IN.selectionEnd;
				E_IN.value = E_IN.value.substr(0, start) + '\t' + E_IN.value.substr(end);
				E_IN.selectionStart = E_IN.selectionEnd = start + 1;
				e.preventDefault();
			}
		});


		function renderSlides() {
			E_OUT.innerHTML = '';
			let md = E_IN.value;
			if (md.substr(-1) !== '\n') md = md + '\n';
			let offset = 0;
			md.split(/\n-{3}\n/).forEach(s => {
				const container = document.createElement('DIV');
				container.classList.add('slide');
				container.innerHTML = marked.parse(s);
				E_OUT.append(container);

				let jumpTo = offset;
				container.addEventListener('click', () => {
					E_IN.focus();
					E_IN.selectionStart = E_IN.selectionEnd = jumpTo;
					focusActiveSlide();
				});
				offset += s.length + 5;
			});
			MathJax.typeset();
		}

		function focusActiveSlide() {
			const activeSlideIndex = (E_IN.value.substr(0, E_IN.selectionStart).match(/\n-{3}\n/g) || []).length;
			document.querySelectorAll('.slides-preview .slide.focus').forEach(s => s.classList.remove('focus'));
			const activeSlide = document.querySelectorAll('.slides-preview .slide')[activeSlideIndex];
			if (!activeSlide) return;
			activeSlide.classList.add('focus');
			activeSlide.scrollIntoView({behavior: 'smooth', block: 'center'});
		}
	},


	render: function (md, container) {
		container.innerHTML = '';
		if (md.substr(-1) !== '\n') md = md + '\n';
		md.split(/\n-{3}\n/).forEach(s => {
			const elem = document.createElement('DIV');
			elem.classList.add('slide');
			elem.innerHTML = marked.parse(s);
			container.append(elem);
		});
		MathJax.typeset();

		container.firstChild.classList.add('active');
		document.body.addEventListener('keydown', e => {
			if (e.key == 'ArrowRight' || e.key == 'ArrowDown' || e.key === ' ') {
				const active = container.querySelector('.active');
				active.nextElementSibling.classList.add('active');
				active.classList.remove('active');
			}
			if (e.key == 'ArrowLeft' || e.key == 'ArrowUp') {
				const active = container.querySelector('.active');
				active.previousElementSibling.classList.add('active');
				active.classList.remove('active');
			}
		});
	}
};


document.addEventListener('DOMContentLoaded', async () => {

	let md_content = '';
	await slides.load().then(payload => {
		if (!payload || !payload.md) return;
		md_content = payload.md;
	});

	if (slides.editor) return slides.init_editor(md_content);

	const container = document.createElement('DIV');
	container.classList.add('slides');
	document.body.append(container);
	await slides.render(md_content, container);
	document.querySelector('.cis-header').style.display = 'none';
	document.querySelector('.loading-placeholder').remove();
});
