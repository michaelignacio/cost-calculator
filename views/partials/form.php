<section class="section">
	<div class="container">
		<form id="form" method="post">
			<div class="columns is-desktop">
				<div class="column">
					<div class="field">
						<div class="control">
							<input class="input is-large" type="number" name="studies" placeholder="# of studies per day..." min="1" onkeypress="return isNumberKey(event)" required>
						</div>
					</div>
				</div>
				<div class="column">
					<div class="field">
						<div class="control">
							<input class="input is-large" type="number" name="growth" placeholder="Growth in % per month..." min="0" onkeypress="return isNumberKey(event)" required>
						</div>
					</div>
				</div>
				<div class="column">
					<div class="field">
						<div class="control">
							<input class="input is-large" type="number" name="months" placeholder="# of months to forecast..." min="1" onkeypress="return isNumberKey(event)" required>
						</div>
					</div>
				</div>
				<div class="column">
					<div class="control">
						<button class="button is-info is-large is-fullwidth" type="submit">Calculate</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>