window.onload = function(){
	//cart box
	const iconShopping = document.querySelector('.iconShopping');
	const cartCloseBtn = document.querySelector('.fa-close');
	const cartBox = document.querySelector('.cartBox');
	iconShopping.addEventListener("click",function(){
		cartBox.classList.add('active');
	});
	cartCloseBtn.addEventListener("click",function(){
		cartBox.classList.remove('active');
	});


	// adding data to localstorage
	const attToCartBtn = document.getElementsByClassName('attToCart');
	let items = [];
	for(let i=0; i<attToCartBtn.length; i++){
		attToCartBtn[i].addEventListener("click",function(e){
			if(typeof(Storage) !== 'undefined'){
				let item = {
						id:i+1,
						name:e.target.parentElement.children[0].textContent,
						price:e.target.parentElement.children[1].children[0].textContent,
						no:1
					};
				if(JSON.parse(localStorage.getItem('items')) === null){
					items.push(item);
					localStorage.setItem("items",JSON.stringify(items));
					window.location.reload();
				}else{
					const localItems = JSON.parse(localStorage.getItem("items"));
					localItems.map(data=>{
						if(item.id == data.id){
							item.no = data.no + 1;
						}else{
							items.push(data);
						}
					});
					items.push(item);
					localStorage.setItem('items',JSON.stringify(items));
					window.location.reload();
				}
			}else{
				alert('local storage is not working on your browser');
			}
		});
	}
	// adding data to shopping cart 
	const iconShoppingP = document.querySelector('.iconShopping p');
	let no = 0;
	JSON.parse(localStorage.getItem('items')).map(data=>{
		no = no+data.no
;	});
	iconShoppingP.innerHTML = no;
	
	
	//adding cartbox data in table
	const cardBoxTable = cartBox.querySelector('table');
	let tableData = '';
	tableData += '<tr><th>S no.</th><th>Item Name</th><th>Item No</th><th>item Price</th><th></th></tr>';
	if(JSON.parse(localStorage.getItem('items'))[0] === null){
		tableData += '<tr><td colspan="5">No items found</td></tr>'
	}else{
		JSON.parse(localStorage.getItem('items')).map(data=>{
			tableData += '<tr><th>'+data.id+'</th><th>'+data.name+'</th><th>'+data.no+'</th><th>'+data.price+'</th><th><a href="#" onclick=Delete(this);>Delete</a></th></tr>';
		});
	}
	cardBoxTable.innerHTML = tableData;
    
}
function calculator() {
    let package = document.forms["cena"]["type"].value;
    let quantity = document.forms["cena"]["quantity"].value;
    let price = package*quantity;
 
    
    if(package == 0) alert("Please select a package.")
    else alert("Your monthly cost is:€" + price);
    return false;
}

var todayD=new Date();
var d = new Date(2022, 2, 31);
document.getElementById("dateExp").innerHTML = d;
var timeDate= d- todayD;
document.getElementById("dateLeft").innerHTML=convert(timeDate)

function convert(timeDate){
    let hours,minutes,seconds;
    hours = Math.floor(timeDate/1000/60/60);
    minutes = Math.floor((timeDate/1000/60/60-hours)*60);
    seconds = Math.floor(((timeDate/1000/60/60-hours)*60-minutes)*60);
  
    if(timeDate>=0)
    return hours + " hours, " + minutes + " minutes and " + seconds + " seconds.";
    else return "Offer has finshed!";
}
function validDate() {
    let firstName = document.forms["myForm"]["firstName"].value;
    let surname = document.forms["myForm"]["surname"].value;
    let gender =document.forms["myForm"]["gender"].value;
    let age =document.forms["myForm"]["age"].value;
    let email =document.forms["myForm"]["email"].value;


    if (firstName == "") {
        alert("Please enter your name");
        return false;
    }

    if (surname == "") {
        alert("Please enter your surname");
        return false;
    }
    if (gender==""){
        alert("Please Select your gender")
            return false;
    }
    if(age==""){
        alert("Please write your age")
            return false;
    }
    if(email.length > 64) {
        alert("There is a length limit on email addresses. That limit is a maximum of 64 characters.")
        return false;
    }
    if(email.length < 5) {
        alert("The minimal  length of email addresses are  5 characters")
        return false;
     } alert("Thank you,and expect emails from us, have a great day.");

}
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
function calculator() {
    let package = document.forms["cena"]["type"].value;
    let quantity = document.forms["cena"]["quantity"].value;
    let price = package*quantity;
	let a = package*quantity*0.15;
    let total = price+a;
 
    
    if(package == 0) alert("Please select a package.")
    else alert("Your monthly cost is:€" + total);
    return false;
}
