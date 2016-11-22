function postStatus() {
	var rtData = $("#realTimeData").data();
	$.ajax({
		url: "/IMWebsite/PHP/PostStatus.php",
		type: "POST",
		data: {'page': rtData.page},
	});
}

function requestFriend(friendid) {
	$.ajax({
		url: "/IMWebsite/PHP/RequestFriend.php",
		type: "POST",
		data: {'friendid': friendid},
	});
	readPosts();
}

function makeFriend(friendid) {
	$.ajax({
		url: "/IMWebsite/PHP/MakeFriend.php",
		type: "POST",
		data: {'friendid': friendid},
	});
	readPosts();
}

function removeFriend(friendid) {
	$.ajax({
		url: "/IMWebsite/PHP/RemoveFriend.php",
		type: "POST",
		data: {'friendid': friendid},
	});
	readPosts();
}

function readPosts() {
	$('.reload').load(document.URL +  ' .reload');
}

window.onload = function () {
	postStatus();
	setInterval(postStatus, 5000);
	setInterval(readPosts, 5000);
};