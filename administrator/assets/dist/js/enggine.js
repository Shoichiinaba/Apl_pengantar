
function get_sertipikat(str){
    var string = str.split(','); // mengembalikan nilai array
		var hal = document.querySelectorAll('.sert');
		var check = document.querySelectorAll('.sert fieldset');
		var button = document.querySelectorAll('.sert fieldset div button') || "tidak ada";
		
		// hapus disabled pada fieldset\\
		if(hal[0].children[1].disabled){
			hal[0].children[1].disabled = false;
		}
	// membuat variabel yang menampung object
		if(!check[0].disabled){
		/* digunakan untuk mendisabled semua tombol yang ada di dalam fieldset */
		  for(var i = 0; i<button.length; i++){
		    // console.log(button[i]); // identifikasi button
		    var butval = button[i];
				var ss = button[i].classList.remove('gagal') || button[i].classList.remove('berhasil') || button[i].classList.remove('animate');
		    // var node_luar = button[i].parentNode.parentNode; // <div>
		    // console.log(node_luar.nextElementSibling);
				if(!array_in(string,butval.attributes['alt'].value)){
					button[i].disabled = true;
					button[i].classList.add('gagal');
				}else{
					button[i].classList.add('berhasil');
				}
		    
		  }
			
			// langkah terakhir
			
			var node_luar = button[string.length - 1].parentNode.parentNode; //div
			if(node_luar.nextElementSibling != null){
				node_luar.nextElementSibling.children[0].children[0].disabled = false;
			}
			
		}

}
// get_sertipikat('pn_dokumen,ploting,pn_sertipikat,zona,IPH,pn_pajak');
function tmplKet(Objarray){
	var tnama = $('#keterangan .NAMA'),
	if(Objarray != 'none'){
		var nama = Objarray[0]['nm_penjual'],
		tnama.html(nama);
	}else{
		tnama.html('(none)');
		
	}
}
var textcari = document.querySelectorAll('.pencarian input[type=text]')[0];
var btncari = document.querySelectorAll('.pencarian #get_cari')[0];
btncari.onclick = function(event){
	$('#loader').show();
	var valu = textcari.value;
	console.log('event telah diclick');
	  $.ajax({
	    url:"http://localhost/Apl_pengantar/index.php/Welcome/ambil_data",
	    type:"get",
	    cache:false,
	    timeout:10000,
	    data:{cari:valu},
	    success:function(query){
	      var q = (query === 'NO_DATA_QUERY')?'none':JSON.parse(query);
	      var nama = q[0]['nama'],
	      $('#loader').hide();

	      
	    }
	  
	  });
};