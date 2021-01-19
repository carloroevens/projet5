let action = document.querySelector('#lien')

action.addEventListener('click', function (e) {

	e.preventDefault();
	let httpRequest = new XMLHttpRequest()
	let url = action.getAttribute('href');

	httpRequest.onreadystatechange = function () {

	if (httpRequest.readyState === 4) {
			document.location.reload();

		}
};

httpRequest.open('GET', url, true);

httpRequest.send();
})

