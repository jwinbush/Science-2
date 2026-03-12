// Select search elements
const search = document.querySelector('.search')
const searchInput = document.querySelector('.search__input')
const searchBtn = document.querySelector('.search__btn')

// Toggle search form
const toggleSearch = () => {
	search.classList.toggle('is-open')

	if (search.classList.contains('is-open')) {
		searchInput.focus()
	}
}

// Event listeners
searchBtn.addEventListener('click', toggleSearch)
