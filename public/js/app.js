
//Global declerations
var pageID = $('#pageID').text();
var gmarkers = [];

function checkNavbar(){
	if(pageID == "home"){
		$('#navBar').removeClass('navScrolled static');
    	$('#logo').removeClass('logoScrolled');
    	$('#navList').removeClass('navListScroll');
		$(window).scroll(function (event) {
		    var scroll = $(window).scrollTop();
		    if(! scroll == 0){
		    	$('#navBar').addClass('navScrolled');
		    	$('#logo').addClass('logoScrolled');
		    	$('#navList').addClass('navListScroll');
		    }else{
		    	$('#navBar').removeClass('navScrolled');
		    	$('#logo').removeClass('logoScrolled');
		    	$('#navList').removeClass('navListScroll');
		    }
		});
		var scroll = $(window).scrollTop();
		    if(! scroll == 0){
		    	$('#navBar').addClass('navScrolled');
		    	$('#logo').addClass('logoScrolled');
		    	$('#navList').addClass('navListScroll');
		    }else{
		    	$('#navBar').removeClass('navScrolled');
		    	$('#logo').removeClass('logoScrolled');
		    	$('#navList').removeClass('navListScroll');
		    }
	}else{
		$('#navBar').addClass('navScrolled static');
		$('#logo').addClass('logoScrolled');
		$('#navList').addClass('navListScroll');
	}
}

