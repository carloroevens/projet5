let action = document.querySelector('.btn')

action.addEventListener('click', function (e) {

	e.preventDefault();
	
	let mail = document.querySelector('#mail').value
	let pass = document.querySelector('#password').value
	let confpass = document.querySelector('#Comf-password').value

	let httpRequest = new XMLHttpRequest()
	let result = document.querySelector('.result')
	result.innerHTML = ''
	httpRequest.onreadystatechange = function () {

	if (httpRequest.readyState === 4) {
		if (httpRequest.status === 200) {

			result.innerHTML = httpRequest.responseText

		}
	}
};

httpRequest.open('POST', 'index.php?p=insert-user', true);

let data = new FormData()

data.append('email', mail)
data.append('password', pass)
data.append('Comf-password', confpass)

httpRequest.send(data)
})

