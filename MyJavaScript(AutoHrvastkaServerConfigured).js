function tarifnagrupaJS(val) {
	        $.get('http://localhost:8008/baza/tarifnapodgrupa?Oznaka=' + val, function(data) {
		            console.log(data);
		            $('#TarifnaPodGrupaOznaka').empty();

		            $.each(data, function(index,value){
			$('#TarifnaPodGrupaOznaka').append(new Option(value, index));
		            });
	        });

			$.get('http://localhost:8008/baza/tarifnipopust?Oznaka=' + val, function(data) {
		            console.log(data);
		            $('#TarifniPopustOznaka').empty();

		            $.each(data, function(index,value){
			$('#TarifniPopustOznaka').append(new Option(value, index));
		            });
	        });

			$.get('http://localhost:8008/baza/tarifnidoplatak?Oznaka=' + val, function(data) {
		            console.log(data);
		            $('#TarifniDoplatakOznaka').empty();

		            $.each(data, function(index,value){
			$('#TarifniDoplatakOznaka').append(new Option(value, index));
		            });
	        });

			$.get('http://localhost:8008/baza/bonus?Oznaka=' + val, function(data) {
		            console.log(data);
		            $('#BonusOznaka').empty();

		            $.each(data, function(index,value){
			$('#BonusOznaka').append(new Option(value, index));
		            });
	        });

			$.get('http://localhost:8008/baza/malus?Oznaka=' + val, function(data) {
		            console.log(data);
		            $('#MalusOznaka').empty();

		            $.each(data, function(index,value){
			$('#MalusOznaka').append(new Option(value, index));
		            });
	        });

}

function zonaJS(val) {

		$.get('http://localhost:8008/baza/zonasvota?Oznaka=' + val, function(data) {
		            console.log(data);
		            $('#ZonaSvotaOznaka').empty();

		            $.each(data, function(index,value){
			$('#ZonaSvotaOznaka').append(new Option(value, index));
		            });
	        });

		$.get('http://localhost:8008/baza/zonavrstavozaca?Oznaka=' + val, function(data) {
		            console.log(data);
		            $('#ZonaVrstaVozacaOznaka').empty();

		            $.each(data, function(index,value){
			$('#ZonaVrstaVozacaOznaka').append(new Option(value, index));
		            });
	        });

		$.get('http://localhost:8008/baza/zonavrstaputnika?Oznaka=' + val, function(data) {
		            console.log(data);
		            $('#ZonaVrstaPutnikaOznaka').empty();

		            $.each(data, function(index,value){
			$('#ZonaVrstaPutnikaOznaka').append(new Option(value, index));
		            });
	        });
		

}

function vozacJS(val) {
	
	$.get('http://localhost:8008/baza/vozac?Oznaka=' + val, function(data) {
		            console.log(data);
		            $('#VozacOznaka').empty();

		            $.each(data, function(index,value){
			$('#VozacOznaka').append(new Option(value, index));
		            });
	        });
	
}

function kopirajVrijednosti() {
	document.getElementsByName("prekopiranoUOsiguranika")[0].innerHTML = "<h4>Osiguranik</h4> <button class='btn btn-primary btn-sm' aria-pressed='false'>Uspješno kopirano</button>";	
	document.getElementsByName("osiguranik_id")[0].value = document.getElementsByName("ugovaratelj_id")[0].value;
	document.getElementsByName("osiguranikVrsta")[0].value = document.getElementsByName("ugovarateljVrsta")[0].value;
	document.getElementsByName("osiguranikNaziv")[0].value = document.getElementsByName("ugovarateljNaziv")[0].value;
	document.getElementsByName("osiguranikIme")[0].value = document.getElementsByName("ugovarateljIme")[0].value;
	document.getElementsByName("osiguranikPrezime")[0].value = document.getElementsByName("ugovarateljPrezime")[0].value;
	document.getElementsByName("osiguranikOib")[0].value = document.getElementsByName("ugovarateljOib")[0].value;
	document.getElementsByName("osiguranikDatumRodjenja")[0].value = document.getElementsByName("ugovarateljDatumRodjenja")[0].value;
	document.getElementsByName("osiguranikSpolOznaka")[0].checked = document.getElementsByName("ugovarateljSpolOznaka")[0].checked;
	document.getElementsByName("osiguranikSpolOznaka")[1].checked = document.getElementsByName("ugovarateljSpolOznaka")[1].checked;
	document.getElementsByName("osiguranikUlica")[0].value = document.getElementsByName("ugovarateljUlica")[0].value;
	document.getElementsByName("osiguranikKucniBroj")[0].value = document.getElementsByName("ugovarateljKucniBroj")[0].value;
	document.getElementsByName("osiguranikPostanskiBroj")[0].value = document.getElementsByName("ugovarateljPostanskiBroj")[0].value;	
	document.getElementsByName("osiguranikTelefon")[0].value = document.getElementsByName("ugovarateljTelefon")[0].value;
	document.getElementsByName("osiguranikEmail")[0].value = document.getElementsByName("ugovarateljEmail")[0].value;
	document.getElementsByName("osiguranikNaseljeOznaka")[0].value = document.getElementsByName("ugovarateljNaseljeOznaka")[0].value;

}