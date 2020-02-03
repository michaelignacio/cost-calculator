<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cost Calculator</title>
	<link rel="stylesheet" href="src/css/bulma.min.css">
</head>
<body>
	<section class="hero is-info">
		<div class="hero-body">
			<div class="container">
				<h1 class="title">
					Cost Calculator
				</h1>
				<h2 class="subtitle">
					Forecast the cost of infrastructure based on customer usage	and expected growth
				</h2>
			</div>
		</div>
	</section>
	<section class="section">
		<div class="container">
			<form id="form" method="post">
				<div class="columns is-desktop">
					<div class="column">
						<div class="field">
							<div class="control">
								<input class="input is-large" type="number" name="studies" placeholder="# of studies per day..." required>
							</div>
						</div>
					</div>
					<div class="column">
						<div class="field">
							<div class="control">
								<input class="input is-large" type="number" name="growth" placeholder="Growth in % per month..." required>
							</div>
						</div>
					</div>
					<div class="column">
						<div class="field">
							<div class="control">
								<input class="input is-large" type="text" name="months" placeholder="# of months to forecast..." required>
							</div>
						</div>
					</div>
					<div class="column is-one-fifth">
						<div class="control">
							<button class="button is-info is-large is-fullwidth" type="submit">Calculate</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
	<section class="section">
		<div class="container">
			<table class="table is-fullwidth" id="table">
				<thead>
					<tr>
						<th>Month/Year</th>
						<th>Number of studies</th>
						<th>Cost forecasted</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
			<div id="test"></div>
		</div>
	</section>
	<script type="text/javascript" src="src/js/script.js"></script>
</body>
</html>