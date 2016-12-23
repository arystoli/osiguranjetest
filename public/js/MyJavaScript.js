function tarifnagrupaJS(val) {
	        $.get('http://osiguranje-dev/baza/tarifnapodgrupa?Oznaka=' + val, function(data) {
		            console.log(data);
		            $('#tarifnapodgrupa').empty();

		            $.each(data, function(index,value){
			$('#tarifnapodgrupa').append(new Option(value, index));
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
	document.getElementsByName("osiguranikNaselje")[0].value = document.getElementsByName("ugovarateljNaselje")[0].value;
	document.getElementsByName("osiguranikTelefon")[0].value = document.getElementsByName("ugovarateljTelefon")[0].value;
	document.getElementsByName("osiguranikEmail")[0].value = document.getElementsByName("ugovarateljEmail")[0].value;

}