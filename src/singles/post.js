class Post {
	#theSidebarMarkup = `<aside class="sidebar">
        	<h3 class="sidebar__header">In This article:</h3>
        	<ul class="article-headers" role="list" id="tableOfContents"></ul>
    </aside>`;
	#thePost = document.querySelector('.the-post');
	#theHeaders = null;
	#theAnchoredHeaders;
	#sidebar;
	constructor() {
		this.#getHeaders();
	}

	#getHeaders() {
		this.#theHeaders = this.#thePost.querySelectorAll('h2');
	}

	createSidebar() {
		if (this.#theHeaders != null) {
			this.#anchorHeaders();
			this.#displaySidebar();
			this.#displayTableOfContents();
			this.#handleWindowResize();
		}
	}

	#anchorHeaders() {
		this.#theAnchoredHeaders = Array.from(this.#theHeaders).map((el) => {
			const anchor = el.innerText.toLowerCase().replaceAll(' ', '-');
			el.id = anchor;
			return el;
		});
	}

	#displaySidebar() {
		const article = document.querySelector('.single');
		article.insertAdjacentHTML(
			this.#checkForMobileScreenSize(),
			this.#theSidebarMarkup,
		);
		this.#setSidebar();
	}

	#checkForMobileScreenSize() {
		return window.innerWidth > 700 ? 'beforeend' : 'afterbegin';
	}
	#setSidebar() {
		this.#sidebar = document.querySelector('.sidebar');
	}

	#displayTableOfContents() {
		const tableOfContents = document.getElementById('tableOfContents');
		this.#theAnchoredHeaders.forEach((header) => {
			tableOfContents.insertAdjacentHTML(
				'beforeend',
				`<li><a href="#${header.id}">${header.innerText}</a></li>`,
			);
		});
	}
	#handleWindowResize() {
		window.addEventListener(
			'resize',
			(ev) => {
				if (ev.target.innerWidth < 700) {
					this.#sidebar.remove();
					this.#displayMobileSidebar();
					this.#displayTableOfContents();
				}
			},
			{ once: true },
		);
	}
	#displayMobileSidebar() {
		const image = this.#thePost.querySelector('.the-post__featured-image');
		image.insertAdjacentHTML('afterend', this.#theSidebarMarkup);
	}
}

const thePost = new Post();
thePost.createSidebar();
