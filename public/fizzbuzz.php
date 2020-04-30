<!DOCTYPE html>
<html dir="ltr" lang="ja">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0,viewport-fit=cover" />
	<title>FizzBuzz</title>
</head>
	<script>
	window.onload = function() {
		var parentDiv = document.createElement('ul');
		parentDiv.id = 'main';
		document.body.appendChild(parentDiv);
		var main = document.getElementById('main');

		for (var i = 1; i <= 100; i++){
			var sub = document.createElement('li');
			sub.setAttribute('id', 'sub'+i);
			if (i % 3 === 0 && i % 5 === 0) {
				sub.innerHTML = "Fizz Buzz";
			} else if (i % 3 === 0) {
				sub.innerHTML = "Fizz";
			} else if (i % 5 === 0) {
				sub.innerHTML = "Buzz";
			} else {
				sub.innerHTML = i;
			}
			main.appendChild(sub);
		} 
	}
</script>
<body>
</body>
</html>
