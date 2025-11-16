
// province, District and crop Options for crop prediction
var province_arr = new Array("Koshi", "Madhesh", "Bagmati", "Gandaki", "Lumbini", "Karnali", "Sudurpashchim");

var p_a = new Array();
p_a[0]="";
p_a[1]=" Bhojpur	| Dhankuta |	Ilam |	Jhapa |	Khotang |	Morang |	Okhaldhunga |	Panchthar |	Sankhuwasabha |	Solukhumbu |	Sunsari |	Taplejung | 	Terhathum |	Udayapur";
p_a[2]=" Saptari |	Siraha |	Dhanusa |	Mahottari |	Sarlahi |	Bara |	Parsa |	Rautahat";
p_a[3]=" Sindhuli | 	Ramechhap |	Dolakha |	Bhaktapur |	Dhading |	Kathmandu |	Kavrepalanchok |	Lalitpur |	Nuwakot |	Rasuwa |	Sindhupalchok |	Chitwan |	Makwanpur";
p_a[4]=" Baglung |	Gorkha |	Kaski |	Lamjung | Manang |	Mustang |	Myagdi |	Nawalpur |	Parbat |	Syangja |	Tanahun ";
p_a[5]=" Kapilvastu |	Parasi |	Rupandehi |	Arghakhanchi |	Gulmi |	Palpa |	Dang |	Pyuthan |	Rolpa |	Eastern | Rukum |	Banke |	Bardiya ";
p_a[6]=" Western Rukum |	Salyan |	Dolpa |	Humla |	Jumla |	Kalikot |	Mugu |	Surkhet |	Dailekh |	Jajarkot ";
p_a[7]=" Kailali |	Achham |	Doti |	Bajhang |	Bajura |	Kanchanpur |	Dadeldhura |	Baitadi |	Darchula ";


function print_province(province_id){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var option_str = document.getElementById(province_id);
	option_str.length=0;
	option_str.options[0] = new Option('Select Province','');
	option_str.selectedIndex = 0;
	for (var i=0; i<province_arr.length; i++) {
		option_str.options[option_str.length] = new Option(province_arr[i],province_arr[i]);
	}
}

function print_city(city_id, city_index){
	var option_str = document.getElementById(city_id);
	option_str.length=0;	// Fixed by Julian Woods
	option_str.options[0] = new Option('Select District','');
	option_str.selectedIndex = 0;
	var city_arr = p_a[city_index].split("|");
	for (var i=0; i<city_arr.length; i++) {
		option_str.options[option_str.length] = new Option(city_arr[i],city_arr[i]);
	}
}



// dropdown for rainfall prediction

var months = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC","ANNUAL"]; 

function print_months(month_id) {
    var option_months = document.getElementById(month_id);
    option_months.length = 0;
    option_months.options[0] = new Option('Select Month', '');
    option_months.selectedIndex = 0;
    for (var i = 0; i < months.length; i++) {
        option_months.options[option_months.length] = new Option(months[i], months[i]);
    }
}


var region = ["Arghakhanchi", "Baglung", "Baitadi", "Bajang", "Banke", "Bara", "Bardiya", "Bhaktapur", "Chitawan", "Dadeldhura",
 "Dailekh", "Dang", "Darchula", "Dhading", "Dhankuta", "Dhanusa", "Dolkha", "Dolpa", "Doti", "Gorkha", "Gulmi", "Humla", "Ilam", 
 "Jhapa", "Jumla", "Kabhre", "Kailali", "Kanchanpur", "Kaski", "Kathmandu", "Lalitpur", "Lamjung", "Mahottari", "Makwanpur", "Manang",
  "Morang", "Mugu", "Mustang", "Myagdi", "Nawalparasi", "Nuwakot", "Okhaldhunga", "Palpa", "Panchther", "Parbat", "Rasuwa", "Routahat",
  "Rukum", "Rupandehi", "Salyan", "Sankhuwasabha", "Saptari", "Sarlahi", "Sindhuli", "Solukhumbu", "Sunsari", "Surkhet", "Syangja",
  "Tanahun", "Taplejung", "Terhathum", "Udayapur"];

function print_region(region_id) {
    var option_region = document.getElementById(region_id);
    option_region.length = 0;
    option_region.options[0] = new Option('Select Region', '');
    option_region.selectedIndex = 0;
    for (var i = 0; i < region.length; i++) {
        option_region.options[option_region.length] = new Option(region[i], region[i]);
    }
}


