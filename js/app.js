function GetCurrentPageName() { 
	//method to get Current page name from url. 
	var PageURL = document.location.href; 
	var PageName = PageURL.substring(PageURL.lastIndexOf('/') + 1); 

	return PageName.toLowerCase() ;
}

$(document).ready( function() {
	var CurrPage = GetCurrentPageName();
	if(CurrPage.indexOf("transaksimaintenance") !== -1) {
		$('#maintenance').addClass('active') ;
	}
	else if(CurrPage.indexOf("home") !== -1) {
		$('#home').addClass('active') ;
	}
	else {
		switch(CurrPage){
			case 'transaksijual.php':
				$('#penjualan').addClass('active') ;
				break;
			case 'transaksibeli.php':
				$('#pembelian').addClass('active') ;
				break;
			case 'reportform.php':
				$('#report').addClass('active') ;
				break;
		}
	}
}); 