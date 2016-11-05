function readPosts() {
	location.reload();
}

window.onload = function () {
	setInterval(readPosts, 30000);
}