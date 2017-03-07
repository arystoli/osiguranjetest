
	<div>
	<h2>Cijene polica</h2>
		<div class="panel-group">
			<div class="panel panel-danger">
				<div class="panel-heading"><h4>Euroherc</h4></div>
				<div class="panel-body">
					<p>Temeljna premija: {{ $polica->Data->Premija }}</p>
					<p><a href="{{ url('/getPolicaOnePage') }}">Izrada</a></p>
				</div>
			</div>
		</div>
	</div>


