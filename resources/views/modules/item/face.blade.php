<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<style>
		body{
			margin: 0;
			padding: 0;
			height: 100vh;
			width: 100vw;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		canvas{
			position: absolute;
		}
	</style>
	<script defer src="{{ asset('js/face-api.min.js') }}"></script>
	<script defer src="{{ asset('js/face-script.js') }}"></script>
</head>
<body>
	<video id="video" width="720" height="560" autoplay muted></video>
</body>
</html>