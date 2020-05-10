window.addEventListener("DOMContentLoaded", (event) => { //callback
	let btnBurger = document.getElementsByClassName('btn-burger');
	let menuEntier = document.getElementsByClassName('menu');
	let btnClose = document.getElementsByClassName('btn-close');


	for (let item of btnBurger) {
		item.addEventListener('click', function (event) {
			for (let item of menuEntier) {
				item.classList.add('active');
			}
			item.classList.add('display-none');
			btnClose[0].classList.add('display-block');


		})
	}

	for (let item of btnClose) {
		item.addEventListener('click', function (event) {
			if (item.classList.contains('display-block')) {
				item.classList.remove('display-block')
			}
			btnBurger[0].classList.remove('display-none')
			menuEntier[0].classList.remove('active')
		})
	}
});
