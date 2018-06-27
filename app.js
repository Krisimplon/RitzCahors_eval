 $(document).ready(function() {
	//$('.dropdown-toggle').dropdown();

	$('#filterClients').on('change', function() {
		var jObj = $("option", this).filter(":selected"), // objet jQuery contenant l'option sélectionnée
		idCli = jObj.get(0).value;

		$.ajax({
		  url : 'filtreCli.php',
		  type : "GET",
		  data : {idCli : idCli},
		  success : function(data){
 			$("#tableauFilter").html(data);
 			$('#filterRooms').prop('selectedIndex',0);
 		  }
		});
	});

	$('#filterRooms').on('change', function() {
		var jObj = $("option", this).filter(":selected"), // objet jQuery contenant l'option sélectionnée
		idRoom = jObj.get(0).value;

		$.ajax({
		  url : 'filtreCli.php',
		  type : "GET",
		  data : {idRoom : idRoom},
		  success : function(data){
 			$("#tableauFilter").html(data);
 			$('#filterClients').prop('selectedIndex',0);
 		  }
		});
	});
});

