/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {


  $('.scrollspy').scrollSpy();

  $('#fullpage').fullpage({
    verticalCentered: false,
    sectionsColor: ['whitesmoke', 'whitesmoke', 'whitesmoke', 'whitesmoke', 'whitesmoke'],
    anchors: ['MenuInicio', 'MenuPortafolio', 'MenuCursos', 'MenuContacto', 'MenuIngresar'],
    menu: '#menu_frontal',
    css3: true,
    navigation: true,
    navigationPosition: 'right',
    scrollOverflow: true

  });


  $('.button-collapse').sideNav({
    menuWidth: 300, // Default is 240
    edge: 'left', // Choose the horizontal origin
    closeOnClick: false // Closes side-nav on <a> clicks, useful for Angular/Meteor         
  });
});
