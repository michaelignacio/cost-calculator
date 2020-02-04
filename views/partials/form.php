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