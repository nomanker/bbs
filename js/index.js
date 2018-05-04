"use strict";
var nav_btn = document.getElementById('nav_btn'),
	nav = document.getElementById('nav');
 	var getContent = function(device){
 	return window.getComputedStyle(document.body,':after').getPropertyValue('content').indexOf(device) > -1;
 }
 var navResponsive = function(){
 	if(getContent('small')){
 		nav.classList.add('hide');
 	}
 	else{
 		nav.classList.remove('hide');
 	}
 }
 navResponsive();
 window.addEventListener('resize',navResponsive);
 nav_btn.addEventListener('click',function(e){
 	if(getContent("small")){
 		nav.classList.toggle('hide');
 	}
});