function checkFooter(){
	var scroll = $(window).scrollTop();
	var vh = $('#getVH').outerHeight();
	scroll = scroll + vh;
	scroll = scroll - 65;
	var distance = $('#staticFooter').offset().top;
	if(scroll > distance){
		var footerH = scroll - distance;
		footerH = footerH + 65;
		if(footerH > 200){
			footerH = 200
		};
		$('#floatingFooter').css({'height':footerH+"px"});


	}else{
		$('#floatingFooter').removeAttr( 'style' );
	}
	
};
function checkHeight() {
	var vh = $('#getVH').outerHeight();
	var minH = vh - 312;
	if ($(".events")[0]) {
		$('.events').css({"min-height":minH+"px"});
	}else if($("#artistCont")[0]) {
		$('#artistCont').css({"min-height":minH+"px"});
	}
}
$(document).ready(function(){
	checkNavbar();
	checkFooter();
	checkHeight();
	if(pageID == "home"){
		var images = $('#slider-container>.images');
		setTimeout(function(){
			$(images).css({'transform':'translate3d(-16.6666%,0,0)'});
			$(images).css({'transition-duration':'1s'});
			setTimeout(function(){
				$(images).css({'transform':'translate3d(-33.3333%,0,0)'});
				setTimeout(function(){
					$(images).css({'transform':'translate3d(-50%,0,0)'});
					setTimeout(function(){
						$(images).css({'transform':'translate3d(-66.6666%,0,0)'});
						setTimeout(function(){
							$(images).css({'transform':'translate3d(-83.3333%,0,0)'});
							setTimeout(function(){
								$(images).css({'transform':'translate3d(0%,0,0)'});
									$(images).css({'transition-duration':'0s'});
									scrollImages();
							}, 1750);
						}, 3500);
					}, 3500);
				}, 3500);
			}, 3500);
		}, 2750);
		function scrollImages() {
			setTimeout(function(){
				$(images).css({'transform':'translate3d(-16.6666%,0,0)'});
				$(images).css({'transition-duration':'1s'});
				setTimeout(function(){
					$(images).css({'transform':'translate3d(-33.3333%,0,0)'});
					setTimeout(function(){
						$(images).css({'transform':'translate3d(-50%,0,0)'});
						setTimeout(function(){
							$(images).css({'transform':'translate3d(-66.6666%,0,0)'});
							setTimeout(function(){
								$(images).css({'transform':'translate3d(-83.3333%,0,0)'});
								setTimeout(function(){
									$(images).css({'transform':'translate3d(0%,0,0)'});
										$(images).css({'transition-duration':'0s'});
										scrollImages();
								}, 1750);
							}, 3500);
						}, 3500);
					}, 3500);
				}, 3500);
			}, 1750);
		};
	}
	//Whack script to test if the contact form has been used
	var contactInputs = $('#contact').find('input');
	contactInputs.push($('#contact').find('textarea')[0]);
	contactInputs.splice(0,1);
	var contactFailed = false;
	contactInputs.each(function(){
		if(this.value !== ""){
			contactFailed = true;
		};
	})
	//If contact has been used then show contact modal.
	if(contactFailed){
		$('[data-remodal-id=contact]').remodal().open();
	};
	$('#mobileContact').click(function(){
		$('[data-remodal-id=contact]').remodal().open();
	})
	var adminOpen = false;
	if($('.adminCont')[0]){
		$('.adminBtn').click(function(){
			$('.adminOuter').slideToggle();
			console.log('!!');
			$('#adminBtnTxt').toggleClass('ABTactive');
			console.log('??');
			//toggle admin button text css making text white
		})
	}
	//Load Galleria plugin.
	if(pageID == "event"){
		if( $('.galleria').length ){
			Galleria.loadTheme('../galleria/themes/classic/galleria.classic.js');
			Galleria.configure({
				wait: 5000,
				transition: 'slide'
			});
	    	Galleria.run('.galleria');
		};
	};

	//Load plugins for adding/editing events.
	if(pageID == "addEvent" || pageID == "editEvent"){
		if (pageID == "addEvent") {
			$('#datetimepicker1').datetimepicker();
		}else{
			var currentDate = $('#currentDate').val();
			$('#datetimepicker1').datetimepicker({
				defaultDate: currentDate
			});
		}

		$('#descriptionApp').summernote({
			height: 300,
			toolbar: [
				['height', ['style', 'height']],
				['color', ['fontname', 'fontsize', 'color']],
				['form', ['bold', 'italic', 'underline', 'clear']],
				['font', ['strikethrough', 'superscript', 'subscript']],
			    ['para', ['ul', 'ol', 'paragraph']],
			    ['Insert', ['link', 'video', 'table', 'hr']],
			    ['misc', ['fullscreen', 'codeview', 'undo', 'redo', 'help']]
			],
			callbacks: {
			    onKeyup: function() {
			    	var html = $('.note-editable').html();
			        $('#description').html(html);
			    },
			    onChange: function() {
			    	var html = $('.note-editable').html();
			        $('#description').html(html);
			    }
		    }
		});
		if(pageID == "editEvent"){
			var description = $('#description').html();
			var descriptionHtml = $('<div>' + description + '</div>').text();
			$('#descriptionApp').summernote('code', descriptionHtml);

			$('.galleryItemPrvw').each(function(){
				var deleteBtn = $(this).children('.deleteGallBtn');
				var string = "";
				$('.imageNumber').each(function(){
					string = string + $(this).text() + ",";
				});
				$('#galleryImagesList').val(string);
				$(deleteBtn).click(function(){
					$(this).parent().remove();
					var string = "";
					$('.imageNumber').each(function(){
						string = string + $(this).text() + ",";
					})
					$('#galleryImagesList').val(string);
				});
			})
		}
	}
	if(pageID == "upcoming" || pageID == "past"){
		$('#close').click(function(){
			$('.createEvent').slideUp();
		});
	}
	var menuOpen = false;
	function toggleMenu(){
		if(!menuOpen){
			menuOpen = true;
			$('.fader').css({'opacity':'1','pointer-events':'auto'});
			$('.menu').css({'transform': 'translateX(calc(100% - 250px))'});
			$('#firstline').css({'transform': 'rotate(45deg)'});
			$('#secondline').css({'transform': 'rotate(-45deg)'});
		}else{
			menuOpen = false;
			$('.fader').css({'opacity':'0','pointer-events':'none'});
			$('.menu').css({'transform': 'translateX(calc(100%))'});
			$('#firstline').css({'transform': 'rotate(0deg)'});
			$('#secondline').css({'transform': 'rotate(0deg)'});
		}

	}
	$('.fader').click(function(){toggleMenu()});
	$('.burger').click(function(){toggleMenu()});
	$('#closeMenu').click(function(){toggleMenu()});
});
$(window).scroll(function(event){
	//Get scroll from top, get distance from top to footer, when scroll from top + 100vh (bottom of view) is more than distance to footer,
	//increase size of footer to match background 200px. to ensure smooth position animation for mail.
	checkFooter();
	
});
$(window).resize(function(){
	checkHeight();
});
function initMap(){
	if (pageID == "addEvent" || pageID == "editEvent") {
		//create default location. required to pull map from API, will not be seen by end user.
		var pyrmont = new google.maps.LatLng(-41.2864603, 174.77623600000004);
		//create new google map on #map div.
	    var map = new google.maps.Map(document.getElementById("map"), {
		    center: pyrmont,
		    zoom: 15,
		    scrollwheel: false,
		    disableDefaultUI: true,
		    styles: [
			    {
			        "featureType": "all",
			        "elementType": "all",
			        "stylers": [
			            {
			                "visibility": "on"
			            }
			        ]
			    },
			    {
			        "featureType": "all",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            },
			            {
			                "saturation": "-100"
			            }
			        ]
			    },
			    {
			        "featureType": "all",
			        "elementType": "labels.text.fill",
			        "stylers": [
			            {
			                "saturation": 36
			            },
			            {
			                "color": "#000000"
			            },
			            {
			                "lightness": 40
			            },
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "all",
			        "elementType": "labels.text.stroke",
			        "stylers": [
			            {
			                "visibility": "off"
			            },
			            {
			                "color": "#000000"
			            },
			            {
			                "lightness": 16
			            }
			        ]
			    },
			    {
			        "featureType": "all",
			        "elementType": "labels.icon",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "administrative",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#000000"
			            },
			            {
			                "lightness": 20
			            }
			        ]
			    },
			    {
			        "featureType": "administrative",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "color": "#000000"
			            },
			            {
			                "lightness": 17
			            },
			            {
			                "weight": 1.2
			            }
			        ]
			    },
			    {
			        "featureType": "landscape",
			        "elementType": "geometry",
			        "stylers": [
			            {
			                "color": "#000000"
			            },
			            {
			                "lightness": 20
			            }
			        ]
			    },
			    {
			        "featureType": "landscape",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#4d6059"
			            }
			        ]
			    },
			    {
			        "featureType": "landscape",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "color": "#4d6059"
			            }
			        ]
			    },
			    {
			        "featureType": "landscape.natural",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#4d6059"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "geometry",
			        "stylers": [
			            {
			                "lightness": 21
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#4d6059"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "color": "#4d6059"
			            }
			        ]
			    },
			    {
			        "featureType": "road",
			        "elementType": "geometry",
			        "stylers": [
			            {
			                "visibility": "on"
			            },
			            {
			                "color": "#7f8d89"
			            }
			        ]
			    },
			    {
			        "featureType": "road",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#7f8d89"
			            }
			        ]
			    },
			    {
			        "featureType": "road.highway",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#7f8d89"
			            },
			            {
			                "lightness": 17
			            }
			        ]
			    },
			    {
			        "featureType": "road.highway",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "color": "#7f8d89"
			            },
			            {
			                "lightness": 29
			            },
			            {
			                "weight": 0.2
			            }
			        ]
			    },
			    {
			        "featureType": "road.arterial",
			        "elementType": "geometry",
			        "stylers": [
			            {
			                "color": "#000000"
			            },
			            {
			                "lightness": 18
			            }
			        ]
			    },
			    {
			        "featureType": "road.arterial",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#7f8d89"
			            }
			        ]
			    },
			    {
			        "featureType": "road.arterial",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "color": "#7f8d89"
			            }
			        ]
			    },
			    {
			        "featureType": "road.local",
			        "elementType": "geometry",
			        "stylers": [
			            {
			                "color": "#000000"
			            },
			            {
			                "lightness": 16
			            }
			        ]
			    },
			    {
			        "featureType": "road.local",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#7f8d89"
			            }
			        ]
			    },
			    {
			        "featureType": "road.local",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "color": "#7f8d89"
			            }
			        ]
			    },
			    {
			        "featureType": "transit",
			        "elementType": "geometry",
			        "stylers": [
			            {
			                "color": "#000000"
			            },
			            {
			                "lightness": 19
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "all",
			        "stylers": [
			            {
			                "color": "#2b3638"
			            },
			            {
			                "visibility": "on"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "geometry",
			        "stylers": [
			            {
			                "color": "#2b3638"
			            },
			            {
			                "lightness": 17
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#24282b"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "color": "#24282b"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "labels.text",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "labels.text.fill",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "labels.text.stroke",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "labels.icon",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    }
			]
		});

	    //get input for google autocomplete.
		var input = document.getElementById('locationSearch');
		//set options for google autocomplete.
		var options = {
		  componentRestrictions: {country: 'nz'}
		};
		//initialise autocomplete on the input.
		var autocomplete = new google.maps.places.Autocomplete(input, options);

		if (pageID == "editEvent") {

			for (var i = 0; i < gmarkers.length; i++) {
	            gmarkers[i].setMap(null);
	        }

			var locationString = $('#mapLocation').text();
			locationString = locationString.slice(1,-1);
			var arr = locationString.split(', ');
			var location = new google.maps.LatLng(arr[0], arr[1]);
			
			//create and show marker at location.
			var marker = new google.maps.Marker({
		        position: location,
		        map: map,
		    });

			//add marker to gmarkers array.
			gmarkers.push(marker);

			//several functions which open the map, take the user to their
			//location and ensure that the transition is smooth.
		    map.panTo(location);
		    $('.map-margin').css({'padding-top':'30px'});
		    $('#location').val(location);

		    google.maps.event.trigger(map, 'resize');
		    map.panTo(location);
		}

		//add event listener to autocomplete, when select changed, call this funciton.
		google.maps.event.addListener(autocomplete, 'place_changed', function(){

			//if markers already present on map, clear all. this is for
			//clarity of the address the user has selected.
			for (var i = 0; i < gmarkers.length; i++) {
	            gmarkers[i].setMap(null);
	        }

	        //get location selected by user.
			var location = autocomplete.getPlace().geometry.location;
			
			//create and show marker at location.
			var marker = new google.maps.Marker({
		        position: location,
		        map: map,
		    });

			//add marker to gmarkers array.
			gmarkers.push(marker);

			//several functions which open the map, take the user to their
			//location and ensure that the transition is smooth.
		    map.panTo(location);
		    $('.map-margin').css({'padding-top':'30px'});
		    $('#location').val(location);

		    google.maps.event.trigger(map, 'resize');
		    map.panTo(location);
		});
	};
	if(pageID == "event"){

		var locationString = $('#mapLocation').text();
		locationString = locationString.slice(1,-1);
		var arr = locationString.split(', ');
		var location = new google.maps.LatLng(arr[0], arr[1]);

	    var map = new google.maps.Map(document.getElementById("map"), {
		    center: location,
		    zoom: 15,
		    scrollwheel: false,
		    disableDefaultUI: true,
		    styles: [
			    {
			        "featureType": "all",
			        "elementType": "all",
			        "stylers": [
			            {
			                "visibility": "on"
			            }
			        ]
			    },
			    {
			        "featureType": "all",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            },
			            {
			                "saturation": "-100"
			            }
			        ]
			    },
			    {
			        "featureType": "all",
			        "elementType": "labels.text.fill",
			        "stylers": [
			            {
			                "saturation": 36
			            },
			            {
			                "color": "#000000"
			            },
			            {
			                "lightness": 40
			            },
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "all",
			        "elementType": "labels.text.stroke",
			        "stylers": [
			            {
			                "visibility": "off"
			            },
			            {
			                "color": "#000000"
			            },
			            {
			                "lightness": 16
			            }
			        ]
			    },
			    {
			        "featureType": "all",
			        "elementType": "labels.icon",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "administrative",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#000000"
			            },
			            {
			                "lightness": 20
			            }
			        ]
			    },
			    {
			        "featureType": "administrative",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "color": "#000000"
			            },
			            {
			                "lightness": 17
			            },
			            {
			                "weight": 1.2
			            }
			        ]
			    },
			    {
			        "featureType": "landscape",
			        "elementType": "geometry",
			        "stylers": [
			            {
			                "color": "#000000"
			            },
			            {
			                "lightness": 20
			            }
			        ]
			    },
			    {
			        "featureType": "landscape",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#4d6059"
			            }
			        ]
			    },
			    {
			        "featureType": "landscape",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "color": "#4d6059"
			            }
			        ]
			    },
			    {
			        "featureType": "landscape.natural",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#4d6059"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "geometry",
			        "stylers": [
			            {
			                "lightness": 21
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#4d6059"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "color": "#4d6059"
			            }
			        ]
			    },
			    {
			        "featureType": "road",
			        "elementType": "geometry",
			        "stylers": [
			            {
			                "visibility": "on"
			            },
			            {
			                "color": "#7f8d89"
			            }
			        ]
			    },
			    {
			        "featureType": "road",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#7f8d89"
			            }
			        ]
			    },
			    {
			        "featureType": "road.highway",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#7f8d89"
			            },
			            {
			                "lightness": 17
			            }
			        ]
			    },
			    {
			        "featureType": "road.highway",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "color": "#7f8d89"
			            },
			            {
			                "lightness": 29
			            },
			            {
			                "weight": 0.2
			            }
			        ]
			    },
			    {
			        "featureType": "road.arterial",
			        "elementType": "geometry",
			        "stylers": [
			            {
			                "color": "#000000"
			            },
			            {
			                "lightness": 18
			            }
			        ]
			    },
			    {
			        "featureType": "road.arterial",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#7f8d89"
			            }
			        ]
			    },
			    {
			        "featureType": "road.arterial",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "color": "#7f8d89"
			            }
			        ]
			    },
			    {
			        "featureType": "road.local",
			        "elementType": "geometry",
			        "stylers": [
			            {
			                "color": "#000000"
			            },
			            {
			                "lightness": 16
			            }
			        ]
			    },
			    {
			        "featureType": "road.local",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#7f8d89"
			            }
			        ]
			    },
			    {
			        "featureType": "road.local",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "color": "#7f8d89"
			            }
			        ]
			    },
			    {
			        "featureType": "transit",
			        "elementType": "geometry",
			        "stylers": [
			            {
			                "color": "#000000"
			            },
			            {
			                "lightness": 19
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "all",
			        "stylers": [
			            {
			                "color": "#2b3638"
			            },
			            {
			                "visibility": "on"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "geometry",
			        "stylers": [
			            {
			                "color": "#2b3638"
			            },
			            {
			                "lightness": 17
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#24282b"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "color": "#24282b"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "labels.text",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "labels.text.fill",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "labels.text.stroke",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "labels.icon",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    }
			]
		});

		var marker = new google.maps.Marker({
	        position: location,
	        map: map
	    });

	}
}