// Friend Management
function requestFriend(friendid) {
	$.ajax({
		url: "requestFriend.php",
		type: "POST",
		data: {'friendid': friendid},
		success: function() {readPosts();},
	});
}

function makeFriend(friendid) {
	$.ajax({
		url: "makeFriend.php",
		type: "POST",
		data: {'friendid': friendid},
		success: function() {readPosts();},
	});
}

function removeFriend(friendid) {
	$.ajax({
		url: "removeFriend.php",
		type: "POST",
		data: {'friendid': friendid},
		success: function() {readPosts();},
	});
}

// Baord Management
function registerPostBoard() {
	$.ajax({
		url: "registerPostBoard.php",
		type: "POST",
		data: $("#postBoard").serialize(),
		success: function() {readPosts();},
	});
}

function registerPost(board) {
	$.ajax({
		url: "registerPost.php",
		type: "POST",
		data: $("#post").serialize() + "&board=" + board,
		success: function() {readPosts();},
	});
}

// Account Management
function addAccount() {
	if ($("#pw").val() == $("#vpw").val()) {
		$.ajax({
			url: "addAccount.php",
			type: "POST",
			data: $("#register").serialize(),
		});
		$("#success").attr("class", "w3-show");
		$("#register").attr("class", "w3-hide");
	} else {
		alert("Passwords do not match!");
	}
}

function pickColor(color) {
	$.ajax({
		url: "pickColor.php",
		type: "POST",
		data: {"color": color},
		success: function() {location.reload()},
	});
}

function pickLD(ld) {
	$.ajax({
		url: "pickLD.php",
		type: "POST",
		data: {"ld": ld},
		success: function() {location.reload()},
	});
}

// Session Management
function startSession() {
	$.ajax({
		url: "startSession.php",
		type: "POST",
		data: $("#login").serialize(),
		success: function() {location.reload()},
	});
}

function postStatus() {
	var rtData = $("#realTimeData").data();
	if (rtData != null) {
		$.ajax({
			url: "postStatus.php",
			type: "POST",
			data: {'page': rtData.page},
		});
	}
}

function endSession() {
	$.ajax({
		url: "endSession.php",
		type: "GET",
		data: "",
		success: function() {
			if(location.href.indexOf("Friends") > -1) {
				document.location.href = "/IMWebsite";
			} else if(location.href.indexOf("Color") > -1) {
				document.location.href = "/IMWebsite";
			} else {
				location.reload();
			}
		},
	});
}

// Reloading Page
function readPosts() {
	$('.reload').load(document.URL +  ' .reload');
}

window.onload = function () {
	$("form").submit(function(e) {
		e.preventDefault();
	});
	
	postStatus();
	setInterval(postStatus, 5000);
	setInterval(readPosts, 5000);
};