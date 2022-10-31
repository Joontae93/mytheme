/** Shorthand for Query Selector Function.
 * @param selector {string} CSS Selector. Must include class ('.') marker if needed
 * @param  [all] {boolean} optional to call querySelectorAll.
 * @return {Element} HTML Element
 * */
export function select(selector, all = false) {
	return all === false
		? document.querySelector(selector)
		: document.querySelectorAll(selector);
}
