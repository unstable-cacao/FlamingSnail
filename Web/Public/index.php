<html>
	<head>
		
	</head>
	<body>
		<canvas id="main-screen" width="400" height="400" style="border: 1px solid #ccc">
			
		</canvas>
		
	
		<script
			src="https://code.jquery.com/jquery-3.3.1.min.js"
			integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous"></script>
		<script src="resources/fabric.min.js"></script>
		<script src="resources/history.adapter.native.js"></script>
		<script src="resources/history.js"></script>
		<script src="resources/main.js?<?= rand(); ?>"></script>
		
		<script>
			FlamingSnail.Boot();
		</script>
	</body>
</html>
