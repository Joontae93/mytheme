class Post {
	#theSidebarMarkup = `<aside class="sidebar">
        <h3 class="sidebar__header">In This article:</h3>
        <ul class="article-headers"></ul>
    </aside>`;
	#thePost = document.querySelector('.the-post');
	#theHeaders = null;
	#theAnchoredHeaders;

	constructor() {
		this.#getHeaders();
	}

	#getHeaders() {
		this.#theHeaders = this.#thePost.querySelectorAll('h2');
	}

	createSidebar() {
		if (this.#theHeaders != null) {
			this.#anchorHeaders();
			this.#generateSidebar();
			this.#displayTableOfContents();
		}
	}

	#anchorHeaders() {
		this.#theAnchoredHeaders = Array.from(this.#theHeaders).map((el) => {
			const anchor = el.innerText.toLowerCase().replaceAll(' ', '-');
			el.id = anchor;
			return el;
		});
	}

	#generateSidebar() {
		this.#thePost.insertAdjacentHTML(
			this.#checkForMobileScreenSize(),
			this.#theSidebarMarkup,
		);
	}

	#checkForMobileScreenSize() {
		return window.innerWidth > 390 ? 'beforeend' : 'afterbegin';
	}

	#displayTableOfContents() {
		const tableOfContents = document.querySelector('.article-headers');
		this.#theAnchoredHeaders.forEach((header) => {
			tableOfContents.insertAdjacentHTML(
				'beforeend',
				`<li><a href="#${header.id}">${header.innerText}</a></li>`,
			);
		});
	}
}

const thePost = new Post();
thePost.createSidebar();
