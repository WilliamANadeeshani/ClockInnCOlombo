$(document).ready(function(){
	$('.collapsible').collapsible();
});


$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
});


// Initialize collapse button
$(".button-collapse").sideNav();
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();

  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
});

  $(document).ready(function() {
  	$('select').material_select();
  });
  
  
//========billEditAndView Validation===============  
  
function validateForm() {
    //check passport
    var x = document.forms["fm"]["passport"].value;
    if (x == null || x == "") {
        alert("Passport or ID is required!");
        return false;
    }else if(x.length>10){
        alert("ID should contain 10 characters.!");
        return false;
    }else if( !/[0-9]]/.test(x)) {
            alert("Passport or ID contains only numbers!");
            return false;
    }    
        
    
    //check description
    var x1 = document.forms["fm"]["description"].value;
    if (x1 == null || x1 == "") {
        alert("Description is required!");
        return false;
    }
       
     //price
    var x = document.forms["fm"]["price"].value;
    if (x == null || x == "") {
        alert("Price is required!");
        return false;
    }else if( !/[^[0-9]+$/.test(x)) {
        alert("'Price contains only numbers and $.!");
        return false;
    }
}
    
function validateForm2() {    
    //passportID
    if (x == null || x == "") {
        alert("Passport or ID is required!");
        return false;
    }else if(x.length>10){
        alert("ID should contain 10 characters.!");
        return false;
    }else if( !/[0-9]]/.test(x)) {
            alert("Passport or ID contains only numbers!");
            return false;
    }    
}    
    

//=================Lost & Found validation============
function validateForm3() {
    var x = document.forms["fm2"]["itemname"].value;
    if (x == null || x == "") {
        alert("Item Name is required!");
        return false;
    }else if( !/^[a-zA-Z]/.test(x)) {
        alert("Item Name contains only letters.!");
    }
    
    var x = document.forms["fm2"]["description"].value;
    if (x == null || x == "") {
        alert("Item description is required!");
        return false;
    }
}  

function validateForm4() {
    var x = document.forms["fm3"]["itemcode"].value;
    if (x == null || x == "") {
        alert("Item code is required!");
        return false;
    }else if( !/[0-9]/.test(x)) {
        alert("Item code  contains only numbers.!");
    }
    
}

//========offerconsider Validation===========
function validateForm5() {
    if (x == null || x == "") {
        alert("Passport or ID is required!");
        return false;
    }else if(x.length>10){
        alert("ID should contain 10 characters.!");
        return false;
    }else if( !/[0-9]]/.test(x)) {
            alert("Passport or ID contains only numbers!");
            return false;
    }    
    
    var x = document.forms["fm4"]["reduction"].value;
    if (x == null || x == "") {
        alert("Reduction value is required!");
        return false;
    }else if( !/[0-9]/.test(x)) {
        alert("Reduction value contains only numbers.!");
    }
    
}

//========offerRequesting Validation===========
function validateForm6() {
    if (x == null || x == "") {
        alert("Passport or ID is required!");
        return false;
    }else if(x.length>10){
        alert("ID should contain 10 characters.!");
        return false;
    }else if( !/[0-9]]/.test(x)) {
            alert("Passport or ID contains only numbers!");
            return false;
    }    
    
}

//========Paying Validation===========
function validateForm7() {
    if (x == null || x == "") {
        alert("Passport or ID is required!");
        return false;
    }else if(x.length>10){
        alert("ID should contain 10 characters.!");
        return false;
    }else if( !/[0-9]]/.test(x)) {
            alert("Passport or ID contains only numbers!");
            return false;
    }    
    
}